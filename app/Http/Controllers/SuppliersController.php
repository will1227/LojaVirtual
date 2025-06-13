<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Models\Type;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Suppliers::all()
        ]);
    }

    public function create()
    {
        return view('suppliers.create', [
            'types' => Type::all()
        ]);
    }

    public function store(Request $request)
    {
        Suppliers::create([
            'name' => $request->name,
            'description' => $request->description,
            'type_id' => $request->type_id
        ]);
        return redirect('/suppliers')->with('success', 'Fornecedor Adicionado
        com sucesso!');
    }

    public function edit($id){
        $supplier = Suppliers::find($id);
        $types = Type::all();
        return view('suppliers.edit', ['supplier' => $supplier, 'types' => $types]);
    }
    public function update(Request $request, $id)
    {
        $supplier = Suppliers::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'description' => $request->description,
            'type_id' => $request->type_id
        ]);
        return redirect('/suppliers')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id){
        $supplier = Suppliers::find($id);
        $supplier->delete();
        return redirect('/suppliers')->with('success', 'Fornecedor excluido com sucesso!');
    }
}
