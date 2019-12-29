@extends('layouts.front')

@section('title','Productos')
 
@section('main')
        <main class="productos">
            <div class="container">
                <div class="row">
                    <div class="col s12 miga">
                        <p><a href="{{ url('productos/'.$categoria->familia) }}">PRODUCTOS</a> | <a href="{{ url('productos/'.$categoria->familia.'/'.$categoria->id) }}">{{ strtoupper($categoria->nombre)}}</a> | <a href="{{ url('productos/'.$categoria->familia.'/'.$categoria->id.'/'.$producto->id) }}">{{ strtoupper($producto->nombre)}}</a></p>
                    </div>
                    <div class="col l3">
                        <ul class="menu-lateral">
                            @foreach($categorias as $item)
                            <li class="categoria">
                                <a href="{{ url('productos/'.$item->familia.'/'.$item->id) }}">
                                    <p>{{$item->nombre}}</p>
                                </a>
                                @if($categoria->id==$item->id)
                                <ul class="menu-productos">
                                    @foreach($item->productos()->orderBy('orden','asc')->get() as $nodo)
                                    <li class="producto">
                                        <a href="{{ url('productos/'.$item->familia.'/'.$item->id.'/'.$nodo->id) }}">
                                            <p>{{$nodo->nombre}}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col l9">
                        <div class="row detalles">
                            <div class="col l5">
                                @php
                                    $imagen = $producto->imagenes()->first();
                                @endphp
                                <img id="imagen-grande" src="{{ asset('/img/imagenes/'.$imagen->imagen) }}" class="responsive-img">
                                <div class="row">
                                    @foreach($producto->imagenes()->get() as $imagen)
                                    <div class="col s4">
                                        <img class="miniatura responsive-img" src="{{ asset('/img/imagenes/'.$imagen->imagen) }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col l7">
                                <h4>{{$producto->nombre}}</h4>
                                <div class="linea-inferior"></div>
                                <h5>Detalles</h5>
                                {{$producto->detalles }}
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="rojo">Medidas</td>
                                            <td>{{$producto->medidas}}</td>
                                        </tr>
                                        <tr>
                                            <td class="rojo">Colores</td>
                                            <td>{{$producto->colores}}</td>
                                        </tr>
                                        <tr>
                                            <td class="rojo">Unidades</td>
                                            <td>{{$producto->unidades}}</td>
                                        </tr>
                                        <tr>
                                            <td class="rojo">Código</td>
                                            <td>{{$producto->codigo}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if($producto->video!="-"&&$producto->video!=""&&$producto->video!=null)
                        <div class="row video">
                            <div class="col l5 info">
                                Para más información sobre el producto, mirá el video a continuación
                            </div>
                            <div class="col l7">
                                <div class="video-container">
                                    <iframe width="853" height="480" src="//www.youtube.com/embed/{{$producto->video}}?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row relacionados">
                            <div class="col s12">
                                <h4>Productos relacionados</h4>
                            </div>
                            @foreach($categoria->productos()->get() as $item)
                                @php
                                    $imagen = $item->imagenes()->first();
                                @endphp
                                @if($item->id!=$producto->id)
                                <div class="col l4">
                                    <a href="{{ url('productos/'.$categoria->familia.'/'.$categoria->id.'/'.$item->id) }}">
                                        <div class="card">
                                            <div class="imagen">
                                                    <img src="{{ asset('/img/imagenes/'.$imagen->imagen) }}" class="responsive-img">
                                                <div class="capa">
                                                    <label>+<br>Ingresar</label>
                                                </div>
                                            </div>
                                            <div class="titulo">
                                                <p>{{$item->nombre}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
@endsection