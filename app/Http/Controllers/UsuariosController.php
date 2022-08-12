<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');       
    }
    public function perfil(){
        return view('modulos.perfil');
    }
    public function perfilUpdate(Request $request)
    {
        if (auth()->user()->email != request('email')) {
            if (isset($data['passwordNew'])) {
                $data = request()->validate([

                    'name' => ['required', 'string', 'max:200'],
                    'email' => ['required', 'email', 'unique:users'],
                    'passwordNew' => ['required', 'string', 'min:3']
                    
                ]);
            }else {
                $data = request()->validate([

                    'name' => ['required', 'string', 'max:200'],
                    'email' => ['required', 'email', 'unique:users']
                ]);
            }
        }else {
            if (auth()->user()->email != request('email')) {
                if (isset($data['passwordNew'])) {
                    $data = request()->validate([
    
                        'name' => ['required', 'string', 'max:200'],
                        'email' => ['required', 'email'],
                        'passwordNew' => ['required', 'string', 'min:3']
                        
                    ]);
                }else {
                    $data = request()->validate([
    
                        'name' => ['required', 'string', 'max:200'],
                        'email' => ['required', 'email', 'unique:users']
                    ]);
                }
        }
        }

        if (request('documento')) {
            $documento = $request['documento'];
        } else {
            $documento = auth()->user()->documento;
        }

        //Change Password
        if (isset($data["passwordNew"])) {
           DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$data["name"], 'email'=>$data["email"], 'documento'=>$documento, 'password'=>Hash::make($data["passwordNew"])]);
        } else {
            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$data["name"], 'email'=>$data["email"], 'documento'=>$documento]);
        }

        return redirect('perfil');
        
    }
    public function index(){

        $usuarios = Usuarios::All();
        return view('modulos.Usuarios')->with('usuarios', $usuarios);
    }
   
}

