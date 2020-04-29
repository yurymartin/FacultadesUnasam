<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RedesEscuela;
use Validator;
use Auth;
use DB;

class RedesEscuelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:create redes sociales escuelas'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read redes sociales escuelas'], ['only' => ['index1', 'index']]);
        $this->middleware(['permission:update redes sociales escuelas'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete redes sociales escuelas'], ['only' => ['delete']]);
    }

    public function index1()
    {
        $modulo = "redesescuelas";
        return view('redesescuelas.index', compact('modulo'));
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $redesfacultades = DB::table('redesescuelas as re')
            ->join('escuelas as e', 'e.id', '=', 're.escuela_id')
            ->join('departamentoacademicos as da', 'da.id', '=', 'e.departamentoacademico_id')
            ->select('re.id', 're.facebook', 're.google', 're.youtube', 're.twitter', 're.instagram', 're.linkedln', 're.pinterest', 're.activo', 're.borrado', 're.escuela_id', 'e.nombre')
            ->where(function ($query) {
                if (!auth()->user()->hasRole('super-admin')) {
                    $query->where('da.facultad_id', '=', auth()->user()->facultad_id);
                }
            })
            ->where('re.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('re.id')
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
                'total' => $redesfacultades->total(),
                'current_page' => $redesfacultades->currentPage(),
                'per_page' => $redesfacultades->perPage(),
                'last_page' => $redesfacultades->lastPage(),
                'from' => $redesfacultades->firstItem(),
                'to' => $redesfacultades->lastItem(),
            ],
            'redesfacultades' => $redesfacultades,
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
        $escuela_id = $request->escuela_id;
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

        if ($facebook == null && $google == null && $youtube == null && $twitter == null && $instagram == null && $linkedln == null && $pinterest == null) {
            $result = 0;
            $msj = 'TODOS LOS CAMPOS NO PUEDEN ESTAR VACIOS';
            $selector = 'facebook';
        } else if ($escuela_id == 0) {
            $result = 0;
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbescuela';
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
            $redesfacultad = new RedesEscuela();
            $redesfacultad->facebook = $facebook;
            $redesfacultad->google = $google;
            $redesfacultad->youtube = $youtube;
            $redesfacultad->twitter = $twitter;
            $redesfacultad->instagram = $instagram;
            $redesfacultad->linkedln = $linkedln;
            $redesfacultad->pinterest = $pinterest;
            $redesfacultad->escuela_id = $escuela_id;
            $redesfacultad->activo = $activo;
            $redesfacultad->borrado = '0';
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
        $facebook = $request->facebook;
        $google = $request->google;
        $youtube = $request->youtube;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $linkedln = $request->linkedln;
        $pinterest = $request->pinterest;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        if ($facebook == null && $google == null && $youtube == null && $twitter == null && $instagram == null && $linkedln == null && $pinterest == null) {
            $result = 0;
            $msj = 'TODOS LOS CAMPOS NO PUEDEN ESTAR VACIOS';
            $selector = 'facebook';
        } else if ($escuela_id == 0) {
            $result = 0;
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbescuela';
        } else {
            $redesfacultad = RedesEscuela::findOrFail($id);
            $redesfacultad->facebook = $facebook;
            $redesfacultad->google = $google;
            $redesfacultad->youtube = $youtube;
            $redesfacultad->twitter = $twitter;
            $redesfacultad->instagram = $instagram;
            $redesfacultad->linkedln = $linkedln;
            $redesfacultad->pinterest = $pinterest;
            $redesfacultad->escuela_id = $escuela_id;
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

        $borrar = RedesEscuela::findOrFail($id);
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

        $update = RedesEscuela::findOrFail($id);
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
