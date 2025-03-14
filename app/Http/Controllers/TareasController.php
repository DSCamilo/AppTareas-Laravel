<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    /**
     * index para mostrar todos los elementos
     * store para guardar una tarea
     * update para actualizar una tarea
     * destroy para eliminar una tarea
     * edit para mostrar el formulario de edicion de una tarea
     */

    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'title' => 'required|string|min:3|max:255',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos 3 caracteres.',
            'title.max' => 'El título no puede exceder los 255 caracteres.',
        ]);

        // Crear la tarea con Mass Assignment
        Tarea::create($request->only(['title']));

        // Redireccionar con mensaje de éxito
        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
    }
}
