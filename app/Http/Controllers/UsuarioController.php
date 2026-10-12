<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{ 
    public function inicio()
    {
        $usuarios = Usuario::all(); //aqui se llama al metodo all del ORM Eloquent
        return view('inicio', compact('usuarios')); //enviamos los datos a la vista
    }

    public function create(){
        return view('usuario.create');
    }
    
    public function store(UsuarioRequest $request):RedirectResponse
    {
        $user = new Usuario;
        $user->nombre = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $usuarios = Usuario::all(); 
        return redirect()->route('inicio', compact('usuarios'));
    }

    public function editar($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.editar', compact('usuario'));

    }

    public function update(UsuarioRequest $request, $id){
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

         $usuarios = Usuario::all(); //aqui se llama al metodo all del ORM Eloquent
        return view('inicio', compact('usuarios')); //enviamos los datos a la vista
    }

    public function destroy (Request $request, Usuario $id):RedirectResponse
    {
        $id->delete();
        return redirect()->route('inicio');
    }

}
