@extends('layouts.app')


@section('content')

    <div class="row">
 @php

 @endphp
    @foreach( $productos as $producto )
        @php
       
        @endphp
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="{{ url('/productos/show/' . $producto->id ) }}">
            <img src={{asset('storage/' . $producto->imagen)}} style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$producto->nombre}}
            </h4>
        </a>

    </div>
    @endforeach

</div>
<ul>
@foreach ( $todasCategorias as $c)
    <li>
    <a href="{{ url('/productos/'.$c->categoria ) }}">{{$c->categoria}}</a>
    </li>
@endforeach
</ul>
@stop