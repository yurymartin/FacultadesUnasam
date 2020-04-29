<?php

namespace App\Http\Controllers;

use App\DescripcionFacultades;
use App\Facultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class DescripcionFacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create descripcion facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read descripcion facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update descripcion facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete descripcion facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "descripcionfacultades";
        return view('descripcionfacultades.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $descripcionfacultades = DB::table('descripcionfacultades as df')
            ->join('facultades as f', 'f.id', '=', 'df.facultad_id')
            ->select('df.id as iddesc', 'df.descripcion', 'df.reseñahistor', 'df.mision', 'df.vision', 'df.imagen', 'filosofia', 'df.activo', 'df.borrado', 'df.facultad_id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('df.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('df.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('f.nombre', 'like', '%' . $buscar . '%');
                $query->orWhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('df.id')
            ->paginate(2);

        $facultades = DB::table('facultades')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('activo', '1')
            ->where('borrado', '0')
            ->get();

        return [
            'pagination' => [
                'total' => $descripcionfacultades->total(),
                'current_page' => $descripcionfacultades->currentPage(),
                'per_page' => $descripcionfacultades->perPage(),
                'last_page' => $descripcionfacultades->lastPage(),
                'from' => $descripcionfacultades->firstItem(),
                'to' => $descripcionfacultades->lastItem(),
            ],
            'descripcionfacultades' => $descripcionfacultades,
            'facultades' => $facultades
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
        $facultad_id = $request->facultad_id;
        $descripcion = $request->descripcion;
        $reseñahistor = $request->reseñahistor;
        $mision = $request->mision;
        $vision = $request->vision;
        $img = $request->imagen;
        $filosofia = $request->filosofia;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('reseñahistor' => $reseñahistor);
        $reglas1 = array('reseñahistor' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('mision' => $mision);
        $reglas2 = array('mision' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('vision' => $vision);
        $reglas3 = array('vision' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        $input4  = array('filosofia' => $filosofia);
        $reglas4 = array('filosofia' => 'required');
        $validator4 = Validator::make($input4, $reglas4);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA RESEÑA HISTORICA DE LA FACULTAD';
            $selector = 'reseña';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA MISION DE LA FACULTAD';
            $selector = 'mision';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA VISION DE LA FACULTAD';
            $selector = 'vision';
        } else if ($validator4->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FILOSOFIA DE LA FACULTAD';
            $selector = 'filosofia';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA INGRESAR EL LOGO DE LA FACULTAD';
            $selector = 'archivo';
        } else {

            if ($request->hasFile('imagen')) {

                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('image' => $img);
                $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('DescripcionF')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('DescripcionF')->delete($imagen);
            } else {
                $newdescripcion = new DescripcionFacultades();
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->reseñahistor = $reseñahistor;
                $newdescripcion->mision = $mision;
                $newdescripcion->vision = $vision;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->filosofia = $filosofia;
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
                $msj = 'LA NUEVA DESCRIPCION DE LA FACULTAD FUE REGISTRADA EXITOSAMENTE';
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
        $facultad_id = $request->facultad_id;
        $descripcion = $request->descripcion;
        $reseñahistor = $request->reseñahistor;
        $mision = $request->mision;
        $vision = $request->vision;
        $img = $request->imagen;
        $filosofia = $request->filosofia;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";


        $input1  = array('reseñahistor' => $reseñahistor);
        $reglas1 = array('reseñahistor' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('mision' => $mision);
        $reglas2 = array('mision' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('vision' => $vision);
        $reglas3 = array('vision' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        $input4  = array('filosofia' => $filosofia);
        $reglas4 = array('filosofia' => 'required');
        $validator4 = Validator::make($input4, $reglas4);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA RESEÑA HISTORICA DE LA FACULTAD';
            $selector = 'reseña';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA MISION DE LA FACULTAD';
            $selector = 'mision';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA VISION DE LA FACULTAD';
            $selector = 'vision';
        } else if ($validator4->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FILOSOFIA DE LA FACULTAD';
            $selector = 'filosofia';
        } else {
            if ($request->hasFile('imagen')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('image' => $img);
                $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);
                if ($validator->fails()) {
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('DescripcionF')->put($nuevoNombre, \File::get($img));
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
            $editadescripcion = DescripcionFacultades::findOrFail($id);
            if ($request->hasFile('imagen')) {
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->reseñahistor = $reseñahistor;
                $editadescripcion->mision = $mision;
                $editadescripcion->vision = $vision;
                $editadescripcion->imagen = $imagen;
                $editadescripcion->filosofia = $filosofia;
                $editadescripcion->facultad_id = $facultad_id;
                $editadescripcion->save();
            } else {
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->reseñahistor = $reseñahistor;
                $editadescripcion->mision = $mision;
                $editadescripcion->vision = $vision;
                $editadescripcion->filosofia = $filosofia;
                $editadescripcion->facultad_id = $facultad_id;
                $editadescripcion->save();
            }
            $msj = 'LA DECRIPCION DE LA FACULTAD FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = DescripcionFacultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA DESCRIPCION FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = DescripcionFacultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA DESCRIPCION FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA DESCRIPCION FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
