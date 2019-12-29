<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Imagen;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    function buscar(Request $request)
    {
        $busqueda = $request->input('busqueda');
        $productos = Producto::where('nombre','like','%'.$busqueda.'%')->get();
        return view('resultados', compact('productos', 'busqueda'));
    }

    function detalle($familia, $categoria, $producto)
    {
        $categorias = Categoria::where('familia', $familia)->orderBy('orden','asc')->get();
        $categoria = Categoria::find($categoria);
        $producto = Producto::find($producto);
        return view('detalle', compact('categoria', 'categorias', 'producto'));
    }

    function productos($familia, $categoria)
    {
        $categorias = Categoria::where('familia', $familia)->orderBy('orden','asc')->get();
        $categoria = Categoria::find($categoria);
        $productos = $categoria->productos()->orderBy('orden','asc')->get();
        return view('productos', compact('categoria', 'categorias', 'familia', 'productos'));
    }

    function categorias($familia)
    {
        $categorias = Categoria::where('familia', $familia)->orderBy('orden','asc')->get();
        return view('categorias', compact('categorias', 'familia'));
    }

    function crearProducto($familia)
    {
        $categorias = Categoria::where('familia', $familia)->orderBy('orden','asc')->pluck('nombre', 'id');
        return view('adm.productos.producto.create',compact('categorias'));
    }

    function listarProductos($familia)
    {
        $productos = DB::table('categorias')
        ->join('productos', 'productos.categoria_id', '=', 'categorias.id')
        ->where('categorias.familia', '=', $familia)->orderBy('productos.orden','asc')->get();

        return view('adm.productos.producto.list',  compact('productos', 'familia'));
    }

    function editarProducto($familia, $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::where('familia', $familia)->orderBy('orden','asc')->pluck('nombre', 'id');

        return view('adm.productos.producto.edit', compact('producto', 'categorias', 'familia'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $producto = Producto::create($datos);

        $imagen = new Imagen();

        $file_save = Helpers::saveImage($request->file('imagen'), 'imagenes');
        $file_save ? $imagen->imagen = $file_save : false;
        $imagen->orden = 'aa';
        $imagen->producto_id = $producto->id;
        $imagen->save();

        $success = 'Producto creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $producto = Producto::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'productos',$producto->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $producto->fill($datos);
        $producto->save();
        $success = 'Producto editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
