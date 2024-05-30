<form class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            name="titulo" 
            :value="old('titulo')"
            placeholder="Ej. Programador Laravel Full Stack"
        />
    </div>
    
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select
            id="salario"
            name="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
        </select>
    </div>
    
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select
            id="categoria"
            name="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
        >
        </select>
    </div>
    
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            name="empresa" 
            :value="old('empresa')"
            placeholder="Ej. Netflix, Uber, Shopify"
        />
    </div>
    
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            name="ultimo_dia" 
            :value="old('ultimo_dia')"
        />
    </div>
    
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        <textarea
            name="descripcion"
            placeholder="Ej. Descripción general del Puesto, experiencia"
            class="rounded-md border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"
        ></textarea>
    </div>
    
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
        />
    </div>
    
    <x-primary-button class="w-full justify-center">
        Crear Vacante
    </x-primary-button>
</form>
