

@vite('resources/css/app.css')

<div class="h-screen w-full bg-blue-950 relative overflow-auto">
    <div class="py-10 px-4 text-center">
        <h1 class="font-bold text-white text-4xl">
            TAREAS DE PROGRAMACION AVANZADA
        </h1>
    </div>
    <div class="flex justify-around flex-col h-auto">
        <div>
            <div class="pl-28 font-bold text-white">
                <h2>HITO 3</h2>
            </div>
            <div class="py-14 flex justify-between px-36">
                <div class="font-semibold text-white">
                    <h3>TAREA 1 CRUD BASICO CON LARAVEL: </h3>
                </div>
                <div>
                    <button class="py-4 px-10 bg-[#127] rounded-lg text-white hover:scale-110 duration-75 ease-linear">
                        <a href="{{ route('lunch.index') }}">
                            IR A CRUD
                        </a>
                    </button>
                </div>
            </div>
            <div class="py-14 flex justify-between px-36">
                <div class="font-semibold text-white">
                    <h3>TAREA 2 CON RELACIONES CON LARAVEL: </h3>
                </div>
                <div>
                    <button class="py-4 px-10 bg-[#127] rounded-lg text-white hover:scale-110 duration-75 ease-linear">
                        <a href="{{ route('lunch.index') }}">
                            IR A CRUD
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
