<form 
    class="md:w-1/2 space-y-5"
    wire:submit.prevent='crearVacante'
>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')"
            placeholder="Ej. Programador Laravel Full Stack"
        />
        
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select
            id="salario"
            wire:model="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario )
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select
            id="categoria"
            wire:model="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria )
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')"
            placeholder="Ej. Netflix, Uber, Shopify"
        />
    </div>
    
    @error('empresa')
        <livewire:mostrar-alerta :message="$message" />
    @enderror
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')"
        />
        
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        <textarea
            wire:model="descripcion"
            placeholder="Ej. Descripción general del Puesto, experiencia"
            class="rounded-md border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"
        ></textarea>
        
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen"
            accept="image/*"
        />
        
        {{-- <div class="my-5 w-96">
            @if($imagen)
                Imagen:
                <img 
                    src="{{ $imagen->temporaryUrl() }}"
                />
            @endif
        </div> --}}
        
        <div class="my-5 w-96">
            <x-input-label :value="__('Imagen Actual')" />
            <img 
                src="{{ asset('storage/vacantes/' . $imagen) }}" 
                alt={{ 'Imagen Vacante ' . $titulo}} 
            />
        </div>
        
        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    
    <x-primary-button class="w-full justify-center">
        Guardar Cambios
    </x-primary-button>
</form>
