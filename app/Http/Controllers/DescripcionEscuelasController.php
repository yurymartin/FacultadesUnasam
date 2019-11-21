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
    public function index1()
    {
        if (accesoUser([1, 2])) {
            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "descripcionescuelas";
            return view('descripcionescuelas.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $descripcionescuelas = DB::table('descripcionescuelas as de')
            ->join('escuelas as e', 'e.id', '=', 'de.escuela_id')
            ->select('de.id as iddesc', 'de.descripcion', 'de.titulo', 'de.gradoacade', 'de.duracion', 'de.logo', 'de.activo', 'e.id as idesc', 'e.nombre')
            ->where('de.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('de.descripcion', 'like', '%' . $buscar . '%');
                $query->orWhere('de.titulo', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('de.id')
            ->paginate(10);

        $escuelas = DB::table('escuelas')
            ->where('borrado', '=', 0)
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
            $msj = 'Complete el titulo profesional';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete el grado profesional';
            $selector = 'gradoacade';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete la duracion de la escuela';
            $selector = 'duracion';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
            $selector = 'archivo';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Seleccionar la Escuela';
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

            if ($segureImg == 1) {
                Storage::disk('DescripcionE')->delete($imagen);
            } else {
                $newdescripcion = new DescripcionEscuelas();
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->titulo = $titulo;
                $newdescripcion->gradoacade = $gradoacade;
                $newdescripcion->duracion = $duracion;
                $newdescripcion->logo = $imagen;
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
                $msj = 'Nueva Descripcion de Escuelas fue registrado con éxito';
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
        $titulo = $request->titulo;
        $gradoacade = $request->gradoacade;
        $duracion = $request->duracion;
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
            $msj = 'Complete el titulo profesional';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete el grado profesional';
            $selector = 'gradoacade';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete la duracion de la escuela';
            $selector = 'duracion';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
            $selector = 'archivo';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Seleccionar la Escuela';
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

            if ($segureImg == 1) {
                Storage::disk('DescripcionE')->delete($imagen);
            } else {
                $newdescripcion = DescripcionEscuelas::findOrFail($id);
                if ($request->hasFile('logo')) {
                    $newdescripcion->descripcion = $descripcion;
                    $newdescripcion->titulo = $titulo;
                    $newdescripcion->gradoacade = $gradoacade;
                    $newdescripcion->duracion = $duracion;
                    $newdescripcion->logo = $imagen;
                    $newdescripcion->escuela_id = $escuela_id;
                    $newdescripcion->save();
                    $msj = 'Nueva Descripcion de Escuelas fue Modificado con éxito';
                } else {
                    $newdescripcion->descripcion = $descripcion;
                    $newdescripcion->titulo = $titulo;
                    $newdescripcion->gradoacade = $gradoacade;
                    $newdescripcion->duracion = $duracion;
                    $newdescripcion->escuela_id = $escuela_id;
                    $newdescripcion->save();
                    $msj = 'Nueva Descripcion de Escuelas fue Modificado con éxito';
                }
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
        $msj = 'La Descripcion fue eliminado exitosamente';
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
            $msj = 'La Descripcion fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'La Descripcion fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
