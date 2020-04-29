<?php

namespace App\Http\Controllers;

use App\GalEscuela;
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
use SebastianBergmann\Environment\Console;

class GalEscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create galerias escuelas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read galerias escuelas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update galerias escuelas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete galerias escuelas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "galeriaescuelas";
        return view('galeriaescuela.index', compact('modulo'));
    }
    public function index(Request $request)
    {

        $buscar = $request->busca;

        $galeriaescuelas = DB::table('galeriaescuelas as be')
            ->join('escuelas as e', 'e.id', '=', 'be.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('be.id', 'be.imagen', 'be.descripcion', 'e.nombre', 'be.activo', 'e.id as idescu')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('be.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('be.id', 'desc')
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
                'total' => $galeriaescuelas->total(),
                'current_page' => $galeriaescuelas->currentPage(),
                'per_page' => $galeriaescuelas->perPage(),
                'last_page' => $galeriaescuelas->lastPage(),
                'from' => $galeriaescuelas->lastItem(),
            ],
            'galeriaescuelas' => $galeriaescuelas,
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
        $descripcion = $request->descripcion;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";


        if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA IMAGEN';
            $selector = 'archivo';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA';
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
                    $subir = Storage::disk('galeriaE')->put($nuevoNombre, \File::get($img));

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
            $newBanner = new GalEscuela();
            $newBanner->imagen = $imagen;
            $newBanner->descripcion = $descripcion;
            $newBanner->activo = $estado;
            $newBanner->borrado = '0';
            $newBanner->escuela_id = $escuela_id;
            $newBanner->save();

            $msj = 'LA NUEVA IMAGEN PARA LA GALERIA FUE REGISTRADA ';
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

        $idGalEscuela = $request->idGalEscuela;
        $img = $request->imagen;
        $editDescripcion = $request->editDescripcion;
        $escuela_id = $request->escuela_id;


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
                    Storage::disk('banners')->delete($oldImagen);
                }

                $extension = $img->getClientOriginalExtension();
                $nuevoNombre = $aux . "." . $extension;
                $subir = Storage::disk('galeriaE')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('galeriaE')->delete($imagen);
        } else {

            $editBanner = GalEscuela::findOrFail($idGalEscuela);

            if (strlen($imagen) == 0) {


                $editBanner->descripcion = $editDescripcion;
                $editBanner->escuela_id = $escuela_id;
                $editBanner->save();
            } else {

                $editBanner->imagen = $imagen;
                $editBanner->descripcion = $editDescripcion;
                $editBanner->escuela_id = $escuela_id;
                $editBanner->save();
            }

            $msj = 'LA IMAGEN DE LA GALERIA FUE MODIFICADA EXITOSAMENTE';
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

        $borrar = GalEscuela::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA IMAGEN DE LA GALERIA FUE ELIMINADA EXITOSAMENTE';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
    public function altabaja($id, $estado)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = GalEscuela::findOrFail($id);
        $update->activo = $estado;

        $update->save();

        if (strval($estado) == "0") {
            $msj = 'LA IMAGEN DE LA GALERIA FUE DESACTIVADA EXITOSAMENTE';
        } elseif (strval($estado) == "1") {
            $msj = 'LA IMAGEN DE LA GALERIA FUE ACTIVADA EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
