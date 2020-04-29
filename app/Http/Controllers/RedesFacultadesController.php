<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RedesFacultad;
use Validator;
use Auth;
use DB;

class RedesFacultadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create redes sociales facultad'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read redes sociales facultad'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update redes sociales facultad'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete redes sociales facultad'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "redesfacultades";
        return view('redesfacultades.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $redesfacultades = DB::table('redesfacultades as rf')
            ->join('facultades as f', 'f.id', '=', 'rf.facultad_id')
            ->select('rf.id', 'rf.facebook', 'rf.google', 'rf.youtube', 'rf.twitter', 'rf.instagram', 'rf.linkedln', 'rf.pinterest', 'rf.activo', 'rf.borrado', 'rf.facultad_id', 'f.id as idfac', 'f.nombre', 'f.abreviatura')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('rf.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('rf.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('rf.facebook', 'like', '%' . $buscar . '%');
                $query->orWhere('rf.google', 'like', '%' . $buscar . '%');
                $query->orWhere('rf.youtube', 'like', '%' . $buscar . '%');
                $query->orWhere('rf.twitter', 'like', '%' . $buscar . '%');
                $query->orWhere('rf.instagram', 'like', '%' . $buscar . '%');
                $query->orWhere('rf.linkedln', 'like', '%' . $buscar . '%');
                $query->orWhere('rf.pinterest', 'like', '%' . $buscar . '%');
                $query->orWhere('f.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('rf.id')
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
                'total' => $redesfacultades->total(),
                'current_page' => $redesfacultades->currentPage(),
                'per_page' => $redesfacultades->perPage(),
                'last_page' => $redesfacultades->lastPage(),
                'from' => $redesfacultades->firstItem(),
                'to' => $redesfacultades->lastItem(),
            ],
            'redesfacultades' => $redesfacultades,
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
        $facebook = $request->facebook;
        $google = $request->google;
        $youtube = $request->youtube;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $linkedln = $request->linkedln;
        $pinterest = $request->pinterest;
        $activo = $request->activo;

        $result = '1';
        $msj = '';
        $selector = '';

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($facebook == null && $google == null && $youtube == null && $twitter == null && $instagram == null && $linkedln == null && $pinterest == null) {
            $result = 0;
            $msj = 'TODOS LOS CAMPOS NO PUEDEN ESTAR VACIOS';
            $selector = 'facebook';
        } else {
            if ($facebook == null) {
                $facebook = 'null';
            }
            if ($google == null) {
                $google = 'null';
            }
            if ($youtube == null) {
                $youtube = 'null';
            }
            if ($twitter == null) {
                $twitter = 'null';
            }
            if ($instagram == null) {
                $instagram = 'null';
            }
            if ($linkedln == null) {
                $linkedln = 'null';
            }
            if ($pinterest == null) {
                $pinterest = 'null';
            }
            $redesfacultad = new RedesFacultad();
            $redesfacultad->facebook = $facebook;
            $redesfacultad->google = $google;
            $redesfacultad->youtube = $youtube;
            $redesfacultad->twitter = $twitter;
            $redesfacultad->instagram = $instagram;
            $redesfacultad->linkedln = $linkedln;
            $redesfacultad->pinterest = $pinterest;
            $redesfacultad->activo = $activo;
            $redesfacultad->borrado = '0';
            $redesfacultad->facultad_id = $facultad_id;
            $redesfacultad->save();
            $msj = 'LA NUEVA LISTA DE REDES SOCIALES FUE CREADO EXITOSAMENTE';
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
        $facebook = $request->facebook;
        $google = $request->google;
        $youtube = $request->youtube;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $linkedln = $request->linkedln;
        $pinterest = $request->pinterest;

        $result = '1';
        $msj = '';
        $selector = '';

        if ($facultad_id == '0') {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA FACULTAD';
            $selector = 'facultad_id';
        } else if ($facebook == null && $google == null && $youtube == null && $twitter == null && $instagram == null && $linkedln == null && $pinterest == null) {
            $result = 0;
            $msj = 'TODOS LOS CAMPOS NO PUEDEN ESTAR VACIOS';
            $selector = 'facebook';
        } else {
            $redesfacultad = RedesFacultad::findOrFail($id);
            $redesfacultad->facebook = $facebook;
            $redesfacultad->google = $google;
            $redesfacultad->youtube = $youtube;
            $redesfacultad->twitter = $twitter;
            $redesfacultad->instagram = $instagram;
            $redesfacultad->linkedln = $linkedln;
            $redesfacultad->pinterest = $pinterest;
            $redesfacultad->facultad_id = $facultad_id;
            $redesfacultad->save();
            $msj = 'LA LISTA DE REDES SOCIALES FUE MODIFICADO EXITOSAMENTE';
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

        $borrar = RedesFacultad::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'LA LISTA DE REDES SOCIALES FUE ELIMINADO EXITOSAMENTE';

        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = RedesFacultad::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'LA LISTA DE REDES SOCIALES FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'LA LISTA DE REDES SOCIALES FUE ACTIVADO EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
