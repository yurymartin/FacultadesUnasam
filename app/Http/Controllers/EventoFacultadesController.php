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
    public function index1()
    {
        if (accesoUser([1, 2])) {
            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "eventoFacultades";
            return view('eventoFacultades.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $eventos = EventoFacultades::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('titulo', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(10);

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

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Falta completar el titulo del Evento';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Falta completar la fecha de inicio del Evento';
            $selector = 'fechainicio';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Falta completar la fecha de fin del Evento';
            $selector = 'fechafin';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
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
                $newdescripcion->save();
                $msj = 'el nuevo Evento de facultades fue registrado con éxito';
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

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Falta completar el titulo del evento';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Falta completar la fecha de inicio del evento';
            $selector = 'fechainicio';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Falta completar la fecha de fin del evento';
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
                $editadescripcion->save();
                $msj = 'El evento de las facultades fue Modificado con éxito';
            } else {
                $editadescripcion = EventoFacultades::findOrFail($id);
                $editadescripcion->titulo = $titulo;
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->fechainicio = $fechainicio;
                $editadescripcion->fechafin = $fechafin;
                $editadescripcion->save();
                $msj = 'El evento de las facultades fue Modificado con éxito';
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
        $msj = 'El Evento fue eliminado exitosamente';
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
            $msj = 'El Evento fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'El Evento fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
