<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organigrama;
use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;


class OrganigramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create organigramas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read organigramas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update organigramas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete organigramas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "organigramafacultades";
        return view('organigrama.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $organigramafacultades = DB::table('organigramafacultades as of')
            ->join('facultades as f', 'f.id', '=', 'of.facultad_id')
            ->select('of.id', 'of.descripcion', 'of.imagen', 'of.fecha', 'of.activo', 'of.borrado', 'of.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('of.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where(function ($query) use ($buscar) {
                $query->where('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->where('of.borrado', '0')
            ->orderBy('of.id', 'desc')
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
                'total' => $organigramafacultades->total(),
                'current_page' => $organigramafacultades->currentPage(),
                'per_page' => $organigramafacultades->perPage(),
                'last_page' => $organigramafacultades->lastPage(),
                'from' => $organigramafacultades->firstItem(),
                'to' => $organigramafacultades->lastItem(),
            ],
            'organigramafacultades' => $organigramafacultades,
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
            $msj = 'FALTA SELECCIONAR LA IMAGEN DEL ORGANIGRAMA';
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
                    $subir = Storage::disk('Organigrama')->put($nuevoNombre, \File::get($img));

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

                Storage::disk('Organigrama')->delete($imagen);
            } else {
                $newBanner = new Organigrama();
                $newBanner->descripcion = $descripcion;
                $newBanner->imagen = $imagen;
                $newBanner->fecha = date('Y/m/d');
                $newBanner->activo = $estado;
                $newBanner->borrado = '0';
                $newBanner->facultad_id = $facultad_id;
                $newBanner->save();

                $msj = 'EL NUEVO ORGANIGRAMA FUE REGISTRADO EXITOSAMENTE';
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
        $descripcion = $request->descripcion;
        $idOrganigrama = $request->idOrganigrama;
        $img = $request->imagen;
        $editEstado = $request->editEstado;

        $imagen = "";
        $segureImg = 0;

        $oldImagen = $request->oldImagen;

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($request->hasFile('imagen')) {

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
                    Storage::disk('Organigrama')->delete($oldImagen);
                }

                $extension = $img->getClientOriginalExtension();
                $nuevoNombre = $aux . "." . $extension;
                $subir = Storage::disk('Organigrama')->put($nuevoNombre, \File::get($img));

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
            Storage::disk('Organigrama')->delete($imagen);
        } else {

            $editBanner = Organigrama::findOrFail($idOrganigrama);

            if (strlen($imagen) == 0) {
                $editBanner->descripcion = $descripcion;
                $editBanner->facultad_id = $facultad_id;
                $editBanner->save();
            } else {
                $editBanner->descripcion = $descripcion;
                $editBanner->imagen = $imagen;
                $editBanner->facultad_id = $facultad_id;
                $editBanner->save();
            }

            $msj = 'EL ORGANIGRAMA FUE MODIFICADO EXITOSAMENTE';
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


        $borrar = Organigrama::findOrFail($id);
        //$task->delete();

        $borrar->borrado = '1';

        $borrar->save();

        $msj = 'EL ORGANIGRAMA FUE ELIMINADO EXITOSAMENTE';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }
    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Organigrama::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL ORGANIGRAMA FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL ORGANIGRAMA FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
