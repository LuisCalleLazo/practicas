
@extends('layouts.layout')

@section('section')
    <div class="w-full h-screen relative overflow-auto bg-[#456] p-10 flex justify-around flex-col">
        <div class="flex justify-around">
            <div>
                <h1 class="py-4 text-white font-semibold">VISTA DE VENTAS:</h1>
            </div>
            {{-- <div class="text-center flex flex-col justify-end text-white mr-10">
                <a href="{{ route('lunch.create') }}" class="bg-[#126] py-4 px-10 rounded-lg">
                    <i class="">Agregar cliente</i>
                </a>
            </div> --}}
            <div class="text-center flex flex-col justify-end text-white">
                <button class="bg-[#126] py-4 px-10 rounded-lg" onclick="document.getElementById('createSale').showModal()">
                    <i class="">Agregar venta</i>
                </button>
            </div>
        </div>
        <div class="w-full h-[80vh] m-auto rounded-xl z-50 mt-10">
            <table class="w-full z-10 rounded-3xl">
                <thead class="text-white bg-blue-950">
                    <th class="py-7">Cliente</th>
                    <th>Edad</th>
                    <th>Almuerzo</th>
                    <th>Total</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </thead>
                <tbody>

                    @foreach ( $sales as $sale)
                        <tr class="bg-[#569] text-center text-white">
                            <td class="py-7">{{$sale["customer_name"]}}</td>
                            <td>{{$sale["customer_age"]}}</td>
                            <td>{{$sale["lunch_name"]}}</td>
                            <td>{{$sale["lunch_price"]}} Bs</td>
                            <td>
                                <button class="text-blue-300" onclick="preUpdateSale({{$sale['customer_id']}}, {{$sale['lunch_id']}}, {{$sale['id']}})">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                            </td>
                            <td>
                                <button class="text-red-300" onclick="preDeleteSale({{$sale['id']}})">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <dialog id="createSale" class="rounded-xl w-[400px] h-[30vh] bg-black text-white">

        <div class="flex flex-col w-full h-full justify-between">
            <div class="pt-4font-bold h-[24vh] flex justify-around flex-col pl-16">
                <div>
                    <div>
                        <h2 class="font-bold">CLIENTE:</h2>
                    </div>
                    <div>
                        <select class="p-2 text-white bg-black" id="customerId">
                            @foreach ( $customers as $customer)
                                <option value={{$customer->id}}>
                                    {{$customer->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <h2 class="font-bold">ALMUERZO:</h2>
                    </div>
                    <div>
                        <select class="p-2 text-white bg-black" id="lunchId">
                            @foreach ( $lunchs as $lunch)
                                <option value={{$lunch->id}}>
                                    {{$lunch->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="pb-4 flex justify-end">
                <button class="bg-red-500 py-1 px-4 rounded-lg mr-4" id="btn-create">
                    Si
                </button>
                <button class="bg-[#458] py-1 px-4 rounded-lg mr-4" onclick="document.getElementById('createSale').close()">
                    No
                </button>
            </div>
        </div>
    </dialog>

    <script>
        document.getElementById("btn-create").addEventListener('click', () => {
            const customerId = document.getElementById('customerId').value;
            const lunchId = document.getElementById('lunchId').value;

            fetch("/api/sale", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ customerId, lunchId })
            }).then(response => {
                if (response.ok) {
                    alert('Creado exitosamente');
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    alert('Error al crear la venta');
                }
            }).catch(error => console.error('Error:', error));

            document.getElementById('createSale').close();
        });
    </script>




    <dialog id="deleteSale" class="rounded-xl w-[400px] h-[15vh] bg-black text-white">
        <div class="flex flex-col w-full h-full justify-between">
            <div class="pt-4 pl-4 font-bold" id="name_del">
                Seguro que quieres eliminar esta venta?
            </div>
            <div class="pb-4 flex justify-end">
                <button class="bg-red-500 py-1 px-4 rounded-lg mr-4" id="btn-del">
                    Si
                </button>
                <button class="bg-[#458] py-1 px-4 rounded-lg mr-4" onclick="document.getElementById('deleteSale').close()">
                    No
                </button>
            </div>
        </div>
    </dialog>
    <script>
        document.getElementById("btn-del").addEventListener('click', () =>
        {
            let id = localStorage.getItem('saleId');

            fetch(`/api/sale/${id}`, {

                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }

            }).then(response => {
                if (response.ok) {
                    alert('Venta eliminado con éxito');
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    alert('Error al eliminar la venta');
                }
            }).catch(error => console.error('Error:', error));

            document.getElementById('deleteSale').close();
        }, false);

        function preDeleteSale(saleId)
        {
            localStorage.setItem("saleId", saleId);
            document.getElementById("deleteSale").showModal();
        }
    </script>




    <dialog id="updateSale" class="rounded-xl w-[400px] h-[30vh] bg-black text-white">

        <div class="flex flex-col w-full h-full justify-between">
            <div class="pt-4font-bold h-[24vh] flex justify-around flex-col pl-16">
                <div>
                    <div>
                        <h2 class="font-bold">CLIENTE:</h2>
                    </div>
                    <div>
                        <select class="p-2 text-white bg-black" id="customerUpId">
                            @foreach ( $customers as $customer)
                                <option value={{$customer->id}}>
                                    {{$customer->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <h2 class="font-bold">ALMUERZO:</h2>
                    </div>
                    <div>
                        <select class="p-2 text-white bg-black" id="lunchUpId">
                            @foreach ( $lunchs as $lunch)
                                <option value={{$lunch->id}}>
                                    {{$lunch->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="pb-4 flex justify-end">
                <button class="bg-red-500 py-1 px-4 rounded-lg mr-4" id="btn-update">
                    Si
                </button>
                <button class="bg-[#458] py-1 px-4 rounded-lg mr-4" onclick="document.getElementById('updateSale').close()">
                    No
                </button>
            </div>
        </div>
    </dialog>

    <script>
        document.getElementById("btn-update").addEventListener('click', () => {
            const customerId = document.getElementById('customerUpId').value;
            const lunchId = document.getElementById('lunchUpId').value;

            let id = localStorage.getItem('saleId');

            fetch("/api/sale/" + id, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ customerId, lunchId })
            }).then(response => {
                if (response.ok) {
                    alert('Actualizado exitosamente');
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    alert('Error al actualizar la venta');
                }
            }).catch(error => console.error('Error:', error));

            document.getElementById('updateSale').close();
        });
        function preUpdateSale(customerId, lunchId, saleId)
        {
            localStorage.setItem("saleId", saleId);
            document.getElementById("customerUpId").value = customerId;
            document.getElementById("lunchUpId").value = lunchId;
            document.getElementById("updateSale").showModal();
        }
    </script>

@endsection
