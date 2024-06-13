<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
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
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);
        dd($nombre_imagen);
        
        
        // crear la vacante
        
        // crear un mensaje
        
        // redireccionar al usuario
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
