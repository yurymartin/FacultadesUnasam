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

    public function __construct()
    {
        $this->middleware(['permission:create mallas escuelas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read mallas escuelas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update mallas escuelas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete mallas escuelas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "mallaescuelas";
        return view('mallaescuela.index', compact('modulo'));
    }
    public function index(Request $request)
    {

        $buscar = $request->busca;

        $mallaescuelas = DB::table('mallas as m')
            ->join('escuelas as e', 'e.id', '=', 'm.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('m.id', 'm.imagen', 'm.numcurricula', 'm.fechaRegistro', 'm.activo', 'e.nombre', 'e.id as idescu')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('m.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('m.numcurricula', 'like', '%' . $buscar . '%');
            })
            ->orderBy('m.id', 'desc')
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
            $msj = 'FALTA SELECCIONAR LA IMAGEN DE LA MALLA CURRICULAA';
            $selector = 'archivo';
        } else if ($numcurricula == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL NUMERO O CODIGO DE LA MALLA CURRICULAA';
            $selector = 'txtcurricula';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
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

                $msj = 'LA NUEVA MALLA CURRICULAR FUE REGISTRADO EXITOSAMENTE';
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
        $editDescripcion = $request->editDescripcion;
        $escuela_id = $request->escuela_id;
        $img = $request->imagen;

        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;

        if ($editDescripcion == null) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL NUMERO O CODIGO DE LA MALLA CURRICULAA';
            $selector = 'txtcurricula';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbescuela';
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
                    $editGalEscu->escuela_id = $escuela_id;
                    $editGalEscu->save();
                } else {

                    $editGalEscu->imagen = $imagen;
                    $editGalEscu->numcurricula = $editDescripcion;
                    $editGalEscu->escuela_id = $escuela_id;
                    $editGalEscu->save();
                }
                $msj = 'LA MALLA CURRICULAR FUE MODIFICADA EXITOSAMENTE';
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

        $borrar = MallaEscuela::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA MALLA CURRICULAR FUE ELIMINADA EXITOSAMENTE';

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
            $msj = 'LA MALLA CURRICULAR FUE DESACTIVADA EXITOSAMENTE';
        } else if (strval($estado) == "1") {
            $msj = 'LA MALLA CURRICULAR FUE ACTIVADA EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
