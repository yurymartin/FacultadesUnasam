<?php

namespace App\Http\Controllers;

use App\DocumentoFacultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class DocumentoFacultadescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create documentos'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read documentos'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update documentos'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete documentos'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "documentoFacultades";
        return view('documentoFacultades.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $documentofacultades = DB::table('documentofacultades as df')
            ->join('facultades as f', 'f.id', '=', 'df.facultad_id')
            ->select('df.id', 'df.titulo', 'df.descripcion', 'df.imagen', 'df.ruta', 'df.fecha', 'df.activo', 'df.borrado', 'df.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('df.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('df.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('df.titulo', 'like', '%' . $buscar . '%');
                $query->orwhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('df.id')
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
                'total' => $documentofacultades->total(),
                'current_page' => $documentofacultades->currentPage(),
                'per_page' => $documentofacultades->perPage(),
                'last_page' => $documentofacultades->lastPage(),
                'from' => $documentofacultades->firstItem(),
                'to' => $documentofacultades->lastItem(),
            ],
            'documentofacultades' => $documentofacultades,
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
        $img = $request->imagen;
        $link = $request->ruta;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $ruta = "";
        $imagen = "";

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COOMPLETAR EL TITULO DEL DOCUMENTO';
            $selector = 'titulo';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA INGRESAR LA IMAGEN DEL DOCUMENTO';
            $selector = 'archivo';
        } else if ($link == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR EL DOCUMENTO DE LA FACULTAD';
            $selector = 'archivo2';
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
                    $subir = Storage::disk('DocFacP')->put($nuevoNombre, \File::get($img));
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
                    $msj = "EL DOCUMENTO DEBE SER EN FORMATO PDF";
                    $result = '0';
                    $selector = 'archivo2';
                } else {
                    $extension2 = $link->getClientOriginalExtension();
                    $nuevoNombre2 = $aux2 . "." . $extension2;
                    $subir2 = Storage::disk('DocFacD')->put($nuevoNombre2, \File::get($link));
                    if ($subir2) {
                        $ruta = $nuevoNombre2;
                    } else {
                        $msj = "Error al subir el documento, intentelo nuevamente luego";
                        $result = '0';
                        $selector = 'archivo2';
                    }
                }
            }
            $newdescripcion = new DocumentoFacultades();
            $newdescripcion->titulo = $titulo;
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->imagen = $imagen;
            $newdescripcion->ruta = $ruta;
            $newdescripcion->fecha = date('Y/m/d');
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->facultad_id = $facultad_id;
            $newdescripcion->save();
            $msj = 'EL DOCUMENTO DE LA FACULTAD FUE REGISTRADO EXITOSAMENTE';
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
        $img = $request->imagen;
        $link = $request->ruta;

        $result = '1';
        $msj = '';
        $selector = '';

        $ruta = "";
        $imagen = "";

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL DOCUMENTO';
            $selector = 'titulo';
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
                    $subir = Storage::disk('DocFacP')->put($nuevoNombre, \File::get($img));
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
                    $msj = "EL ARCHIVO TIENE QUE SER EN FORMATO PDF";
                    $result = '0';
                    $selector = 'archivo2';
                } else {
                    $extension2 = $link->getClientOriginalExtension();
                    $nuevoNombre2 = $aux2 . "." . $extension2;
                    $subir2 = Storage::disk('DocFacD')->put($nuevoNombre2, \File::get($link));
                    if ($subir2) {
                        $ruta = $nuevoNombre2;
                    } else {
                        $msj = "Error al subir el documento, intentelo nuevamente luego";
                        $result = '0';
                        $selector = 'archivo2';
                    }
                }
            }
            $newdescripcion = DocumentoFacultades::findOrFail($id);
            if ($img == 'null' && $link == 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
            } else if ($img == 'null' && $link != null) {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->ruta = $ruta;
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
            } else if ($link == 'null' && $img != 'null') {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
            } else {
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->ruta = $ruta;
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
            }
            $msj = 'EL DOCUMENTO FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = DocumentoFacultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL DOCUMENTO FUE ELIMANADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = DocumentoFacultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL DOCUMENTO FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL DOCUMENTO FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
