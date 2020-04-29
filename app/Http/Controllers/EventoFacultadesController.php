<?php

namespace App\Http\Controllers;

use App\EventoFacultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class EventoFacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create eventos facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read eventos facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update eventos facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete eventos facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "eventoFacultades";
        return view('eventoFacultades.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $eventos = DB::table('eventofacultades as ef')
            ->join('facultades as f', 'f.id', '=', 'ef.facultad_id')
            ->select('ef.id', 'ef.titulo', 'ef.descripcion', 'ef.imagen', 'ef.fechainicio', 'ef.fechafin', 'ef.fechapublicac', 'ef.activo', 'ef.borrado', 'ef.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('ef.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('ef.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('ef.titulo', 'like', '%' . $buscar . '%');
                $query->orwhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(10);

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
                'total' => $eventos->total(),
                'current_page' => $eventos->currentPage(),
                'per_page' => $eventos->perPage(),
                'last_page' => $eventos->lastPage(),
                'from' => $eventos->firstItem(),
                'to' => $eventos->lastItem(),
            ],
            'eventos' => $eventos,
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
        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $fechainicio = $request->fechainicio;
        $fechafin = $request->fechafin;
        $img = $request->imagen;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('fechainicio' => $fechainicio);
        $reglas2 = array('fechainicio' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('fechafin' => $fechafin);
        $reglas3 = array('fechafin' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL EVENTO';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FECHA DEL INICIO DEL EVENTO';
            $selector = 'fechainicio';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FECHA DE FINALIZACION DEL EVENTO';
            $selector = 'fechafin';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA IMAGEN DEL EVENTO';
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
                    $subir = Storage::disk('EventoF')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('EventoF')->delete($imagen);
            } else {
                $newdescripcion = new EventoFacultades();
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->fechainicio = $fechainicio;
                $newdescripcion->fechafin = $fechafin;
                $newdescripcion->fechapublicac = date('Y/m/d');
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
                $msj = 'EL NUEVO EVENTO DE LA FACULTAD FUE REGISTRADO EXITOSAMENTE';
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
        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $fechainicio = $request->fechainicio;
        $fechafin = $request->fechafin;
        $img = $request->imagen;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;


        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('fechainicio' => $fechainicio);
        $reglas2 = array('fechainicio' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('fechafin' => $fechafin);
        $reglas3 = array('fechafin' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL EVENTO';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FECHA DE INICIO DEL EVENTO';
            $selector = 'fechainicio';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FECHA DE FINALIZACION DEL EVENTO';
            $selector = 'fechafin';
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
                    $subir = Storage::disk('EventoF')->put($nuevoNombre, \File::get($img));

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
            if ($request->hasFile('imagen')) {
                $editadescripcion = EventoFacultades::findOrFail($id);
                $editadescripcion->titulo = $titulo;
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->imagen = $imagen;
                $editadescripcion->fechainicio = $fechainicio;
                $editadescripcion->fechafin = $fechafin;
                $editadescripcion->facultad_id = $facultad_id;
                $editadescripcion->save();
                $msj = 'EL EVENTO DE LA FACULTAD FUE MODIFICADO EXITOSAMENTE';
            } else {
                $editadescripcion = EventoFacultades::findOrFail($id);
                $editadescripcion->titulo = $titulo;
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->fechainicio = $fechainicio;
                $editadescripcion->fechafin = $fechafin;
                $editadescripcion->facultad_id = $facultad_id;
                $editadescripcion->save();
                $msj = 'EL EVENTO DE LA FACULTAD FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = EventoFacultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL EVENTO DE LA FACULTAD FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = EventoFacultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL EVENTO DE LA FACULTAD FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL EVENTO DE LA FACULTAD FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
