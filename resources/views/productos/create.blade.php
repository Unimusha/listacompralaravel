@extends('layouts.app')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Crear producto
            </div>
            <div class="card-body" style="padding:30px">

                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                <form action="{{ action('ProductoController@postCreate') }}" method="post" enctype="multipart/form-data">
                    {{-- TODO: Protección contra CSRF --}}
                    @csrf 
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"
                            placeholder="Introduzca el nombre del producto" >
                    </div>

                    <div class="form-group">
                        {{-- TODO: Completa el input para el año --}}
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control"
                            placeholder="Introduzca el precio del producto" >
                    </div>

                    <div class="form-group">
                        {{-- TODO: Completa el input para el director --}}
                        <label for="categoria">Categoría</label>
                        <input type="text" name="categoria" id="categoria" class="form-control"
                            placeholder="Introduzca la categoría del producto" >

                    </div>

                    <div class="form-group">
                        {{-- TODO: Completa el input para el poster --}}
                        <label for="imagen">Poster</label>
                        <input type="text" name="imagen" id="imagen" class="form-control"
                            placeholder="Introduzca la imágen del producto" >
                    </div>
                    <label for="avatar">Seleccionar imagen:</label>
<input type="file" id="imagen" name="imagen">

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"
                            placeholder="Introduzca la descripción del producto"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Crear producto
                        </button>
                    </div>

                    {{-- TODO: Cerrar formulario --}}
                </form>
            </div>
        </div>
    </div>
</div>

@stop