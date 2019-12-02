<?php

namespace App\Http\Controllers;

use App\CampoLaborales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class CampoLaboralesController extends Controller
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
            $modulo = "campolaborales";
            return view('campolaborales.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    public function index(Request $request)
    {
        $buscar = $request->busca;
        $campolaborales = DB::table('campolaborales as c')
            ->join('escuelas as e', 'e.id', '=', 'c.escuela_id')
            ->select('c.id as idcampo', 'c.titulo', 'c.campolab', 'c.imagen', 'c.fecha', 'c.activo', 'e.id as idesc', 'e.nombre')
            ->where('c.borrado', '=', 0)
            ->where(function ($query) use ($buscar) {
                $query->where('c.titulo', 'like', '%' . $buscar . '%');
                $query->orWhere('c.campolab', 'like', '%' . $buscar . '%');
                $query->orWhere('e.nombre', 'like', '%' . $buscar . '%');
            })
            ->orderBy('c.id')
            ->paginate(10);

        $escuelas = DB::table('escuelas')
            ->where('borrado', '=', 0)
            ->get();

        return [
            'pagination' => [
                'total' => $campolaborales->total(),
                'current_page' => $campolaborales->currentPage(),
                'per_page' => $campolaborales->perPage(),
                'last_page' => $campolaborales->lastPage(),
                'from' => $campolaborales->firstItem(),
                'to' => $campolaborales->lastItem(),
            ],
            'campolaborales' => $campolaborales,
            'escuelas' => $escuelas,
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
        $campolab = $request->campolab;
        $img = $request->imagen;
        $estado = $request->activo;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('campolab' => $campolab);
        $reglas2 = array('campolab' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETA EL TITULO DEL CAMPO LABORAL';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL CAMPO LABORAL';
            $selector = 'campolab';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'FALTA INGRESAR LA IMAGEN';
            $selector = 'archivo';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbEscuelas';
        } else {
            if ($request->hasFile('imagen')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('imagen' => $img);
                $reglas = array('imagen' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('CampoLaboral')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('CampoLaboral')->delete($imagen);
            } else {
                $newdescripcion = new CampoLaborales();
                $newdescripcion->titulo = $titulo;
                $newdescripcion->campolab = $campolab;
                $newdescripcion->imagen = $imagen;
                $newdescripcion->fecha = date('Y/m/d');
                $newdescripcion->activo = $estado;
                $newdescripcion->borrado = '0';
                $newdescripcion->escuela_id = $escuela_id;
                $newdescripcion->save();
                $msj = 'EL NUEVO CAMPO LABORAL FUE REGISTRADO EXITOSAMENTE';
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
        $titulo = $request->titulo;
        $campolab = $request->campolab;
        $img = $request->imagen;
        $escuela_id = $request->escuela_id;

        $result = '1';
        $msj = '';
        $selector = '';

        $imagen = "";
        $segureImg = 0;

        $input1  = array('titulo' => $titulo);
        $reglas1 = array('titulo' => 'required');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('campolab' => $campolab);
        $reglas2 = array('campolab' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL TITULO DEL CAMPO LABORAL';
            $selector = 'titulo';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'FALTA COMPLETAR EL CAMPO LABORAL';
            $selector = 'campolab';
        } else if ($escuela_id == 0) {
            $result = '0';
            $msj = 'FALTA SELECCIONAR LA ESCUELA PROFESIONAL';
            $selector = 'cbEscuelas';
        } else {
            if ($request->hasFile('imagen')) {
                $aux = date('d-m-Y') . '-' . date('H-i-s');
                $input  = array('imagen' => $img);
                $reglas = array('imagen' => 'required|image|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE');
                $validator = Validator::make($input, $reglas);

                if ($validator->fails()) {
                    $segureImg = 1;
                    $msj = "El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario";
                    $result = '0';
                    $selector = 'archivo';
                } else {
                    $extension = $img->getClientOriginalExtension();
                    $nuevoNombre = $aux . "." . $extension;
                    $subir = Storage::disk('CampoLaboral')->put($nuevoNombre, \File::get($img));

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
                Storage::disk('CampoLaboral')->delete($imagen);
            } else {
                $newdescripcion = CampoLaborales::findOrFail($id);
                if ($request->hasFile('imagen')) {
                    $newdescripcion->titulo = $titulo;
                    $newdescripcion->campolab = $campolab;
                    $newdescripcion->imagen = $imagen;
                    $newdescripcion->fecha = date('Y/m/d');
                    $newdescripcion->escuela_id = $escuela_id;
                    $newdescripcion->save();
                    $msj = 'EL CAMPO LABORAL FUE MODIFICADO EXITOSAMENTE';
                } else {
                    $newdescripcion->titulo = $titulo;
                    $newdescripcion->campolab = $campolab;
                    $newdescripcion->fecha = date('Y/m/d');
                    $newdescripcion->escuela_id = $escuela_id;
                    $newdescripcion->save();
                    $msj = 'EL CAMPO LABORAL FUE MODIFICADO EXITOSAMENTE';
                }
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
        $borrar = CampoLaborales::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'EL CAMPO LABORAL FUE ELIMINADO EXITOSAMENTE';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = CampoLaborales::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'EL CAMPO LABORAL FUE DESACTIVADO EXITOSAMENTE';
        } elseif (strval($activo) == "1") {
            $msj = 'EL CAMPO LABORAL FUE ACTIVADI EXITOSAMENTE';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
