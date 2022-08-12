@extends('inicio')

@section('contenido')

<div class="content-wrapper text-center">
    <section class="content-header">
        <h1>Socios</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSocio">Crear Socio</button>
            </div>
            <div class="box-body">
                <table class="table bordered table-hover table-sthiped DT1">
                    <thead>
                        <tr>
                            <th>Número de Socio</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Foto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($Socios as $socio)
                            <tr>
                                <td>{{$socio -> id}}</td>
                                <td>{{$socio -> name}}</td>
                                <td>{{$socio -> address}}</td>
                                <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image" width="20" height="auto"></td>
                                <td>

                                    <a href="{{url('editarSocio/'.$socio->id)}}">

                                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        
                                    </a>

                                        <button class="btn btn-danger eliminarSocio" socioId="{{$socio->id}}" Socio="{{$socio->name}}"><i class="fa fa-trash"></i></button>
                                        

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="CrearSocio">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="" class="text-center">
                @csrf

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre</h2>
                            <input type="text" class="form-control input-lg" name="name" required="">
                        </div>
                        <div class="form-group">
                            <h2>Dirección</h2>
                            <input type="text" class="form-control input-lg" name="address" required="">
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

<?php

   $exp = explode('/', $_SERVER["REQUEST_URI"]);

?>    

@if($exp[count($exp)-2] == "editarSocio")
    <div class="modal fade" id="editarSocio">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{url('actualizarSocio/'.$soc->id)}}" class="text-center">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h2>Nombre</h2>
                                <input type="text" class="form-control input-lg" name="name" required="" value="{{$soc->name}}">
                            </div>
                            <div class="form-group">
                                <h2>Dirección</h2>
                                <input type="text" class="form-control input-lg" name="address" required="" value="{{$soc->address}}">
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
@endif
@endsection