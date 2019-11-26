@extends('layouts.master')

@section('content')

   <div class="row">

    <div class="col-sm-4">
        {{-- TODO: Imagen genérica de los productos --}}
       <img src="https://picsum.photos/200/300/?random" style="height:200px"/>

    </div>
    <div class="col-sm-8">
        {{-- TODO: Datos del producto --}}
        <p><b>Nombre: </b>{{$producto->nombre}}</p> 
        <p><b>Categoría: </b>{{$producto->categoria}}</p>
     
        @if ($producto->pendiente)
           <p><b>Estado: </b>Disponible</p>
            <button type="button" class="btn btn-primary">Comprar</button>
          
        @else
            <p><b>Estado: </b>No Disponible</p>
            <button type="button" class="btn btn-danger">Comprado</button>

        @endif
    
        <a  class="btn btn-warning" href="http://www.listacompra.test/productos/edit/{{$producto->id}}" >Editar Producto</a>
        <a class="btn btn-info" href="http://www.listacompra.test/productos">Volver</a>
        

    </div>
</div>

@stop