<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publicacion;
use Validator;
use DB;
use Storage;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create publicaciones'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read publicaciones'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update publicaciones'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete publicaciones'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "publicaciones";
        return view('publicaciones.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $libros = DB::table('publicaciones as l')
            ->join('escuelas as e', 'e.id', '=', 'l.escuela_id')
            ->join('temas as t', 't.id', '=', 'l.tema_id')
            ->join('tipopublicaciones as tp', 'tp.id', '=', 'l.tipopublicacion_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('l.id as idlibros', 'l.titulo', 'l.descripcion', 'l.fechapublicacion', 'l.imagen', 'l.ruta', 'l.autor', 'l.activo', 'e.id as idesc', 'e.nombre', 't.tema', 't.id as idtema', 'tp.id as idtipo', 'tp.tipo')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('l.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('l.titulo', 'like', '%' . $buscar . '%');
                $query->orWhere('l.fechapublicacion', 'like', '%' . $buscar . '%');
                $query->orWhere('l.autor', 'like', '%' . $buscar . '%');
                $query->orWhere('t.tema', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
                $query->orWhere('tp.tipo', 'like', '%' . $buscar . '%');
            })
            ->orderBy('l.id')
            ->paginate(10);

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

        $temas = DB::table('temas')
            ->where('borrado', '=', 0)
            ->where('activo', '=', 1)
            ->get();

        $tipopublicaciones = DB::table('tipopublicaciones')
            ->where('borrado', '=', 0)
            ->where('activo', '=', 1)
            ->get();

        return [
            'pagination' => [
                'total' => $libros->total(),
                'current_page' => $libros->currentPage(),
                'per_page' => $libros->perPage(),
                'last_page' => $libros->lastPage(),
                'from' => $libros->firstItem(),
                'to' => $libros->lastItem(),
            ],
            'libros' => $libros,
            'escuelas' => $escuelas,
            'temas' => $temas,
            'tipopublicaciones' => $tipopublicaciones
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
        $escuela_id = $request->escuela_id;
        $tema_id = $request->tema_id;
        $tipopublicacion_id = $request->tipopublicacion_id;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $ruta = "";
        $imagen = "";

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('autor' => $autor);
        $reglas2 = array('autor' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL LIBRO';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL AUTOR DEL LIBRO';
            $selector = 'autor';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA IMAGEN DEL LIBRO';
            $selector = 'archivo';
        } else if ($link == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL ARCHIVO';
            $selector = 'archivo2';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'escuela_id';
        } else if ($tema_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL TEMA DE ESTUDIO DEL LIBRO';
            $selector = 'tema_id';
        }
        if ($tipopublicacion_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL TIPO DE PUBLICACION';
            $selector = 'tipopublicacion_id';
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
                    $subir = Storage::disk('LibrosP')->put($nuevoNombre, \File::get($img));
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
                    $msj = "EL ARCHIVO INGRESADO DEBE SER DE FORMATO PDF";
                    $result = '0';
                    $selector = 'archivo2';
                } else {
                    $extension2 = $link->getClientOriginalExtension();
                    $nuevoNombre2 = $aux2 . "." . $extension2;
                    $subir2 = Storage::disk('LibrosD')->put($nuevoNombre2, \File::get($link));
                    if ($subir2) {
                        $ruta = $nuevoNombre2;
                    } else {
                        $msj = "Error al subir el documento, intentelo nuevamente luego";
                        $result = '0';
                        $selector = 'archivo2';
                    }
                }
            }
            $newdescripcion = new Publicacion();
            $newdescripcion->titulo = $titulo;
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->fechapublicacion = $fechapublicacion;
            $newdescripcion->imagen = $imagen;
            $newdescripcion->ruta = $ruta;
            $newdescripcion->autor = $autor;
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->escuela_id = $escuela_id;
            $newdescripcion->tema_id = $tema_id;
            $newdescripcion->tipopublicacion_id = $tipopublicacion_id;
            $newdescripcion->save();
            $msj = 'EL NUEVO LIBRO FUE REGISTRADO EXITOSAMENTE';
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
        $escuela_id = $request->escuela_id;
        $tema_id = $request->tema_id;
        $tipopublicacion_id = $request->tipopublicacion_id;

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

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL LIBRO';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL AUTOR DEL LIBRO';
            $selector = 'autor';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'escuela_id';
        } else if ($tema_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL TEMA DE ESTUDIO DEL LIBRO';
            $selector = 'tema_id';
        }
        if ($tipopublicacion_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL TIPO DE PUBLICACION';
            $selector = 'tipopublicacion_id';
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
                    $subir = Storage::disk('LibrosP')->put($nuevoNombre, \File::get($img));
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
                    $msj = "EL ARCHIVO INGRESADO DEBE SER DE FORMATO PDF";
                    $result = '0';
                    $selector = 'archivo2';
                } else {
                    $extension2 = $link->getClientOriginalExtension();
                    $nuevoNombre2 = $aux2 . "." . $extension2;
                    $subir2 = Storage::disk('LibrosD')->put($nuevoNombre2, \File::get($link));
                    if ($subir2) {
                        $ruta = $nuevoNombre2;
                    } else {
                        $msj = "Error al subir el documento, intentelo nuevamente luego";
                        $result = '0';
                        $selector = 'archivo2';
                    }
                }
            }
            $newdescripcion = Publicacion::findOrFail($id);
            if ($img == 'null' && $link == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->autor = $autor;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->tipopublicacion_id = $tipopublicacion_id;
                $newdescripcion->save();
            } else if ($img == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->ruta = $ruta;
                $newdescripcion->autor = $autor;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->tipopublicacion_id = $tipopublicacion_id;
                $newdescripcion->save();
            } else if ($link == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->autor = $autor;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->tipopublicacion_id = $tipopublicacion_id;
                $newdescripcion->save();
            } else {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->fechapublicacion = $fechapublicacion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->ruta = $ruta;
                $newdescripcion->autor = $autor;
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->tema_id = $tema_id;
                $newdescripcion->tipopublicacion_id = $tipopublicacion_id;
                $newdescripcion->save();
            }
            $msj = 'EL LIBRO FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = Publicacion::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL LIBRO FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Publicacion::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL LIBRO FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL LIBRO FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
