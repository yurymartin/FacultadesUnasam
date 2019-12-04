<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investigaciones;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class InvestigacionesController extends Controller
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
            $modulo = "investigaciones";
            return view('investigaciones.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $investigaciones = DB::table('investigacion as i')
            ->join('temas as t', 't.id', '=', 'i.tema_id')
            ->select('i.id as idinves', 'i.titulo', 'i.descripcion', 'i.autor', 'i.fechapublicacion', 'i.imagen', 'i.ruta', 'i.activo', 't.tema', 't.id as idtema')
            ->where('i.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('i.titulo', 'like', '%' . $buscar . '%');
                $query->where('i.autor', 'like', '%' . $buscar . '%');
                $query->where('t.tema', 'like', '%' . $buscar . '%');
            })
            ->orderBy('i.id')
            ->paginate(10);

        $temas = DB::table('temas')
            ->where('borrado', '=', 0)
            ->where('activo', '=', 1)
            ->get();

        return [
            'pagination' => [
                'total' => $investigaciones->total(),
                'current_page' => $investigaciones->currentPage(),
                'per_page' => $investigaciones->perPage(),
                'last_page' => $investigaciones->lastPage(),
                'from' => $investigaciones->firstItem(),
                'to' => $investigaciones->lastItem(),
            ],
            'investigaciones' => $investigaciones,
            'temas' => $temas,
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
        $fechapublicacion = $request->fechapublicacion;
        $img = $request->imagen;
        $link = $request->ruta;
        $autor = $request->autor;
        $tema_id = $request->tema_id;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $ruta = "";
        $imagen = "";

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('fechapublicacion' => $fechapublicacion);
        $reglas2 = array('fechapublicacion' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('autor' => $autor);
        $reglas3 = array('autor' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DE LA INVESTIGACION';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA FECHA DE PUBLICACION DE LA INVESTIGACION';
            $selector = 'fecha';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA IMAGEN DE LA INVESTIGACION';
            $selector = 'archivo';
        } else if ($link == 'null') {
            $result = '0';
            $msj = 'FALTA SUBIR EL ARCHIVO O INVESTIGACION';
            $selector = 'archivo2';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS DATOS DEL AUTOR';
            $selector = 'autor';
        } else if ($tema_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL TEMA DE ESTUDIO DE LA INVESTIGACION';
            $selector = 'tema_id';
        } else {
            if ($request->file('imagen')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('imagen' => $img);
                $reglas = array('imagen' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);
                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('InvestigacionP')->put($nuevoNombre, \File::get($img));
                    $subir = 1;
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
            if ($request->file('ruta')) {
                $aux2 = date('d-m-Y') . '-' . date('H-i-s');
                $input3  = array('ruta' => $link);
                $reglas3 = array('ruta' => 'required');
                $validator3 = Validator::make($input3, $reglas3);
                if ($validator3->fails()) {
                    $seguredoc = 1;
                    $msj = "EL ARCHIVO TIENE QUE SER DE FORMATO PDF";
                    $result = '0';
                    $selector = 'archivo2';
                } else {
                    $extension2 = $link->getClientOriginalExtension();
                    $nuevoNombre2 = $aux2 . "." . $extension2;
                    $subir2 = Storage::disk('InvestigacionD')->put($nuevoNombre2, \File::get($link));
                    if ($subir2) {
                        $ruta = $nuevoNombre2;
                    } else {
                        $msj = "Error al subir el documento, intentelo nuevamente luego";
                        $result = '0';
                        $selector = 'archivo2';
                    }
                }
            }
            $newdescripcion = new Investigaciones();
            $newdescripcion->titulo = $titulo;
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->autor = $autor;
            $newdescripcion->fechapublicacion = $fechapublicacion;
            $newdescripcion->imagen = $imagen;
            $newdescripcion->ruta = $ruta;
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->tema_id = $tema_id;
            $newdescripcion->save();
            $msj = 'LA NUEVA INVESTIGACION FUE REGISTRADA EXITOSAMENTE';
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
        $fechapublicacion = $request->fechapublicacion;
        $img = $request->imagen;
        $link = $request->ruta;
        $autor = $request->autor;
        $tema_id = $request->tema_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $ruta = "";
        $imagen = "";

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('fechapublicacion' => $fechapublicacion);
        $reglas2 = array('fechapublicacion' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('autor' => $autor);
        $reglas3 = array('autor' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA EL TITULO DE LA INVESTIGACION';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA LA FECHA DE PUBLICACION DE LA INVESTIGACION';
            $selector = 'fecha';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LOS DATOS DEL AUTOR';
            $selector = 'autor';
        } else if ($tema_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL TEMA DE ESTUDIO DE LA INVESTIGACION';
            $selector = 'tema_id';
        } else {
            if ($request->file('imagen')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('imagen' => $img);
                $reglas = array('imagen' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);
                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('InvestigacionP')->put($nuevoNombre, \File::get($img));
                    $subir = 1;
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
            if ($request->file('ruta')) {
                $aux2 = date('d-m-Y') . '-' . date('H-i-s');
                $input3  = array('ruta' => $link);
                $reglas3 = array('ruta' => 'required');
                $validator3 = Validator::make($input3, $reglas3);
                if ($validator3->fails()) {
                    $seguredoc = 1;
                    $msj = "ERROR, EL ARCHIVO TIENE QUE SER DE FORMATO PDF";
                    $result = '0';
                    $selector = 'archivo2';
                } else {
                    $extension2 = $link->getClientOriginalExtension();
                    $nuevoNombre2 = $aux2 . "." . $extension2;
                    $subir2 = Storage::disk('InvestigacionD')->put($nuevoNombre2, \File::get($link));
                    if ($subir2) {
                        $ruta = $nuevoNombre2;
                    } else {
                        $msj = "Error al subir el documento, intentelo nuevamente luego";
                        $result = '0';
                        $selector = 'archivo2';
                    }
                }
            }
            $newdescripcion = Investigaciones::findOrFail($id);
            if ($img == 'null' && $link == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->autor = $autor;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->save();
            } else if ($img == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->autor = $autor;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->ruta = $ruta;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->save();
            } else if ($link == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->autor = $autor;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->save();
            } else {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->autor = $autor;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->ruta = $ruta;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->save();
            }
            $msj = 'LA INVESTIGACION FUE MODIFICADA EXITOSAMENTE';
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
        $borrar = Investigaciones::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA INVESTIGACION FUE ELIMINADA EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Investigaciones::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA INVESTIGACION FUE DESACTIVADA EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA INVESTIGACION FUE ACTIVADA EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
