<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categorias= Categoria::all();
      return response()->json($categorias,200);
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

        $categoria= Categoria::create($request->all());;
        $categoria->save();
        return response()->json($categoria,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $categoria= Categoria::find($id);
       return response()->json($categoria,200);
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
        $categoria= Categoria::findOrFail( $id );
        $categoria->update($request->all());
        $categoria->save();
        return response()->json($categoria,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $categoria= Categoria::findOrFail( $id )->delete();
       return response()->json($categoria,status: 200);
    }

    public function filtro(Request $request){
        // Obtener el valor del apellido desde la query string
        $descripcion = $request->query('descripcion');

        // Filtrar clientes cuyo apellido coincida con el valor ingresado
        $clientes = Categoria::where('descripcion', 'LIKE', '%' . $descripcion . '%')->get();

        // Retornar los resultados en formato JSON
        return response()->json($clientes);
    }
}
