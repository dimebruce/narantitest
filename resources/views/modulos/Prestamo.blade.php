@extends('inicio')

@section('contenido')

<div class="content-wrapper text-center">
    <section class="content-header">
        <h1>Prestamo de libros</h1>

        <div class="row">
            <div class="col-md-12 text-left">
                <h4>Asignar prestamo al folio: {{ $prestamo->id }}</h4>

                <h5>Administrador: <b>{{ $administrador->name }}</b></h5>
                <h5>Socio: <b>{{ $socio->name }}</b></h5>
                <h5>fecha: <b>{{ $prestamo->fecha }}</b></h5>
            </div>
            <div class="col-md-12 bg-success">
                <table class="table bordered table-hover table-sthiped DT2">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($libros as $l)
                            <tr>
                                <td>{{$l -> titulo}}</td>
                                <td>{{$l -> autor}}</td>
                                <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image" width="20" height="auto"></td>
    
                                @if ($l -> stock < 10 && $l -> stock > 5)
                                    
                                    <td><button class="btn btn-warning"> {{$l -> stock}} </button> </td>
                                    
                                @elseif($l -> stock <= 5)
                                    
                                     <td><button class="btn btn-danger"> {{$l -> stock}} </button> </td>
    
                                @else
    
                                    <td><button class="btn btn-success"> {{$l -> stock}} </button> </td>
    
                                @endif

                                <td>
                                    
                                    <form method="post">

                                        @csrf

                                        <input type="hidden" name="id_prestamo" value="{{ $prestamo->id }}">
                                        <input type="hidden" name="id_libro" value="{{ $l->id }}">
                                        <input type="hidden" name="stock" value="{{ $l->stock }}">

                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>

                                    </form>

                                </td>    
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table bordered table-hover table-sthiped DT1">
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>Socio</th>
                            <th>Cantidad Prestada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($librosPrestados as $lp)
                            {{-- {{dd($libros)}} --}}
                            @foreach ($libros as $lib)
                                @if ($lib->id == $lp->id_libro)
                                    <tr>
                                        <td>{{ $lib -> titulo }}</td>
                                        <td>{{ $lib -> autor }}</td>
                                        <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image" width="20" height="auto"></td>
                                        <td>{{ $socio -> name }}</td>
                                        <td>{{ $lp -> cantidad }}</td>
                                        <td>

                                            <form method="POST" action="{{ url('quitarLibroPrestamo/'.$prestamo->id) }}">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $lp->id }}">
                                                <input type="hidden" name="id_libro" value="{{ $lib->id }}">
                                                <input type="hidden" name="stock" value="{{ $lib->stock }}">

                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" ></i></button>

                                            </form>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach

                        {{-- @foreach ($prestamos as $p)
                            @foreach ($p->libros as $l)
                            <tr>
                                <td>p->fecha</td>
                                <td>p->cantidad</td>
                                <td>l->titulo</td>
                            </tr>
                                
                            @endforeach
                        @endforeach --}}

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection