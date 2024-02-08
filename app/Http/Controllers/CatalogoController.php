<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('formulario');
    }

    public function processForm(Request $request)
    {
        // Aquí puedes manejar la lógica de procesamiento del formulario
        $catalogo = $request->input('catalogo');
        $nombre = $request->input('nombre');

        // Puedes realizar acciones adicionales aquí

        return "Formulario enviado: Catalogo = $catalogo, Nombre = $nombre";
    }
}
