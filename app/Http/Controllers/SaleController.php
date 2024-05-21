<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Lunch;

class SaleController extends Controller
{
    public function index() {

        $sales = Sale::with(['customer', 'lunch'])
        ->get()
        ->map(function ($sale) {
            return [
                'id' => $sale->id,
                'customer_name' => $sale->customer->name,
                'customer_age' => $sale->customer->age,
                'customer_id' => $sale->customer_id,
                'lunch_name' => $sale->lunch->name,
                'lunch_price' => $sale->lunch->price,
                'lunch_id' => $sale->lunch_id,
            ];
        });
        $customers = Customer::all();
        $lunchs = Lunch::all();

        return view('sale.index')
            ->with('sales', $sales)
            ->with('customers', $customers)
            ->with('lunchs', $lunchs);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'customerId' => 'required|integer',
            'lunchId' => 'required|integer',
        ]);

        Sale::create([
            'customer_id' => $validatedData['customerId'],
            'lunch_id' => $validatedData['lunchId'],
        ]);

        return response()->json(['message' => 'Sale created successfully'], 200);
    }

    public function delete($id)
    {
        try {
            $sale = Sale::findOrFail($id);
            $sale->delete();

            return response()->json(['success' => true, 'message' => 'Almuerzo eliminado con éxito']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el almuerzo']);
        }
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'customerId' => 'required|integer',
            'lunchId' => 'required|integer',
        ]);

        // Encuentra la venta que deseas actualizar por su ID
        $sale = Sale::findOrFail($id);

        // Actualiza los datos de la venta
        $sale->update([
            'customer_id' => $validatedData['customerId'],
            'lunch_id' => $validatedData['lunchId'],
        ]);

        // Puedes devolver una respuesta de éxito si lo deseas
        return response()->json(['message' => 'Sale updated successfully'], 200);
    }
}
