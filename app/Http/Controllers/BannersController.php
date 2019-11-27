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

    public function index1()
    {
        if (accesoUser([1, 2])) {

            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "bannersFacultad";
            return view('bannersFacultad.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $buscar = $request->busca;
        $bannersFacultades = BannersFacultades::where('borrado', '=', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('titulo', 'like', '%' . $buscar . '%');
                $query->orWhere('descripcion', 'like', '%' . $buscar . '%');
                $query->orWhere('borrado', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return [
            'pagination' => [
                'total' => $bannersFacultades->total(),
                'current_page' => $bannersFacultades->currentPage(),
                'per_page' => $bannersFacultades->perPage(),
                'last_page' => $bannersFacultades->lastPage(),
                'from' => $bannersFacultades->firstItem(),
                'to' => $bannersFacultades->lastItem(),
            ],
            'bannersFacultades' => $bannersFacultades
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
        $img = $request->imagen;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;


        if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
            $selector = 'txttituloE';
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

                $newBanner->save();

                $msj = 'Nuevo Banner registrado con éxito';
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

        $titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $estado = $request->estado;
        $img = $request->imagen;

        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;

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
                $editBanner->save();
            } else {
                $editBanner->titulo = $titulo;
                $editBanner->descripcion = $descripcion;
                $editBanner->imagen = $imagen;
                $editBanner->activo = $estado;
                $editBanner->save();
            }

            $msj = 'El Banner fue modificada con éxito';
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

        $msj = 'El Banner seleccionado fue eliminada exitosamente.';


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
            $msj = 'El Banner fue Desactivado exitosamente.';
        } elseif (strval($estado) == "1") {
            $msj = 'El Banner fue Activado exitosamente.';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
