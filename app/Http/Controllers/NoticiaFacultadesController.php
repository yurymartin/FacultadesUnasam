<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NoticiaFacultades;
use Validator;
use Auth;
use DB;
use Storage;

class NoticiaFacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create noticias facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read noticias facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update noticias facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete noticias facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "noticiaFacultades";
        return view('noticiaFacultades.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $noticias = DB::table('noticiafacultades as nf')
            ->join('facultades as f', 'f.id', '=', 'nf.facultad_id')
            ->select('nf.id', 'nf.titulo', 'nf.descripcion', 'nf.imagen', 'nf.fechapubli', 'nf.activo', 'nf.borrado', 'nf.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('nf.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('nf.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('nf.titulo', 'like', '%' . $buscar . '%');
                $query->orwhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('nf.id')
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
                'total' => $noticias->total(),
                'current_page' => $noticias->currentPage(),
                'per_page' => $noticias->perPage(),
                'last_page' => $noticias->lastPage(),
                'from' => $noticias->firstItem(),
                'to' => $noticias->lastItem(),
            ],
            'noticias' => $noticias,
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
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DE LA NOTICIA';
            $selector = 'titulo';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA IMAGEN DE LA NOTICIA';
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
                    $subir = Storage::disk('NoticiaF')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('NoticiaF')->delete($imagen);
            } else {
                $newdescripcion = new NoticiaFacultades();
                $newdescripcion->titulo = $titulo;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->fechapubli = date('Y/m/d');
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
                $msj = 'LA NUEVA NOTICIA FUE REGISTRADO EXITOSAMENTE';
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
        $img = $request->imagen;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;


        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DE LA NOTICIA';
            $selector = 'titulo';
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
                    $subir = Storage::disk('NoticiaF')->put($nuevoNombre, \File::get($img));

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
                $editadescripcion = NoticiaFacultades::findOrFail($id);
                $editadescripcion->titulo = $titulo;
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->imagen = $imagen;
                $editadescripcion->facultad_id = $facultad_id;
                $editadescripcion->save();
                $msj = 'LA NOTICIA FUE MODIFICADO EXITOSAMENTE';
            } else {
                $editadescripcion = NoticiaFacultades::findOrFail($id);
                $editadescripcion->titulo = $titulo;
                $editadescripcion->descripcion = $descripcion;
                $editadescripcion->facultad_id = $facultad_id;
                $editadescripcion->save();
                $msj = 'LA NOTICIA FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = NoticiaFacultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA NOTICIA FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = NoticiaFacultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA NOTICIA FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA NOTICIA FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
