<?php

namespace App\Http\Controllers;

use App\DescripcionEscuelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class DescripcionEscuelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create descripcion escuelas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read descripcion escuelas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update descripcion escuelas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete descripcion escuelas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "descripcionescuelas";
        return view('descripcionescuelas.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $descripcionescuelas = DB::table('descripcionescuelas as de')
            ->join('escuelas as e', 'e.id', '=', 'de.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('de.id as iddesc', 'de.descripcion', 'de.tituloprofesional', 'de.gradoacade', 'de.duracion', 'de.mision', 'de.vision', 'de.historia', 'de.logo', 'de.activo', 'e.id as idesc', 'e.nombre')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('de.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->orWhere('de.tituloprofesional', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('de.id')
            ->paginate(2);

        $escuelas = DB::table('escuelas as e')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('e.id', 'e.nombre')
            ->where('e.borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('e.activo', '=', '1')
            ->get();

        return [
            'pagination' => [
                'total' => $descripcionescuelas->total(),
                'current_page' => $descripcionescuelas->currentPage(),
                'per_page' => $descripcionescuelas->perPage(),
                'last_page' => $descripcionescuelas->lastPage(),
                'from' => $descripcionescuelas->firstItem(),
                'to' => $descripcionescuelas->lastItem(),
            ],
            'descripcionescuelas' => $descripcionescuelas,
            'escuelas' => $escuelas,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descripcion = $request->descripcion;
        $titulo = $request->titulo;
        $gradoacade = $request->gradoacade;
        $duracion = $request->duracion;
        $mision = $request->mision;
        $vision = $request->vision;
        $historia = $request->historia;
        $img = $request->logo;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('gradoacade' => $gradoacade);
        $reglas2 = array('gradoacade' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('duracion' => $duracion);
        $reglas3 = array('duracion' => 'required');
        $validator3 = Validator::make($input3, $reglas3);


        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO PROFESIONAL';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL GRADO ACADEMICO';
            $selector = 'gradoacade';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA DURACION DE LA CARRERA PROFESIONAL';
            $selector = 'duracion';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbEscuelas';
        } else if (!$request->hasFile('logo')) {
            $result = '0';
            $msj = 'FALTA INGRESAR EL LOGO DE LA ESCUELA PROFESIONAL';
            $selector = 'archivo';
        } else {
            if ($request->hasFile('logo')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('logo' => $img);
                $reglas = array('logo' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('DescripcionE')->put($nuevoNombre, \File::get($img));

                    if ($subir) {
                        $imagen = $nuevoNombre;
                    } else {
                        $msj = "Error al subir la imagen, intentelo nuevamente luego";
                        $segureImg = 1;
                        $result = '0';
                        $selector = 'archivo';
                    }
                }
            }
            if ($segureImg == 1) {
                Storage::disk('DescripcionE')->delete($imagen);
            } else {
                $newdescripcion = new DescripcionEscuelas();
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->tituloprofesional = $titulo;
                $newdescripcion->gradoacade = $gradoacade;
                $newdescripcion->duracion = $duracion;
                $newdescripcion->mision = $mision;
                $newdescripcion->vision = $vision;
                $newdescripcion->historia = $historia;
                $newdescripcion->logo = $imagen;
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
                $msj = 'LA NUEVA DESCRIPCION DE LA ESCUELA PROFESIONAL FUE REGISTRADO EXITOSAMENTE';
            }
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $descripcion = $request->descripcion;
        $titulo = $request->tituloprofesional;
        $gradoacade = $request->gradoacade;
        $duracion = $request->duracion;
        $mision = $request->mision;
        $vision = $request->vision;
        $historia = $request->historia;
        $img = $request->logo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('gradoacade' => $gradoacade);
        $reglas2 = array('gradoacade' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('duracion' => $duracion);
        $reglas3 = array('duracion' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO PROFESIONAL';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL GRADO ACADEMICO';
            $selector = 'gradoacade';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA DURACION DE LA CARRERA PROFESIONAL';
            $selector = 'duracion';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbEscuelas';
        } else {
            if ($request->hasFile('logo')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('logo' => $img);
                $reglas = array('logo' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('DescripcionE')->put($nuevoNombre, \File::get($img));

                    if ($subir) {
                        $imagen = $nuevoNombre;
                    } else {
                        $msj = "Error al subir la imagen, intentelo nuevamente luego";
                        $segureImg = 1;
                        $result = '0';
                        $selector = 'archivo';
                    }
                }
            }
            $newdescripcion = DescripcionEscuelas::findOrFail($id);
            if ($request->hasFile('logo')) {
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->tituloprofesional = $titulo;
                $newdescripcion->gradoacade = $gradoacade;
                $newdescripcion->duracion = $duracion;
                $newdescripcion->mision = $mision;
                $newdescripcion->vision = $vision;
                $newdescripcion->historia = $historia;
                $newdescripcion->logo = $imagen;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
                $msj = 'LA NUEVA DESCRIPCION DE LA ESCUELA PROFESIONAL FUE REGISTRADO EXITOSAMENTE';
            } else {
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->tituloprofesional = $titulo;
                $newdescripcion->gradoacade = $gradoacade;
                $newdescripcion->duracion = $duracion;
                $newdescripcion->mision = $mision;
                $newdescripcion->vision = $vision;
                $newdescripcion->historia = $historia;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
                $msj = 'LA NUEVA DESCRIPCION DE LA ESCUELA PROFESIONAL FUE MODIFICADO EXITOSAMENTE';
            }
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = '1';
        $msj = '1';
        $borrar = DescripcionEscuelas::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA DESCRIPCION DE LA ESCUELA PROFESIONAL FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = DescripcionEscuelas::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA DESCRIPCION DE LA ESCUELA PROFESIONAL FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA DESCRIPCION DE LA ESCUELA PROFESIONAL FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
