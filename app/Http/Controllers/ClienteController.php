<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $clientes= Cliente::all();
      return response()->json($clientes,200);
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

        $cliente= Cliente::create($request->all());;
        $cliente->save();
        return response()->json($cliente,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $cliente= Cliente::find($id);
       return response()->json($cliente,200);
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
        $cliente= Cliente::findOrFail( $id );
        $cliente->update($request->all());
        $cliente->save();
        return response()->json($cliente,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $cliente= Cliente::findOrFail( $id );
       $cliente->delete();
       return response()->json($cliente, 200);
    }

    public function filtro(Request $request){
        // Obtener el valor del apellido desde la query string
        $apellido = $request->query('apellido');

        // Filtrar clientes cuyo apellido coincida con el valor ingresado
        $clientes = Cliente::where('apellido', 'LIKE', '%' . $apellido . '%')->get();

        // Retornar los resultados en formato JSON
        return response()->json($clientes);
    }
}
