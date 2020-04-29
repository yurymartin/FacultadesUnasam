<?php

namespace App\Http\Controllers;

use App\Facultades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Validator;
use DB;
use App\User;
use App\Persona;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:create usuario'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read usuario'], ['only' => ['index']]);
        $this->middleware(['permission:update usuario'], ['only' => ['edit', 'update', 'altabaja']]);
        $this->middleware(['permission:delete usuario'], ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $modulo = "usuarios";
        $buscar = $request->buscar;
        //dd($request->buscar);
        $data = User::where('borrado', '0')
            ->where(function ($query) use ($buscar) {
                $query->where('name', 'like', '%' . $buscar . '%');
                $query->orWhere('email', 'like', '%' . $buscar . '%');
            })
            ->orderBy('id', 'DESC')
            ->with('facultades')
            ->paginate(5);
        return view('users.index', compact('data', 'modulo'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulo = "usuarios";
        $roles = Role::pluck('name', 'name')->all();
        $facultades = DB::table('facultades')
            ->where('activo', '1')
            ->where('borrado', '0')
            ->get();
        return view('users.create', compact('roles', 'modulo', 'facultades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facultad = $request->facultad_id;
        $this->validate($request, [
            'dni' => 'required|max:8|unique:personas,dni',
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        if ($facultad != '0') {
            $newPersona = new Persona();
            $newPersona->dni = $request->dni;
            $newPersona->nombres = $request->nombres;
            $newPersona->apellidos = $request->apellidos;
            $newPersona->genero = $request->genero;

            if ($request->genero == 1) {
                $newPersona->foto = 'masculino.png';
            } else {
                $newPersona->foto = 'femenino.png';
            }
            $newPersona->save();
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->activo = $request->activo;
            $newUser->borrado = '0';
            $newUser->persona_id = $newPersona->id;
            $newUser->facultad_id = $facultad;
            $newUser->save();
            $newUser->assignRole($request->input('roles'));

            return redirect()->route('users.index')
                ->with('success', 'EL USUARIO FUE CREADO EXITOSAMENTE');
        } else {
            return redirect()->route('users.create')
                ->with('danger', 'FALTA SELECCIONAR LA FACULTAD');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = "usuarios";
        $user = User::find($id);
        return view('users.show', compact('user', 'modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulo = "usuarios";
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $facultades = Facultades::all();
        return view('users.edit', compact('user', 'roles', 'userRole', 'modulo', 'facultades'));
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
        $facultad = $request->facultad_id;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        if ($facultad != '0') {
            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = array_except($input, array('password'));
            }
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
            return redirect()->route('users.index')
                ->with('success', 'EL USUARIO FUE EDITADO EXITOSAMENTE');
        } else {
            return redirect()->route('users.edit', [$id])
                ->with('danger', 'FALTA SELECCIONAR LA FACULTAD');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->borrado = 1;
        $usuario->save();
        return redirect()->route('users.index')
            ->with('success', 'EL USUARIO FUE ELIMINADO EXITOSAMENTE');
    }

    public function altabaja($id, $activo)
    {
        $usuario = User::findOrFail($id);
        $usuario->activo = $activo;
        $usuario->save();
        return redirect()->route('users.index')
            ->with('success', 'FUE EDITADO EL ESTADO DEL USUARIO EXITOSAMENTE');
    }
}
