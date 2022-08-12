@extends('inicio')

@section('contenido')

<div class="content-wrapper text-center">
    <section class="content-header">
        <h1>Socios con deuda de libros</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table bg-danger bordered table-hover table-sthiped DT1">
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Autor</th>
                            <th>Portada</th>
                            <th>ID Socio</th>
                            <th>Cantidad Prestada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($morosos as $m)
                            @if ($m -> cantidad >= 10)

                            @foreach ($prestamos as $p)
                                
                            
                            {{-- {{dd($libros)}} --}}
                            @foreach ($libros as $lib)
                                @if ($lib->id == $m->id_libro)
                                    <tr>
                                        <td>{{ $lib -> titulo }}</td>
                                        <td>{{ $lib -> autor }}</td>
                                        <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image" width="20" height="auto"></td>
                                        <td>{{ $p -> id_socio }}</td>
                                        <td>{{ $m -> cantidad }}</td>
                                        <td>
                                            <button class="btn btn-danger">Urgente</button>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            @endforeach
                            @endif
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