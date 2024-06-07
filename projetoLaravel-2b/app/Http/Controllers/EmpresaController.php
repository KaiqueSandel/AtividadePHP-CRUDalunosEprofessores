<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empresa = Empresa::all();
        return view("empresa.index", compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //vou mostrar o formulario de cadastro de cliente
        //metodo GET
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //salvar os dados na tabela clientes
        //método POST
        Empresa::create([
            'nome_fantasia' => $request->input('nome_fantasia'),
            'cnpj' => $request->input('cnpj'),
            'receita' => $request->input('receita')

        ]);
        return "Registro inserido com sucesso!";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //metodo GET
        $empresa = Empresa::findOrFail($id);
        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mostrar o formulario de edição
        //método GET
        $empresa = Empresa::findOrFail($id);
        return view ("empresa.edit", compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //salvar as alterações em registro
        //metodo PUT
        $empresa = Empresa::findOrFail($id);
        $empresa->update([
            'nome_fantasia' => $request->input('nome_fantasia'),
            'cnpj' => $request->input('cnpj'),
            'receita' => $request->input('receita')
        ]);
        return "Registro alterado com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //método DELETE
        //excluir o registro
        $empresa = Empresa::findOrFail($id);
        $empresa -> delete();
        return "Registro deletado com sucesso!";
    }

    public function delete(string $id)
    {
        //metodo GET
        //mostrar formulario com os dados antes de excluir
        $empresa = Empresa::findOrFail($id);
        return view ("empresa.delete", compact('empresa'));
    }
}