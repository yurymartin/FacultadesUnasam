<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BannersFacultades;
use Validator;
use Auth;
use DB;
use Storage;

use App\Persona;
use App\Tipouser;
use App\User;

class BannersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create banners facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read banners facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update banners facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete banners facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "bannersFacultad";
        return view('bannersFacultad.index', compact('modulo'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $buscar = $request->busca;
        $bannersFacultades = DB::table('bannerfacultades as bf')
            ->join('facultades as f', 'f.id', '=', 'bf.facultad_id')
            ->select('bf.id', 'bf.titulo', 'bf.descripcion', 'bf.imagen', 'bf.fechapublica', 'bf.activo', 'bf.borrado', 'bf.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where('bf.borrado', '=', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('bf.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where(function ($query) use ($buscar) {
                $query->where('bf.titulo', 'like', '%' . $buscar . '%');
                $query->orWhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orWhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('bf.id', 'desc')
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
                'total' => $bannersFacultades->total(),
                'current_page' => $bannersFacultades->currentPage(),
                'per_page' => $bannersFacultades->perPage(),
                'last_page' => $bannersFacultades->lastPage(),
                'from' => $bannersFacultades->firstItem(),
                'to' => $bannersFacultades->lastItem(),
            ],
            'bannersFacultades' => $bannersFacultades,
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


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($titulo == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL BANNER';
            $selector = 'txttitulo';
        } else if ($descripcion == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA DESCRIPCION DEL BANNER';
            $selector = 'txtdescripcion';
        } else if (!$request->hasFile('imagen')) {
            $result = '0';
            $msj = 'FALTA INGRESAR EL BANNER ';
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
                    $subir = Storage::disk('bannersF')->put($nuevoNombre, \File::get($img));

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

                Storage::disk('bannersF')->delete($imagen);
            } else {
                $newBanner = new BannersFacultades();
                $newBanner->titulo = $titulo;
                $newBanner->descripcion = $descripcion;
                $newBanner->imagen = $imagen;
                $newBanner->fechapublica = date('Y/m/d');
                $newBanner->activo = $estado;
                $newBanner->borrado = '0';
                $newBanner->facultad_id = $facultad_id;
                $newBanner->save();

                $msj = 'EL NUEVO BANNER FUE REGISTRADO EXITOSAMENTE';
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
        $result = '1';
        $msj = '';
        $selector = '';

        $facultad_id = $request->facultad_id;
        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $estado = $request->estado;
        $img = $request->imagen;

        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($titulo == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL BANNER';
            $selector = 'txttituloE';
        } else if ($descripcion == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR LA DESCRIPCION DEL BANNER';
            $selector = 'txtdescripcionE';
        } else {
            if ($request->hasFile('imagen')) {

                $aux = date('d-m-Y') . '-' . date('H-i-s');;
                $input  = array('image' => $img);
                $reglas = array('image' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {

                    if (strlen($oldImagen) > 0) {
                        Storage::disk('bannersF')->delete($oldImagen);
                    }

                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('bannersF')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('bannersF')->delete($imagen);
            } else {

                $editBanner = BannersFacultades::findOrFail($id);

                if (strlen($imagen) == 0) {
                    $editBanner->titulo = $titulo;
                    $editBanner->descripcion = $descripcion;
                    $editBanner->activo = $estado;
                    $editBanner->facultad_id = $facultad_id;
                    $editBanner->save();
                } else {
                    $editBanner->titulo = $titulo;
                    $editBanner->descripcion = $descripcion;
                    $editBanner->imagen = $imagen;
                    $editBanner->activo = $estado;
                    $editBanner->facultad_id = $facultad_id;
                    $editBanner->save();
                }

                $msj = 'EL BANNER FUE MODIFICADO EXITOSAMENTE';
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

        $borrarBanner = BannersFacultades::findOrFail($id);
        $borrarBanner->borrado = '1';
        $borrarBanner->save();

        $msj = 'EL BANNER FUE ELIMINADO EXITOSAMENTE';


        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $estado)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = BannersFacultades::findOrFail($id);
        $update->activo = $estado;
        $update->save();

        if (strval($estado) == "0") {
            $msj = 'EL BANNER FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($estado) == "1") {
            $msj = 'EL BANNER FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
