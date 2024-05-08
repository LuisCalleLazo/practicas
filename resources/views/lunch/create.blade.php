
@extends('layouts.layout')

@section('section')
    <div class="w-full h-screen p-10 bg-[#457] text-white font-extrabold">
        <div class="text-center">
            <h1>CREAR ALMUERZO</h1>
        </div>
        <div class=" w-full h-[80vh] m-auto py-10">
            <form action="{{ route('lunch.store') }}" method="POST"
                class="m-auto w-[500px] h-[80vh] bg-white bg-opacity-15 rounded-lg backdrop-blur-sm border border-white border-opacity-20
                relative overflow-auto">
                @csrf
                <div class="h-full w-full flex justify-around flex-col items-center">
                    <div>
                        <div><h3>Nombre de almuerzo</h3></div>
                        <br>
                        <div class="text-black">
                            <input type="text" placeholder="Nombre de amuerzo" name="name" class="py-2 rounded-lg pl-4 w-[300px]">
                        </div>
                    </div>
                    <div>
                        <div><h3>Descripcion de almuerzo</h3></div>
                        <br>
                        <div class="text-black">
                            <input type="text" placeholder="Descripcion del amuerzo" name="description" class="py-2 rounded-lg pl-4 w-[300px]">
                        </div>
                    </div>
                    <div>
                        <div><h3>Precio de almuerzo</h3></div>
                        <br>
                        <div class="text-black">
                            <input type="number" placeholder="Precio del amuerzo" name="price" class="py-2 rounded-lg pl-4 w-[300px]">
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-around w-[300px]">
                            <label for="is_family">Es familiar</label>
                            <input type="checkbox" id="is_family" name="is_family" value="true" {{ old('is_family')? 'checked' : '' }}>
                        </div>
                        <br>
                        <div class="flex justify-around w-[300px]">
                            <label for="soup">LLeva sopa</label>
                            <input type="checkbox" id="soup" name="soup" value="true" {{ old('soup')? 'checked' : '' }}>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Crear" class="bg-blue-950 py-2 px-10 rounded-lg hover:cursor-pointer">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
