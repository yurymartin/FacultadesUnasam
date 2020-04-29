<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;
use App\VideoFacultades;

class VideoFacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create videos facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read videos facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update videos facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete videos facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "videoFacultades";
        return view('videoFacultades.index', compact('modulo'));
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $videosfacultades = DB::table('videofacultades as vf')
            ->join('facultades as f', 'f.id', '=', 'vf.facultad_id')
            ->select('vf.id', 'vf.titulo', 'vf.descripcion', 'vf.link', 'vf.fecha', 'vf.activo', 'vf.borrado', 'vf.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('vf.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('vf.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('vf.titulo', 'like', '%' . $buscar . '%');
                $query->orwhere('f.nombre', 'like', '%' . $buscar . '%');
                $query->orwhere('f.abreviatura', 'like', '%' . $buscar . '%');
            })
            ->orderBy('vf.id')
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
                'total' => $videosfacultades->total(),
                'current_page' => $videosfacultades->currentPage(),
                'per_page' => $videosfacultades->perPage(),
                'last_page' => $videosfacultades->lastPage(),
                'from' => $videosfacultades->firstItem(),
                'to' => $videosfacultades->lastItem(),
            ],
            'videosfacultades' => $videosfacultades,
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
        $link = $request->link;
        $estado = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('link' => $link);
        $reglas2 = array('link' => 'required');
        $validator2 = Validator::make($input2, $reglas2);


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL VIDEO';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COPIAR Y LLENAR EL LINK DE YOUTUBE';
            $selector = 'link';
        } else {
            $newdescripcion = new VideoFacultades();
            $newdescripcion->titulo = $titulo;
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->link = $link;
            $newdescripcion->fecha = date('Y/m/d');
            $newdescripcion->activo = $estado;
            $newdescripcion->borrado = '0';
            $newdescripcion->facultad_id = $facultad_id;
            $newdescripcion->save();
            $msj = 'EL NUEVO LINK DEL VIDEO FUE REGISTRADO EXITOSAMENTE';
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
        $link = $request->link;

        $result = '1';
        $msj = '';
        $selector = '';

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('link' => $link);
        $reglas2 = array('link' => 'required');
        $validator2 = Validator::make($input2, $reglas2);


        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL VIDEO';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COPIAR Y LLENAR EL LINK DE YOUTUBE';
            $selector = 'link';
        } else {
            $newdescripcion = VideoFacultades::findOrFail($id);
            $newdescripcion->titulo = $titulo;
            $newdescripcion->descripcion = $descripcion;
            $newdescripcion->link = $link;
            $newdescripcion->facultad_id = $facultad_id;
            $newdescripcion->save();
            $msj = 'EL VIDEO FUE MODIFICADO EXITOSAMENTE';
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
        $borrar = VideoFacultades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL VIDEO FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = VideoFacultades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL VIDEO FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL VIDEO FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
