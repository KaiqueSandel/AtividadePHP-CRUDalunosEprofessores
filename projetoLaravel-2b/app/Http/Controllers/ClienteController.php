<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Cliente::all();
        return view("cliente.index", compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //vou mostrar o formulario de cadastro de cliente
        //metodo GET
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //salvar os dados na tabela clientes
        //método POST
        Cliente::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')

        ]);
        return "Registro inserido!";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //metodo GET
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mostrar o formulario de edição
        //método GET
        $cliente = Cliente::findOrFail($id);
        return view ("cliente.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //salvar as alterações em registro
        //metodo PUT
        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
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
        $cliente = Cliente::findOrFail($id);
        $cliente -> delete();
        return "Registro alterado com sucesso!";
    }

    public function delete(string $id)
    {
        //metodo GET
        //mostrar formulario com os dados antes de excluir
        $cliente = Cliente::findOrFail($id);
        return view ("cliente.delete", compact('cliente'));
    }
}
