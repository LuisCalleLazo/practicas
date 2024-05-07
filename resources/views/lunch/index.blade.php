@extends('layouts.layout')

@section('section')
    <div class="w-full h-screen relative overflow-auto bg-[#456] p-10 flex justify-around flex-col">
        <div class="flex justify-end">
            {{-- <div>
                <h1 class="py-4 text-white font-semibold">BUSCADOR:</h1>
                <input type="text" name="" id="" class="w-[500px] py-3 rounded-md outline-none pl-4">
            </div> --}}
            <div class="text-center flex flex-col justify-end text-[55px] text-white">
                <a href="{{ route('lunch.create') }}">
                    <i class="bi bi-file-plus-fill"></i>
                </a>
            </div>
        </div>
        <div class="w-full h-[80vh] m-auto rounded-xl z-50 mt-10">
            <table class="w-full z-10 rounded-3xl">
                <thead class="text-white bg-blue-950">
                    <th class="py-7">Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </thead>
                <tbody>

                    @foreach ( $lunchs as $lunch)
                        <tr class="bg-[#569] text-center text-white">
                            <td class="py-7">{{$lunch->id}}</td>
                            <td>{{$lunch->name}}</td>
                            <td>{{$lunch->description}}</td>
                            <td>{{$lunch->price}} Bs</td>
                            <td>
                                <button class="text-blue-300">
                                    <a href="{{ route('lunch.show', $lunch->id) }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="text-red-300" onclick="preDeleteLunch({{$lunch->id}}, '{{$lunch->name}}')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <dialog id="DeleteLunch" class="rounded-xl w-[400px] h-[15vh] bg-black text-white">
            <div class="flex flex-col w-full h-full justify-between">
                <div class="pt-4 pl-4 font-bold" id="name_del">
                </div>
                <div class="pb-4 flex justify-end">
                    <button class="bg-red-500 py-1 px-4 rounded-lg mr-4" id="btn-del">
                        Si
                    </button>
                    <button class="bg-[#458] py-1 px-4 rounded-lg mr-4" onclick="document.getElementById('DeleteLunch').close()">
                        No
                    </button>
                </div>
            </div>
        </dialog>
        <script>
            document.getElementById("btn-del").addEventListener('click', () =>
            {

                let id = localStorage.getItem('idLounch');

                fetch(`/lunch/${id}`, {

                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }

                }).then(response => {
                    if (response.ok) {
                        alert('Almuerzo eliminado con éxito');
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    } else {
                        alert('Error al eliminar el almuerzo');
                    }
                }).catch(error => console.error('Error:', error));

                document.getElementById('DeleteLunch').close();
            }, false);

            function preDeleteLunch(lunchId, name)
            {
                localStorage.setItem('idLounch', lunchId);
                document.getElementById("DeleteLunch").showModal();
                document.getElementById("name_del").innerHTML = `
                    <h1>¿Deseas eliminar el almuerzo: ${name}?</h1>
                `;
            }
        </script>
    </div>
@endsection
