<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\User;
use Redirect;

class UserController extends Controller
{
    function crearUsuario()
    {
        return view('adm.usuarios.usuario.create',compact('section'));
    }

    function listarUsuarios()
    {
        $usuarios = User::all();
        $destacados_seccion = 'active';
        $usuarios_usuario_edit = 'active';

        return view('adm.usuarios.usuario.list',  compact('usuarios'));
    }

    function editarUsuario($id)
    {
        $usuario = User::find($id);

        return view('adm.usuarios.usuario.edit', compact('usuario'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        User::create($datos);
        $success = 'Usuario creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $usuario = User::find($id);
        $usuario->fill($datos);
        $usuario->save();
        $success = 'Usuario editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        $success = 'Usuario eliminado correctamente';
        return back()->with('success', $success);
    }

    public function login(LoginRequest $request){

    	if(Auth::attempt(['usuario'=> $request['usuario'], 'contrasenia'=> $request['contrasenia']]))
        {
    		return Redirect::to('adm/index');
    	}
        else
        {
            $error="el usuario y/o la contarseña son invalidos";
            return view('adm.login', compact('error'));
        }
    }

    public function logout()
    {
        //Auth::logout();
        return Redirect::to('adm');
    }
}
