@extends('inicio')

@section('contenido')

<div class="content-wrapper text-center">
    <section class="content-header">
        <h1>Lista de libros</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearLibro">Agregar Libro</button>
            </div>
            <div class="box-body">
                <table class="table bordered table-hover table-sthiped DT1">
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($libros as $libros)
                            <tr>
                                <td>{{$libros -> id}}</td>
                                <td>{{$libros -> titulo}}</td>
                                <td>{{$libros -> autor}}</td>
                                <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image" width="20" height="auto"></td>

                                @if ($libros -> stock < 10 && $libros -> stock > 5)
                                    
                                    <td><button class="btn btn-warning"> {{$libros -> stock}} </button> </td>
                                    
                                @elseif($libros -> stock <= 5)
                                    
                                     <td><button class="btn btn-danger"> {{$libros -> stock}} </button> </td>

                                @else

                                    <td><button class="btn btn-success"> {{$libros -> stock}} </button> </td>

                                @endif
                                
                                
                                {{-- <td>

                                    <a href="{{url('editarSocio/'.$socio->id)}}">

                                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        
                                    </a>

                                        <button class="btn btn-danger eliminarSocio" socioId="{{$socio->id}}" Socio="{{$socio->name}}"><i class="fa fa-trash"></i></button>
                                        

                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="CrearLibro">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="" class="text-center">
                @csrf

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Titulo</h2>
                            <input type="text" class="form-control input-lg" name="titulo" required="">
                        </div>
                        <div class="form-group">
                            <h2>Autor</h2>
                            <input type="text" class="form-control input-lg" name="autor" required="">
                        </div>
                        <div class="form-group">
                            <h2>Stock</h2>
                            <input type="text" class="form-control input-lg" name="stock" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection