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
    public function index1()
    {
        if (accesoUser([1, 2])) {
            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "videoFacultades";
            return view('videoFacultades.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $videosfacultades = VideoFacultades::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('titulo', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id')
            ->paginate(10);

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


        if ($validator1->fails()) {
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


        if ($validator1->fails()) {
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
