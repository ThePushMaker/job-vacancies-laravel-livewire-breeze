<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>
        
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>
            
            <p class="font-bold text-sm text-gray-800 my-3">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>
            
            <p class="font-bold text-sm text-gray-800 my-3">Categoría:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>
            
            <p class="font-bold text-sm text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>
        
    </div>
</div>
