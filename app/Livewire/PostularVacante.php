<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;
    
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];
    
    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
    
    public function postularme()
    {
        $datos = $this->validate();
        
        // almacenar la imagen cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);
        
        // crear el candidato a la vacante
        $this->vacante->candidatos()->create([
           'user_id' => auth()->user()->id,
           'cv' => $datos['cv']
        ]);
        
        // crear la notificación y enviar email
        
        // mostrar al ususario mensaje de ok
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
