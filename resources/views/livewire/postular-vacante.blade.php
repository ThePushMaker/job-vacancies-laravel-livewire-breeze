<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
    
    <form wire:submit.prevent='postularme' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')"/>
            <x-text-input 
                id="cv" 
                type="file" 
                accept=".pdf"
                wire:model="cv" 
                class="block mt-1 w-full"
            />
        </div>
        
        @error('cv')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
        
        <x-primary-button 
            class="my-5 justify-center"
            wire:loading.attr="disabled"
        >
            {{__('Postularme')}}
        </x-primary-button>
    </form>
</div>
