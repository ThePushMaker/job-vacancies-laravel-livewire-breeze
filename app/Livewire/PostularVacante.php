<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
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
        
         // Validar si la fecha de cierre ya pasó a partir de la columna ultimo_dia
        if($this->vacante->ultimo_dia < now()) {
            session()->flash('error', 'La fecha de cierre de esta vacante ya pasó');
            return redirect()->back();
        }
     
        // Validar que el usuario no sea el reclutador
        if(auth()->user()->id == $this->vacante->reclutador->id) {
            session()->flash('error', 'No puedes postularte a una vacante que tu mismo publicaste');
        }else if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            // validar que el usuario no haya postulado a la vacante anteriormente
            session()->flash('error', 'Ya postulaste a esta vacante anteriormente');
        } else {
            // Postularse y almacenar el CV
            $cv = $this->cv->store('public/cv');
            $datos['cv'] = str_replace('public/cv/', '', $cv);
            
            // crear el candidato a la vacante
            $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
            ]);
            
            // crear la notificación y enviar email
            $this->vacante->reclutador->notify(new NuevoCandidato( $this->vacante->id, $this->vacante->titulo, auth()->user()->id ));
            
            // mostrar al usuario mensaje de ok
            session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');
            
            return redirect()->back();
        }
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
