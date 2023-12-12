<?php

namespace App\Controllers;

    use App\Models\crudModel;

class Crud extends BaseController
{
    public function index()
    {
        $Crud = new crudModel();
        $datos = $Crud->listarNombres();

        $mensaje = session('mensaje');

        $data = [
                    "datos" => $datos,
                    "mensaje" => $mensaje
                ];

        return view('listado', $data);
    }

    public function crear() {
        $datos = [
                "nombre" => $_POST['nombre'],
                "paterno" => $_POST['paterno'],
                "materno" => $_POST['materno']
                ];
        $Crud = new crudModel();
        $respuesta = $Crud->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/')->with('mensaje','1');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','0');
        }
    }

    public function actualizar(){
        $datos = [
            "nombre" => $_POST['nombre'],
            "paterno" => $_POST['paterno'],
            "materno" => $_POST['materno']
                ];
        $idNombre = $_POST['idNombre'];
        
        $Crud = new crudModel();

        $respuesta = $Crud->actualizar($datos, $idNombre);

        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','3');
        }
    }

    public function obtenerNombre($idNombre) {
        $data = ["id_nombre" => $idNombre];
        $Crud = new crudModel();
        $respuesta = $Crud->obtenerNombre($data);

        $datos = ["datos" => $respuesta];

        return view('actualizar', $datos);
    }

    public function eliminar($idNombre) {
        $Crud = new crudModel();
        $data = ["id_nombre" => $idNombre];

        $respuesta = $Crud->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje','4');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','5');
        }
    }
    
}
