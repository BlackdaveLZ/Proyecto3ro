<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function info(){
        return view('test.info');
        //dd('Ruta y controlador info');
    }

    public function contacts(){
        return view('test.contacts');       
        }


        public function laravel(){
            return view('test.laravel');
            //dd('Ruta y controlador laravel');
        }
        public function extension(){
            return view('test.extension');
            //dd('Ruta y controlador extension');
        }
        public function dominio(){
            return view('test.dominio');
            //dd('Ruta y controlador dominio');
        }

        public function regresar(){
            return view('welcome');
        }
       
}
