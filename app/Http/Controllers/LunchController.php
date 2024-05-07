<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lunch;

class LunchController extends Controller
{
    public function index() {

        $lunchs = Lunch::all();

        return view('lunch.index')
            ->with('lunchs', $lunchs);
    }
    public function show($id) {

        $lunch = Lunch::findOrFail($id);

        return view('lunch.show')
            ->with('lunch', $lunch);
    }
    public function create() {

        return view('lunch.create');
    }



    public function delete($id) {
        try {
            $lunch = Lunch::findOrFail($id);
            $lunch->delete();

            return response()->json(['success' => true, 'message' => 'Almuerzo eliminado con éxito']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el almuerzo']);
        }
    }
    public function update(Request $request, $id) {

        $lunch = Lunch::findOrFail($id);
        $lunch->update($request->all());

        // dd($request->all());

        return redirect()->route('lunch.index');
    }
    public function store(Request $request) {
        // Accede a los datos del formulario
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $isFamily = $request->input('is_family', false); // Retorna false si no está marcado
        $soup = $request->input('soup', false); // Retorna false si no está marcado

        // Aquí puedes procesar y guardar estos datos, por ejemplo:
        $lunch = new Lunch();
        $lunch->name = $name;
        $lunch->description = $description;
        $lunch->price = $price;
        $lunch->is_family = $isFamily;
        $lunch->soup = $soup;
        $lunch->save();
        return redirect()->route('lunch.index');
    }
}
