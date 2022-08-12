<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use App\Models\Socios;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller
{

    
    public function create()
    {
        $socios = Socios::All();
        $prestamos = Prestamos::All()->where('estado', 'Creado');

        return view('modulos.Crear-Prestamo', compact('socios', 'prestamos'));
    }

    
    public function store(Request $request)
    {
       
        $data = request();

        Prestamos::create([

            'id_socio' => $data["id_socio"],
            'id_user' => auth()->user()->id,
            'fecha' => $data["fecha"],
            'estado' => 'Creado',
            'total' => ''

        ]);
    }

    public function prestamo($id)
    {

        $prestamo      = Prestamos::find($id);
        $socio         = Socios::find($prestamo->id_socio);
        $administrador = User::find($prestamo->id_user);
        $libros        = Libro::All();
        // $librosprestados = DB::select('SELECT * FROM librosprestados');
        $librosPrestados = 
            DB::select('SELECT * FROM librosprestados WHERE id_prestamo ='.$id);

        // dd($libros);
        return view('modulos.Prestamo', compact('prestamo', 'socio', 'administrador', 'libros', 'librosPrestados'));

        // $prestamos = DB::prestamos->get('')
        // foreach(prestamos as p){
        //     p -> libros = DB librosprestados as t1 -> join libros as t2, t2.id_libro = t1.id_libro -> get
        // } 
    }

    public function agregarPrestamo($id)
    {
        $data = request();

        $stockNew = $data["stock"]-1;

        DB::table('libros')->where('id', $data["id_libro"])->update(['stock'=>$stockNew]);

        DB::table('librosprestados')->insert([

            'id_prestamo' => $data["id_prestamo"],
            'id_libro' => $data["id_libro"],
            'cantidad' => 1

        ]);

        return redirect('prestamo/'.$id);
    }

    public function quitarLibroPrestado($id)
    {
        $data = request();
        $stockNew = $data["stock"]+1;
        
        DB::table('libros')->where('id', $data["id_libro"])->update(['stock'=>$stockNew]);
        DB::table('librosprestados')->whereId($data["id"])->delete();
        return redirect('prestamo/'.$id);
    }
    public function mostrarMorosos()
    {   
        
        $socios = DB::select('SELECT * FROM socios');
        $libros = DB::select('SELECT * FROM libros');
        $prestamos = DB::select('SELECT * FROM prestamos');
        $morosos = 
            DB::select('SELECT * FROM librosprestados');
        return view('modulos.Morosos', compact('libros', 'morosos', 'prestamos','socios'));
    }

}
