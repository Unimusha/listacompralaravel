@extends('layouts.app')

@section('content')

   <div class="row">

    <div class="col-sm-4">
        {{-- TODO: Imagen genérica de los productos --}}
       <img src={{asset('storage/' . $producto->imagen)}} style="height:200px"/>

    </div>
    <div class="col-sm-8">
        {{-- TODO: Datos del producto --}}
        <p><b>Nombre: </b>{{$producto->nombre}}</p> 
        <p><b>Categoría: </b>{{$producto->categoria}}</p>
     


        @if($producto->pendiente)
        <form action="{{ action('ProductoController@putComprar') }}" method="POST">
            {{method_field('PUT')}}
            @csrf
              <p><b>Estado: </b>Disponible</p>
            <input type="hidden" name="idHidden" value="{{$producto->id}}">
            <button type="submit" class="btn btn-danger">Comprar</button>
        </form>
        @else
        <form action="{{ action('ProductoController@putComprar') }}" method="POST">
            {{method_field('PUT')}}
            @csrf
               <p><b>Estado: </b>No Disponible</p>
            <input type="hidden" name="idHidden" value="{{$producto->id}}">
            <button type="submit" class="btn btn-primary">Comprado</button>
        </form>
        @endif
    
        <a  class="btn btn-warning" href="http://www.listacompra.test/productos/edit/{{$producto->id}}" >Editar Producto</a>
        <a class="btn btn-info" href="http://www.listacompra.test/productos">Volver</a>
        

    </div>
</div>

@stop