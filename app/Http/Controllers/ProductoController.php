<?php

namespace App\Http\Controllers;
use App\Producto;
use App\ProductoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//SELECT * FROM `productosuser` WHERE `user_id`= $user_id AND `producto_id` = $producto_id

class ProductoController extends Controller {
    public function getIndex($categoria = null) {
        if (isset($categoria) != null) {
            $productos = DB::table('productos')->where('categoria', $categoria)->get();

        } else {
            $productos = Producto::all();
        }
        /* SELECT categoria
        FROM productos
        GROUP BY categoria; */
        $todasCategorias = DB::table('productos')->select('categoria')->groupBy("categoria")->get();
        return view('productos.index', array('productos' => $productos, "todasCategorias" => $todasCategorias));
    }
    public function getShow($id) {
        $producto         = Producto::find(($id));
        $user             = auth()->user();
        $pu               = DB::table('productosuser')->where('producto_id', $id)->where('user_id', $user->id)->first();
        $productoComprado = isset($pu);
        if ($productoComprado) {
            echo "Producto Comprado";
        } else {
            echo "Producto NO Comprado";
        }

        return view('productos.show', array('producto' => $producto, "productoComprado" => $productoComprado));
    }
    public function getCreate() {
        return view('productos.create');
    }
    public function getEdit($id) {
        $producto = Producto::find(($id));
        return view('productos.edit', array('id' => $id, "producto" => $producto));
    }

    public function putEdit(Request $request) {
        $p            = Producto::findOrFail($request->idHidden);
        $p->nombre    = $request->nombre;
        $p->precio    = $request->precio;
        $p->categoria = $request->categoria;
        /*$p->imagen      = $request->imagen;*/
        if ($request->exists('imagen')) {
            $p->imagen = Storage::disk('public')->putFile('imagen', $request->file('imagen'));
        }
        $p->descripcion = $request->descripcion;
        $p->save();
        return redirect(action('ProductoController@getIndex'));
    }

    public function postCreate(Request $request) {
        $p            = new Producto;
        $p->nombre    = $request->nombre;
        $p->precio    = $request->precio;
        $p->categoria = $request->categoria;
        /* $p->imagen      = $request->imagen;*/
        if ($request->exists('imagen')) {
            $p->imagen = Storage::disk('public')->putFile('imagen', $request->file('imagen'));
        }
        $p->descripcion = $request->descripcion;
        $p->save();
        return redirect(action('ProductoController@getIndex'));
    }

    public function putComprar(Request $request) {
        $producto        = Producto::findOrFail($request->idHidden);
        $user            = auth()->user();
        $pu              = new ProductoUser;
        $pu->user_id     = $user->id;
        $pu->producto_id = $producto->id;
        $pu->save();
        return back();
        //return view('productos.show', array('producto' => $producto));
    }

    public function deleteComprado(Request $request) {
        $producto        = Producto::findOrFail($request->idHidden);
        $user            = auth()->user();
        $pu              = new ProductoUser;

       DB::table('productosuser')->where('producto_id', $producto->id)->where('user_id', $user->id)->delete();
        return back();
     // return view('productos.show', array('producto' => $producto));
    }

    /*
public function putComprar(Request $request) {

$producto = Producto::findOrFail($request->idHidden);
if ($producto->pendiente) {
$producto->pendiente = false;
} else {
$producto->pendiente = true;
}
$producto->save();
return view('productos.show', array('producto' => $producto));

}*/

}
