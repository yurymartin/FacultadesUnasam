<?php

namespace App\Http\Controllers;

use App\ComiteEstudiantil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class ComiteEstudiantilController extends Controller
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
            $modulo = "comiteestudiantil";
            return view('comiteestudiantil.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $comiteestudiantil = ComiteEstudiantil::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('titulo', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return [
            'pagination' => [
                'total' => $comiteestudiantil->total(),
                'current_page' => $comiteestudiantil->currentPage(),
                'per_page' => $comiteestudiantil->perPage(),
                'last_page' => $comiteestudiantil->lastPage(),
                'from' => $comiteestudiantil->firstItem(),
                'to' => $comiteestudiantil->lastItem(),
            ],
            'comiteestudiantil' => $comiteestudiantil
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
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;


        if ($titulo == null) {
            $result = '0';
            $msj = 'Debe de Ingresar una Titulo';
            $selector = 'txttitulo';
        } else if ($descripcion == null) {
            $result = '0';
            $msj = 'Debe de Ingresar una descripcion';
            $selector = 'txtdescripcion';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
            $selector = 'archivo';
        
        } else{

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
                    $subir = Storage::disk('comiteE')->put($nuevoNombre, \File::get($img));

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

                Storage::disk('comiteE')->delete($imagen);
            } else {
                $newBanner = new ComiteEstudiantil();                
                $newBanner->titulo = $titulo;
                $newBanner->descripcion = $descripcion;
                $newBanner->imagen = $imagen;
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

        $idComite = $request->idComite;
        $editTitulo = $request->editTitulo;
        $editDescripcion = $request->editDescripcion;
        $img = $request->imagen;        
        $editEstado = $request->editEstado;
        $escuela_id=$request->escuela_id;
        
       
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
                    Storage::disk('comiteE')->delete($oldImagen);
                }

                $extension = $img->getClientOriginalExtension();
                $nuevoNombre = $aux . "." . $extension;
                $subir = Storage::disk('comiteE')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('comiteE')->delete($imagen);
        } else {

            $editBanner = ComiteEstudiantil::findOrFail($idComite);

            if (strlen($imagen) == 0) {

                $editBanner->titulo = $editTitulo;
                $editBanner->descripcion = $editDescripcion;
                $editBanner->activo = $editEstado;
                $editBanner->save();
            } else {

                $editBanner->titulo = $editTitulo;
                $editBanner->descripcion = $editDescripcion;
                $editBanner->imagen = $imagen;
                $editBanner->activo = $editEstado;
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


        $borrar = ComiteEstudiantil::findOrFail($id);
        //$task->delete();

        $borrar->borrado = '1';

        $borrar->save();

        $msj = 'Comite estudiantil eliminado exitosamente';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = ComiteEstudiantil::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'Comite estudiantil fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'Comite estudiantil fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}