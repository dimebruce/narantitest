@extends('inicio')

@section('contenido')

<div class="content-wrapper text-center">
    <section class="content-header">
        <h1>Administradores</h1>
    </section>
    <section class="content text-left item-aling-center">
        <div class="box">
            <div class="box-body">
                <table class="table bordered table-hover table-sthiped DT1">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Documento</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                            <tr>
                                <td>{{$user -> id}}</td>
                                <td>{{$user -> name}}</td>
                                <td>{{$user -> email}}</td>
                                <td>{{$user -> rol}}</td>
                                <td>{{$user -> documento}}</td>
                                @if($user-> foto == "")
                                    <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image" width="20" height="auto"></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
   
@endsection