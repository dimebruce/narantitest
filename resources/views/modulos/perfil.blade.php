@extends('inicio')

@section('contenido')

<div class="content-wrapper">
    <section class="content-header text-center">
        <h1>Perfil de {{auth()->user()->name}}</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                
                <form method="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-12 col-xs-12 text-center">
                            @if(auth() -> user()-> foto == "")
                                 <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            @else
                                 <img src="{{url('storage/.auth()->user()foto')}}" class="user-image" alt="User Image">
                            @endif
                        </div>
                        <div class="col-md-6 col-xs-12 text-center">
                            <h2>Nombre: </h2>
                            <input type="text" class="input-lg" name="name" value="{{auth()->user()->name}}">
                            <h2>Documento: </h2>
                            <input type="text" class="input-lg" name="documento" value="{{auth()->user()->documento}}">
                        </div>
                        <div class="col-md-6 col-xs-12 text-center">
                            <h2>Email: </h2>
                            <input type="text" class="input-lg" name="email" value="{{auth()->user()->email}}">
                            <h2>Password: </h2>
                            <input type="text" class="input-lg" name="passwordNew" value="">
                            <input type="hidden" class="input-lg" name="password" value="{{auth()->user()->password}}">
                        </div>
                        <div class="box-footer text-center">
                            <button class="btn btn-success btn-lg">Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>
@endsection