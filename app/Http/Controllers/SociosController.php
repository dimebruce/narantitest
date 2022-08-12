<?php

namespace App\Http\Controllers;

use App\Models\Socios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SociosController extends Controller
{ 
    public function index()
    {
        $socios = Socios::All();

        return view('modulos.Socios')->with('Socios', $socios);
    }
    public function socios(Request $request)
    {
        $data = request();

        Socios::create([

            'name'=>$data["name"],
            'address'=>$data["address"]

        ]);

        return redirect('Socios')->with('SocioCreado', 'OK');
    }

    public function edit($soc)
    {
        $soc = Socios::find($soc);
        $Socios = Socios::All();

        return view('modulos.Socios', compact('soc', 'Socios'));

    }

    
    public function update(Request $request, $id)
    {
        $data = request();
        DB::table('socios')->where('id', $id)->update(['name'=>$data["name"], 'address'=>$data["address"]]);

        return redirect('Socios')->with('socioActualizado', 'OK');
    }
    

    public function destroy($id)
    {
        Socios::destroy($id);

        return redirect('Socios');
    }

    

    
    public function crearSocioPrestamo(Request $request)
    {
        $data = request();

        Socios::create([

            'name'=>$data["name"],
            'address'=>$data["address"]

        ]);

        return redirect('Crear-Prestamo')->with('SocioCreado', 'OK');
    }



}
