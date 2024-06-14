<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia ;
    public $descripcion;
    public $imagen;
    
    use WithFileUploads;
    
    public function crearVacante()
    {
        $datos = $this->validate();
        
        // almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['nombre_imagen'] = str_replace('public/vacantes/', '', $imagen);
        
        
        // crear la vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['nombre_imagen'],
            'user_id' => auth()->user()->id,
        ]);
        
        // crear un mensaje
        session()->flash('mensaje', 'la Vacante se publicó correctamente');
        
        // redireccionar al usuario
        return redirect()->route('vacantes.index');
    }
    
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];
    
    public function render()
    {
        // consultar DB
        $salarios = Salario::all();
        $categorias = Categoria::all();
        
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
