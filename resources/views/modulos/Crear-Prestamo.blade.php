@extends('inicio')

@section('contenido')

<div class="content-wrapper text-center">
    <section class="content-header">
        <h1>Empezar un prestamo de libros</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">

                <div class="col-md-6">
                    <h2>Seleccione el socio</h2>
                    <form method="POST">
                        @csrf

                        <select class="form-control input-lg" id="select2" name="id_socio" required="">

                            <option value="">Seleccione ...</option>

                            @foreach($socios as $socio)
                                
                                <option value="{{ $socio->id}}"> {{ $socio->name }}</option>

                            @endforeach

                            {{-- Date --}}

                            <?php

                                date_default_timezone_set('America/Mexico_City');
                                $time = time();
                                $today = date("d/m/y");
                                $hour = date("H:i", $time);
                            
                                echo'<input type="hidden" name="fecha" value=" '.$today.' - '.$hour.' ">';

                            ?>

                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg">Empezar nuevo prestamo a socio</button>
                        </select>
                    </form>
                </div>
                <div class="col-md-6">
                    <br>
                    <br>
                    <h2>¿No está registrado? </h2>
                    <button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSocio">Añadir un nuevo socio</button>
                </div>
                
            </div>
            <div class="box-body">
                
                <table class="table bordered table-hover table-sthiped DT1">
                    <thead>
                        <tr>
                            <th>Folio Prestamo</th>
                            <th>Socio</th>
                            <th>Administrador</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($prestamos as $prestamo)
                            <tr>
                                <td>{{$prestamo -> id}}</td>
                                <td>{{$prestamo -> SOCIO->name}}</td>
                                <td>{{$prestamo -> ADMINISTRADOR->name}}</td>
                                <td>{{$prestamo -> fecha}}</td>
                                <td>{{$prestamo -> estado}}</td>
                                <td>
                                    <a href="{{ url('prestamo/'.$prestamo->id) }}">
                                        
                                        <button class="btn btn-success">Asignar libros</button>
                                    
                                    </a>
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

@endsection