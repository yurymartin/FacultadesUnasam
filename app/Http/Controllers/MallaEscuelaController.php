<?php

namespace App\Http\Controllers;

use App\MallaEscuela;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;
use App\Escuela;

class MallaEscuelaController extends Controller
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
            $modulo = "mallaescuelas";
            return view('mallaescuela.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {

        $buscar = $request->busca;

        $mallaescuelas = DB::table('mallas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->select('m.id', 'm.imagen', 'm.numcurricula', 'm.fechaRegistro', 'm.activo', 'e.nombre', 'e.id as idescu')
            ->where('m.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('m.numcurricula', 'like', '%' . $buscar . '%');
            })
            ->orderBy('m.id', 'desc')
            ->paginate(10);

        $escuelas = Escuela::where('borrado', '0')
            ->where('activo', '=', '1')
            ->get();

        return [
            'pagination' => [
                'total' => $mallaescuelas->total(),
                'current_page' => $mallaescuelas->currentPage(),
                'per_page' => $mallaescuelas->perPage(),
                'last_page' => $mallaescuelas->lastPage(),
                'from' => $mallaescuelas->lastItem(),
            ],
            'mallaescuelas' => $mallaescuelas,
            'escuelas' => $escuelas
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
        $img = $request->imagen;
        $numcurricula = $request->numcurricula;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;


        if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
            $selector = 'archivo';
        } else if ($numcurricula == null) {
            $result = '0';
            $msj = 'Debe de Ingresar el numero de la curricula';
            $selector = 'txtcurricula';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
            $selector = 'cbescuela';
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
                    $subir = Storage::disk('mallaE')->put($nuevoNombre, \File::get($img));

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

                Storage::disk('mallaE')->delete($imagen);
            } else {
                $newBanner = new MallaEscuela();
                $newBanner->imagen = $imagen;
                $newBanner->numcurricula = $numcurricula;
                $newBanner->fechaRegistro = date('Y/m/d');
                $newBanner->escuela_id = $escuela_id;
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

        $idmalla = $request->idmalla;
        $editTitulo = $request->editTitulo;
        $editDescripcion = $request->editDescripcion;
        $editEstado = $request->editEstado;
        $escuela_id = $request->escuela_id;
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
                    Storage::disk('mallaE')->delete($oldImagen);
                }

                $extension = $img->getClientOriginalExtension();
                $nuevoNombre = $aux . "." . $extension;
                $subir = Storage::disk('mallaE')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('mallaE')->delete($imagen);
        } else {

            $editGalEscu = MallaEscuela::findOrFail($idmalla);

            if (strlen($imagen) == 0) {


                $editGalEscu->numcurricula = $editDescripcion;
                $editGalEscu->activo = $editEstado;
                $editGalEscu->escuela_id = $escuela_id;
                $editGalEscu->save();
            } else {

                $editGalEscu->imagen = $imagen;
                $editGalEscu->numcurricula = $editDescripcion;
                $editGalEscu->activo = $editEstado;
                $editGalEscu->fechapublica = date('Y/m/d');
                $editGalEscu->escuela_id = $escuela_id;
                $editGalEscu->save();
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
        $consulta1 = DB::table('mallas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->where('m.escuela_id', $id)
            ->count();
        if ($consulta1 > 0) {
            $result = '0';
            $msj = 'No se puede eliminar bannersescuelas enlazados con otras entidades';
        } else {
            $borrar = MallaEscuela::findOrFail($id);
            $borrar->borrado = '1';
            $borrar->save();
            $msj = 'La malla fue eliminada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
    public function altabaja($id, $estado)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = MallaEscuela::findOrFail($id);
        $update->activo = $estado;

        $update->save();

        if (strval($estado) == "0") {
            $msj = 'La malla fue Desactivado exitosamente.';
        } elseif (strval($estado) == "1") {
            $msj = 'La malla fue Activado exitosamente.';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
