<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On; 
use Livewire\Component;
// use WithPagination;

class MostrarVacantes extends Component
{   
    #[On('eliminarVacante')]    
    public function eliminarVacante(Vacante $vacante) {
        // Compruebo Policy
        $this->authorize('delete', $vacante);
        // Elimino Imagen
        $result = Storage::delete('public/vacantes/'.$vacante->imagen);
        $vacante->delete();
    }
 
    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);
        
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
