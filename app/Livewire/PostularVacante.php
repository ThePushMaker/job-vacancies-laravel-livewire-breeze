<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];
    
    public function postularme()
    {
        $datos = $this->validate();
        
        // almacenar la imagen cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);
        
        // crear la vacante
        
        // crear la notificación y enviar email
        
        // mostrar al ususario mensaje de ok
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
