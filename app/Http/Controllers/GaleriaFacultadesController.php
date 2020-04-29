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

    public function __construct()
    {
        $this->middleware(['permission:create galerias facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read galerias facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update galerias facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete galerias facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "galeriaFacultades";
        return view('galeriaFacultades.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;

        $galeriafacultades = DB::table('galeriafacultades as gf')
            ->join('facultades as f', 'f.id', '=', 'gf.facultad_id')
            ->select('gf.id', 'gf.imagen', 'gf.descripcion', 'gf.activo', 'gf.borrado', 'gf.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where('gf.borrado', '0')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where(function ($query) use ($buscar) {
                $query->where('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('gf.id')
            ->paginate(10);

        $facultades = DB::table('facultades')
            ->where('activo', '1')
            ->where('borrado', '0')
            ->get();

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
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA IMAGEN PARA LA GALERIA DE LA FACULTAD';
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
                $newdescripcion->facultad_id = $facultad_id;
                $newdescripcion->save();
                $msj = 'LA NUEVA IMAGEN PARA LA GALERIA DE LA FACULTAD FUE REGISTRADA EXITOSAMENTE';
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
        $descripcion = $request->descripcion;
        $img = $request->imagen;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($request->hasFile('imagen')) {
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
            $editadescripcion->facultad_id = $facultad_id;
            $editadescripcion->save();
            $msj = 'LA IMAGEN PARA LA GALERIA DE LA FACULTAD FUE MODIFICADA EXITOSAMENTE';
        } else {
            $editadescripcion = GaleriaFacultades::findOrFail($id);
            $editadescripcion->descripcion = $descripcion;
            $editadescripcion->facultad_id = $facultad_id;
            $editadescripcion->save();
            $msj = 'LA IMAGEN PARA LA GALERIA DE LA FACULTAD FUE MODIFICADA EXITOSAMENTE';
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
        $msj = 'LA IMAGEN PARA LA GALERIA DE LA FACULTAD FUE ELIMINADA EXITOSAMENTE';
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
            $msj = 'LA IMAGEN PARA LA GALERIA DE LA FACULTAD FUE DESACTIVADA EXITOSAMENTE';
        } else if (strval($activo) == "1") {
            $msj = 'LA IMAGEN PARA LA GALERIA DE LA FACULTAD FUE ACTIVAD EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
