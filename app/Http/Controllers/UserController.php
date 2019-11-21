<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipopersona;
use App\Escuela;
use Validator;
use Auth;
use DB;

use App\Persona;
use App\Tipouser;
use App\User;

class UserController extends Controller
{

    public function index1()
    {
        if (accesoUser([1, 2])) {


            $idtipouser = Auth::user()->tipouser_id;
            $tipouser = Tipouser::find($idtipouser);
            $modulo = "usuario";
            return view('usuario.index', compact('tipouser', 'modulo'));
        } else {
            return view('adminlte::home');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->busca;
        $usuarios = DB::table('users')
            ->join('tipousers', 'tipousers.id', '=', 'users.tipouser_id')
            ->join('personas', 'personas.id', '=', 'users.persona_id')
            ->where('users.borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('personas.apellidos', 'like', '%' . $buscar . '%');
                $query->orwhere('personas.nombres', 'like', '%' . $buscar . '%');
                $query->orWhere('users.name', 'like', '%' . $buscar . '%');
            })
            ->orderBy('users.id')
            ->select('users.id as idUser', 'users.name as username', 'users.email', 'users.activo', 'users.borrado', 'personas.id as idPer', 'personas.nombres', 'personas.apellidos', 'personas.dni', 'personas.direccion', 'personas.genero', 'personas.telefono', 'tipousers.id as idtipouser', 'tipousers.nombre as tipouser')
            ->paginate(30);
        $tipousers = Tipouser::orderBy('id')->get();
        return [
            'pagination' => [
                'total' => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page' => $usuarios->perPage(),
                'last_page' => $usuarios->lastPage(),
                'from' => $usuarios->firstItem(),
                'to' => $usuarios->lastItem(),
            ],
            'usuarios' => $usuarios,
            'tipousers' => $tipousers
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

        $idPersona = $request->idPersona;
        $idUser = $request->idUser;

        $newDNI = $request->newDNI;
        $newApellidos = $request->newApellidos;
        $newNombres = $request->newNombres;
        $newTelefono = $request->newTelefono;
        $newDireccion = $request->newDireccion;
        $newGenero = $request->newGenero;

        $newUsername = $request->newUsername;
        $newEmail = $request->newEmail;
        $newPassword = $request->newPassword;

        $newTipoUser = $request->newTipoUser;
        $newEstado = $request->newEstado;

        $input1  = array('newDNI' => $newDNI);
        $reglas1 = array('newDNI' => 'required');

        $input2  = array('newApellidos' => $newApellidos);
        $reglas2 = array('newApellidos' => 'required');

        $input3  = array('newNombres' => $newNombres);
        $reglas3 = array('newNombres' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);


        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Debe ingresar el DNI del usuario';
            $selector = 'txtDNI';
        } elseif ($validator2->fails()) {
            $result = '0';
            $msj = 'Debe ingresar los apellidos del usuario';
            $selector = 'txtapellidos';
        } elseif ($validator3->fails()) {
            $result = '0';
            $msj = 'Debe ingresar los nombres del usuario';
            $selector = 'txtnombres';
        } else {

            $input7  = array('username' => $newUsername);
            $reglas7 = array('username' => 'required');

            $input8  = array('username' => $newUsername);
            $reglas8 = array('username' => 'unique:users,name' . ',1,borrado');

            $input9  = array('password' => $newPassword);
            $reglas9 = array('password' => 'required');

            $validator7 = Validator::make($input7, $reglas7);
            $validator8 = Validator::make($input8, $reglas8);
            $validator9 = Validator::make($input9, $reglas9);

            if (strlen($newTipoUser) == 0) {
                $result = '0';
                $msj = 'Debe seleccionar el tipo de usuario';
                $selector = 'cbuTipoUser';
            } elseif ($validator7->fails()) {
                $result = '0';
                $msj = 'Debe ingresar un Username válido';
                $selector = 'txtuser';
            } elseif ($validator8->fails()) {
                $result = '0';
                $msj = 'El username ya se encuentra registrado, consigne otro';
                $selector = 'txtuser';
            } elseif ($validator9->fails()) {
                $result = '0';
                $msj = 'Debe ingresar el password del usuario';
                $selector = 'txtclave';
            } else {
                //$idPersona
                if ($idPersona == "0") {

                    $newPersona = new Persona();

                    $newPersona->dni = $newDNI;
                    $newPersona->nombres = $newNombres;
                    $newPersona->apellidos = $newApellidos;
                    $newPersona->telefono = $newTelefono;
                    $newPersona->direccion = $newDireccion;
                    $newPersona->genero = $newGenero;
                    if ($newGenero == 1) {
                        $newPersona->imagen = 'userhombre.jpg';
                    } else {
                        $newPersona->imagen = 'usermujer.jpg';
                    }
                    $newPersona->activo = '1';
                    $newPersona->borrado = '0';

                    $newPersona->save();

                    $newUser = new User();

                    $newUser->name = $newUsername;
                    $newUser->email = $newEmail;
                    $newUser->password = bcrypt($newPassword);
                    $newUser->token2 = $newPassword;
                    $newUser->persona_id = $newPersona->id;
                    $newUser->tipouser_id = $newTipoUser;
                    $newUser->activo = $newEstado;
                    $newUser->borrado = '0';

                    $newUser->save();

                    $msj = 'Nuevo Usuario del Sistema registrado con éxito';
                } else {

                    $editPersona = Persona::findOrFail($idPersona);

                    $editPersona->nombres = $newNombres;
                    $editPersona->apellidos = $newApellidos;
                    $editPersona->telefono = $newTelefono;
                    $editPersona->direccion = $newDireccion;
                    $editPersona->genero = $newGenero;
                    if ($newGenero == 1) {
                        $editPersona->imagen = 'userhombre.jpg';
                    } else {
                        $editPersona->imagen = 'usermujer.jpg';
                    }
                    $editPersona->activo = '1';
                    $editPersona->borrado = '0';

                    $editPersona->save();

                    $newUser = new User();

                    $newUser->name = $newUsername;
                    $newUser->email = $newEmail;
                    $newUser->password = bcrypt($newPassword);
                    $newUser->token2 = $newPassword;
                    $newUser->persona_id = $newPersona->id;
                    $newUser->tipouser_id = $newTipoUser;
                    $newUser->activo = $newEstado;
                    $newUser->borrado = '0';

                    $newUser->save();

                    $msj = 'Nuevo Usuario del Sistema registrado con éxito';
                }
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

        $idPersona = $request->idPersona;
        $idUser = $request->idUser;

        $editDNI = $request->editDNI;
        $editNombres = $request->editNombres;
        $editApellidos = $request->editApellidos;
        $editDireccion = $request->editDireccion;
        $editTelefono = $request->editTelefono;
        $editGenero = $request->editGenero;

        $editUsername = $request->editUsername;
        $editEmail = $request->editEmail;
        $editPassword = $request->editPassword;

        $idtipo = $request->idtipo;
        $activo = $request->activo;


        $input1  = array('dni' => $editDNI);
        $reglas1 = array('dni' => 'required');

        $input2  = array('dni' => $editDNI);
        $reglas2 = array('dni' => 'unique:personas,dni,' . $id . ',id,borrado,0');

        $input3  = array('nombres' => $editNombres);
        $reglas3 = array('nombres' => 'required');

        $input4  = array('apellidos' => $editApellidos);
        $reglas4 = array('apellidos' => 'required');

        $validator1 = Validator::make($input1, $reglas1);
        $validator2 = Validator::make($input2, $reglas2);
        $validator3 = Validator::make($input3, $reglas3);
        $validator4 = Validator::make($input4, $reglas4);

        if ($validator1->fails()) {
            $result = '0';
            $msj = 'Debe ingresar el DNI del usuario';
            $selector = 'txtDNIE';
        } elseif ($validator2->fails()) {
            $result = '0';
            $msj = 'Debe ingresar un DNI valido y que no este en uso.';
            $selector = 'txtDNIE';
        } elseif ($validator3->fails()) {
            $result = '0';
            $msj = 'Debe ingresar el Nonbre del usuario';
            $selector = 'txtnombresE';
        } elseif ($validator4->fails()) {
            $result = '0';
            $msj = 'Debe ingresar el Apellido del usuario';
            $selector = 'txtapellidosE';
        } else {

            $input7  = array('username' => $editUsername);
            $reglas7 = array('username' => 'required');

            $input8  = array('username' => $editUsername);
            $reglas8 = array('username' => 'unique:users,name,' . $idUser . ',id,borrado,0');

            $validator7 = Validator::make($input7, $reglas7);
            $validator8 = Validator::make($input8, $reglas8);

            if (strlen($idtipo) == 0) {
                $result = '0';
                $msj = 'Debe seleccionar el tipo de usuario';
                $selector = 'cbuTipoUserE';
            } elseif ($validator7->fails()) {
                $result = '0';
                $msj = 'Debe ingresar un Username válido';
                $selector = 'txtuserE';
            } elseif ($validator8->fails()) {
                $result = '0';
                $msj = 'El username ya se encuentra registrado, consigne otro';
                $selector = 'txtuserE';
            } else {

                $editPersona = Persona::findOrFail($idPersona);

                $editPersona->dni = $editDNI;
                $editPersona->nombres = $editNombres;
                $editPersona->apellidos = $editApellidos;
                $editPersona->direccion = $editDireccion;
                $editPersona->telefono = $editTelefono;
                $editPersona->genero = $editGenero;
                if ($editGenero == 1) {
                    $editPersona->imagen = 'userhombre.jpg';
                } else {
                    $editPersona->imagen = 'usermujer.jpg';
                }

                $editPersona->save();


                $editUser = User::findOrFail($idUser);

                if (strlen($editPassword) == 0) {

                    $editUser->name = $editUsername;
                    $editUser->email = $editEmail;
                    $editUser->activo = $activo;
                    $editUser->tipouser_id = $idtipo;

                    $editUser->save();
                } else {
                    $editUser->name = $editUsername;
                    $editUser->email = $editEmail;
                    $editUser->password = bcrypt($editPassword);
                    $editUser->token2 = $editPassword;
                    $editUser->activo = $activo;
                    $editUser->tipouser_id = $idtipo;

                    $editUser->save();
                }

                $msj = 'Usuario modificado con éxito';
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

        $borrarUsuario = User::findOrFail($id);
        //$task->delete();

        $borrarUsuario->borrado = '1';

        $borrarUsuario->save();

        $msj = 'Usuario seleccionado eliminado exitosamente';


        return response()->json(["result" => $result, 'msj' => $msj]);
    }

    public function altabaja($id, $estado)
    {
        $result = '1';
        $msj = '';
        $selector = '';

        $updateUsuario = User::findOrFail($id);
        $updateUsuario->activo = $estado;
        $updateUsuario->save();

        if (strval($estado) == "0") {
            $msj = 'El Usuario fue Desactivado exitosamente';
        } elseif (strval($estado) == "1") {
            $msj = 'El Usuario fue Activado exitosamente';
        }

        return response()->json(["result" => $result, 'msj' => $msj, 'selector' => $selector]);
    }


    public function verpersona($dni)
    {
        $persona = Persona::where('dni', $dni)->get();

        $id = "0";
        $idUser = "0";

        foreach ($persona as $key => $dato) {
            $id = $dato->id;
        }

        $user = User::where('persona_id', $id)->where('borrado', '0')->get();

        foreach ($user as $key => $dato) {
            $idUser = $dato->id;
        }


        return response()->json(["persona" => $persona, "id" => $id, "user" => $user, "idUser" => $idUser]);
    }
}
