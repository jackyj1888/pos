<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class librosControlador extends Controller
{
    public function listarLibros(){
        $datos = [
            ['id' => 1, 'nombre' => 'Harry Potter y la Piedra Filosofal'],
            ['id' => 2, 'nombre' => 'Harry Potter y la Cámara Secreta'],
            ['id' => 3, 'nombre' => 'Harry Potter y el Prisionero de Azkaban']
        ];
        return $datos;
    }

    public function codigoLibro($id){
        $datos = [
            ['id' => 1, 'nombre' => 'Harry Potter y la piedra Filosofal'],
            ['id' => 2, 'nombre' => 'Harry Potter y la camara secreta'],
            ['id' => 3, 'nombre' => 'Harry Potter y el prisionero de Azcaban']
        ];
        $res = array_filter($datos, function($item) use($id){
            return $item['id'] == $id;
        });
        return $res;
    }

    public function buscarLibro (Request $request){
        $datos = [
            ['id' => 1, 'nombre' => 'Harry Potter y la Piedra Filosofal'],
            ['id' => 2, 'nombre' => 'Harry Potter y la Camara Secreta'],
            ['id' => 3, 'nombre' => 'Harry Potter y el Prisionero de Azcaban']
        ];
        $nombre = $request-> query('nombre');
        $res = array_filter($datos, fn($item) => str_contains($item['nombre'], $nombre));
        return $res;
    }
}
