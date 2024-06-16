<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="leading-10">
                <a href="#" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
            </div>
        </div>
    @endforeach
</div>