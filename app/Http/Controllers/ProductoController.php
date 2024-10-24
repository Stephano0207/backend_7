<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $productos= Producto::all();
      return response()->json($productos,200);
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

        $producto= Producto::create($request->all());;
        $producto->save();
        return response()->json($producto,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $producto= Producto::find($id);
       return response()->json($producto,200);
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
        $producto= Producto::findOrFail( $id );
        $producto->update($request->all());
        $producto->save();
        return response()->json($producto,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $producto= Producto::findOrFail( $id )->delete();
       return response()->json($producto, 200);
    }
    public function filtro(Request $request){
        // Obtener el valor del apellido desde la query string
        $descripcion = $request->query('descripcion');

        // Filtrar clientes cuyo apellido coincida con el valor ingresado
        $clientes = Producto::where('descripcion', 'LIKE', '%' . $descripcion . '%')->get();

        // Retornar los resultados en formato JSON
        return response()->json($clientes);
    }
}
