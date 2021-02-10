<?php

namespace App\Http\Controllers;
use DB;

class SedeController extends Controller{
    public function getDepartamentos(){
        $departamentos = DB::table('departamentos')->get();
        return $departamentos;
    }

    public function getProvincias($departmento_id){
        $provincias = DB::table('provincias')->where('departamento_id',$departmento_id)->get();
        return $provincias;
    }
    public function getDistritos($departmento_id,$provincia_id){
        $distritos = DB::table('sedes')->where('departamento_id',$departmento_id)->where('provincia_id',$provincia_id)->get();
        return $distritos;
    }
}