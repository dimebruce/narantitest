<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {

        $libros = Libro::All();
       return view('modulos.Libros', compact('libros'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([

            'titulo' => ['required', 'string', 'max:200'],
            'autor'  => ['required', 'string', 'max:200'],
            'stock'  => ['required']
            
        ]);

        Libro::create([
            'titulo' => $data["titulo"],
            'autor'  => $data["autor"],
            'stock'  => $data["stock"]
        ]);

        return redirect('Libros')->with('LibroCreado', 'OK');
    }

}
