<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller {
    public function getIndex() {
        $productos = Producto::all();
        return view('productos.index', array('productos' => $productos));
    }
    public function getShow($id) {
        $producto = Producto::find(($id));
        return view('productos.show', array('producto' => $producto));
    }
    public function getCreate() {
        return view('productos.create');
    }
    public function getEdit($id) {
        $producto = Producto::find(($id));
        return view('productos.edit', array('id' => $id, "producto" => $producto));
    }
/**$table->string("nombre");
$table->decimal("precio", 8, 2)->nullable()->default(null);
$table->string("categoria", 64);
$table->string("imagen")->nullable()->default(null);
$table->boolean("pendiente")->default(false);
$table->text("descripcion")->nullable()->default(null); */
    public function putEdit(Request $request) {
        $p              = Producto::findOrFail($request->idHidden);
        $p->nombre      = $request->nombre;
        $p->precio      = $request->precio;
        $p->categoria   = $request->categoria;
        $p->imagen      = $request->imagen;
        $p->descripcion = $request->descripcion;
        $p->save();
        return redirect(action('ProductoController@getIndex'));
    }

    public function postCreate(Request $request) {
        $p              = new Producto;
        $p->nombre      = $request->nombre;
        $p->precio      = $request->precio;
        $p->categoria   = $request->categoria;
        $p->imagen      = $request->imagen;
        $p->descripcion = $request->descripcion;
        $p->save();
        return redirect(action('ProductoController@getIndex'));
    }
    public function putComprar(Request $request) {
        $producto = Producto::findOrFail($request->idHidden);
        if ($producto->pendiente) {
            $producto->pendiente = false;
        } else {
            $producto->pendiente = true;
        }
        $producto->save();
 return view('productos.show', array('producto' => $producto));

    }

}
