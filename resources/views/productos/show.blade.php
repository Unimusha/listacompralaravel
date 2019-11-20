@extends('layouts.master')

@section('content')

   <div class="row">

    <div class="col-sm-4">
        {{-- TODO: Imagen genérica de los productos --}}
       <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">
        {{-- TODO: Datos del producto --}}
        <p><b>Nombre: </b>{{$arrayProductos[0]}}</p> 
        <p><b>Categoría: </b>{{$arrayProductos[1]}}</p>
        <p><b>Estado: </b>Producto actualmente comprado</p>
        <button type="button" class="btn btn-danger">Pendiente de compra</button>
        <a  class="btn btn-warning" href="http://www.listacompra.test/productos/edit/{{$id}}" >Editar Producto</a>
        <a class="btn btn-info" href="http://www.listacompra.test/productos">Volver</a>
        

    </div>
</div>

@stop