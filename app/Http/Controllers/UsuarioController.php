<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
      $usuarios= Usuario::all();
      return response()->json($usuarios,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $usuario= Usuario::create($request->all());;
        $usuario->save();
        return response()->json($usuario,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $usuario= Usuario::find($id);
       return response()->json($usuario,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario= Usuario::findOrFail( $id );
        $usuario->update($request->all());
        $usuario->save();
        return response()->json($usuario,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $usuario= Usuario::findOrFail( $id )->delete();
       return response()->json($usuario, 200);
    }

    public function login(Request $request){
        $usuario= Usuario::all('*')
        ->where('correo','like',"$request->correo")
        ->where('contraseña','like',"$request->contraseña")->first();
        // return response()->json(count($usuario));
        if($usuario){
            return response()->json($usuario,200);

        }else{
            return response()->json(['login'=>false],500);
        }
    }
}
