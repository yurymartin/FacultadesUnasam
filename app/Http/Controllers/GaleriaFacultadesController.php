<?php

namespace App\Http\Controllers;

use App\GaleriaFacultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class GaleriaFacultadesController extends Controller
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
            $modulo = "galeriaFacultades";
            return view('galeriaFacultades.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $galeriafacultades = GaleriaFacultades::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('imagen', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(10);

        return [
            'pagination' => [
                'total' => $galeriafacultades->total(),
                'current_page' => $galeriafacultades->currentPage(),
                'per_page' => $galeriafacultades->perPage(),
                'last_page' => $galeriafacultades->lastPage(),
                'from' => $galeriafacultades->firstItem(),
                'to' => $galeriafacultades->lastItem(),
            ],
            'galeriafacultades' => $galeriafacultades,
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
                    $subir = Storage::disk('GaleriaF')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('GaleriaF')->delete($imagen);
            } else {
                $newdescripcion = new GaleriaFacultades();
                $newdescripcion->imagen = $imagen;
                $newdescripcion->descripcion = $descripcion;
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->save();
                $msj = 'La Nueva imagen para la galeria de la facultad fue registrado con éxito';
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
        $img = $request->imagen;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

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
                $subir = Storage::disk('GaleriaF')->put($nuevoNombre, \File::get($img));

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
            $editadescripcion = GaleriaFacultades::findOrFail($id);
            $editadescripcion->descripcion = $descripcion;
            $editadescripcion->imagen = $imagen;
            $editadescripcion->save();
            $msj = 'La Nueva imagen para la galeria de la facultad fue modificado con éxito';
        } else {
            $editadescripcion = GaleriaFacultades::findOrFail($id);
            $editadescripcion->descripcion = $descripcion;
            $editadescripcion->save();
            $msj = 'La Nueva imagen para la galeria de la facultad fue modificado con éxito';
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
        $borrar = GaleriaFacultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'La Nueva imagen para la galeria de la facultad fue eliminado con éxito';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = GaleriaFacultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'La Nueva imagen para la galeria de la facultad fue Desactivado con éxito';
        } else if (strval($activo) == "1") {
            $msj = 'La Nueva imagen para la galeria de la facultad fue Activado con éxito';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
