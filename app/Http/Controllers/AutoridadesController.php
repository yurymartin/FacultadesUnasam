<?php

namespace App\Http\Controllers;

use App\Autoridades;
use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use DB;
use Storage;
use App\Persona;
use App\Tipouser;
use App\User;

class AutoridadesController extends Controller
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
            $modulo = "autoridades";
            return view('autoridades.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $autoridades = DB::table('autoridades as a')
            ->join('cargos as c', 'c.id', '=', 'a.cargo_id')
            ->join('personas as p', 'p.id', '=', 'a.persona_id')
            ->where('a.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('p.dni', 'like', '%' . $buscar . '%');
                $query->orWhere('p.nombres', 'like', '%' . $buscar . '%');
                $query->orWhere('p.apellidos', 'like', '%' . $buscar . '%');
            })
            ->orderBy('p.nombres')
            ->select('a.id as idauto', 'p.id as idper', 'p.dni', 'p.nombres', 'p.apellidos', 'p.genero', 'p.foto', 'c.cargo', 'a.descripcion', 'a.fechainicio', 'a.fechafin', 'a.activo', 'c.id as idcargo')
            ->paginate(10);

        $cargos = DB::table('cargos')
            ->where('borrado', '0')
            ->get();

        $personas = Persona::get();
        return [
            'pagination' => [
                'total' => $autoridades->total(),
                'current_page' => $autoridades->currentPage(),
                'per_page' => $autoridades->perPage(),
                'last_page' => $autoridades->lastPage(),
                'from' => $autoridades->firstItem(),
                'to' => $autoridades->lastItem(),
            ],
            'autoridades' => $autoridades,
            'cargos' => $cargos,
            'personas' => $personas,
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
        $result = '1';
        $msj = '';
        $selector = '';

        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $img = $request->imagen;
        $genero = $request->genero;

        $descripcion = $request->descripcion;
        $fechainicio = $request->fechainicio;
        $fechafin = $request->fechafin;
        $estado = $request->estado;
        $cargo_id = $request->cargo_id;


        $imagen = "";
        $segureImg = 0;

        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required|max:8');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');
        $validator3 = Validator::make($input3, $reglas3);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el dni del docente';
            $selector = 'dni';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete los nombres del docente';
            $selector = 'nombres';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete los apellidos del docente';
            $selector = 'apellidos';
        } else if ($cargo_id == 0) {
            $result = '0';
            $msj = 'Seleccione el cargo de la autoridad';
            $selector = 'cargo';
        } else if ($img == 'null') {
            $result = '0';
            $msj = 'Debe de Ingresar una Imagen';
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
                    $subir = Storage::disk('personas')->put($nuevoNombre, \File::get($img));
                    //$subir = true;
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
                Storage::disk('personas')->delete($imagen);
            } else {
                $persona = new Persona();
                $persona->dni = $dni;
                $persona->nombres = $nombres;
                $persona->apellidos = $apellidos;
                $persona->foto = $imagen;
                $persona->genero = $genero;
                $persona->save();

                $docente = new Autoridades();
                $docente->descripcion = $descripcion;
                $docente->fechainicio = $fechainicio;
                $docente->fechafin = $fechafin;
                $docente->activo = $estado;
                $docente->borrado = '0';
                $docente->cargo_id  = $cargo_id;
                $docente->persona_id = $persona->id;
                $docente->save();

                $msj = 'La Nueva Autoridad fue registrado con éxito';
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

        $idPersona = $request->idper;
        $idautoridad = $request->idauto;

        $dni = $request->dni;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $img = $request->imagen;
        $genero = $request->genero;

        $descripcion = $request->descripcion;
        $fechainicio = $request->fechainicio;
        $fechafin = $request->fechafin;
        $cargo_id = $request->cargo_id;


        $imagen = "";

        $input1  = array('dni' => $dni);
        $reglas1 = array('dni' => 'required|max:8');
        $validator1 = Validator::make($input1, $reglas1);

        $input2  = array('nombres' => $nombres);
        $reglas2 = array('nombres' => 'required');
        $validator2 = Validator::make($input2, $reglas2);

        $input3  = array('apellidos' => $apellidos);
        $reglas3 = array('apellidos' => 'required');
        $validator3 = Validator::make($input3, $reglas3);


        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Complete el dni de la autoridad';
            $selector = 'dniE';
        } else if ($validator2->fails()) {
            $result = '0';
            $msj = 'Complete los nombres de la autoridad';
            $selector = 'nombresE';
        } else if ($validator3->fails()) {
            $result = '0';
            $msj = 'Complete los apellidos de la autoridad';
            $selector = 'ApellidosE';
        } else if ($cargo_id == 0) {
            $result = '0';
            $msj = 'Seleccione el cargo de la autoridad';
            $selector = 'cdCargoE';
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
                    $subir = Storage::disk('personas')->put($nuevoNombre, \File::get($img));
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
            $persona = Persona::findOrFail($idPersona);
            $docente = Autoridades::findOrFail($idautoridad);
            if ($request->hasFile('imagen')) {
                $persona->dni = $dni;
                $persona->nombres = $nombres;
                $persona->apellidos = $apellidos;
                $persona->foto = $imagen;
                $persona->genero = $genero;
                $persona->save();

                $docente->descripcion = $descripcion;
                $docente->fechainicio = $fechainicio;
                $docente->fechafin = $fechafin;
                $docente->cargo_id  = $cargo_id;
                $docente->save();
            } else {
                $persona->dni = $dni;
                $persona->nombres = $nombres;
                $persona->apellidos = $apellidos;
                $persona->genero = $genero;
                $persona->save();

                $docente->descripcion = $descripcion;
                $docente->fechainicio = $fechainicio;
                $docente->fechafin = $fechafin;
                $docente->cargo_id  = $cargo_id;
                $docente->save();
            }

            $msj = 'La Autoridad fue modificado con éxito';
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
        $borrar = Autoridades::findOrFail($id);
        $borrar->borrado = '1';
        $borrar->save();
        $msj = 'La Autoridad fue eliminado exitosamente';
        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $activo)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $update = Autoridades::findOrFail($id);
        $update->activo = $activo;
        $update->save();

        if (strval($activo) == "0") {
            $msj = 'La Autoridad fue Desactivada exitosamente';
        } elseif (strval($activo) == "1") {
            $msj = 'La Autoridad fue Activada exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }
}
