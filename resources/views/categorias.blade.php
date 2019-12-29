@extends('layouts.front')

@section('title','Productos')
 
@section('main')
        <main class="categorias">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h3>Productos</h3>
                        <div class="linea-inferior"></div>
                    </div>
                    @foreach($categorias as $categoria)
                    <div class="col l3 m4 s12">
                        <a href="{{ url('productos/'.$familia.'/'.$categoria->id) }}">
                            <div class="card">
                                <div class="imagen">
                                    <img class="responsive-img" src="{{ asset('/img/categorias/'.$categoria->imagen) }}">
                                    <div class="capa">
                                        <label>+<br>Ingresar</label>
                                    </div>
                                </div>
                                <div class="titulo">
                                    <p>{{$categoria->nombre}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
@endsection