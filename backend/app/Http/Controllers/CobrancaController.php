<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Importando Carbon
use App\Models\Cobranca;
use Illuminate\Support\Facades\Storage;


class CobrancaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $data = Storage::disk('local')->get('mock_data.json');
    return response()->json(json_decode($data));
}

    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_cliente' => 'required|string', // Adiciona a validação do nome do cliente
            'valor' => 'required|numeric',
            'data_registro' => 'required', // Removido 'date'
            'tipo' => 'required|in:boleto,pix,credito',
            'status' => 'required|in:confirmada,em_aberto,atrasada',
            'telefone' => 'required|string'
        ]);
    
        // Verificar se a data está no formato correto (dd/mm/yyyy)
        if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $validatedData['data_registro'])) {
            return response()->json(['erro' => 'Formato de data inválido. Use dd/mm/yyyy.'], 422);
        }
    
        // Converter a data para o formato Y-m-d antes de salvar
        $validatedData['data_registro'] = Carbon::createFromFormat('d/m/Y', $validatedData['data_registro'])->format('Y-m-d');
    
        // Criação da cobrança
        $cobranca = Cobranca::create($validatedData);
    
        // Retornar a resposta em JSON
        return response()->json([
            'mensagem' => 'Cobrança criada com sucesso',
            'cobrança' => $cobranca
        ], 201);
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
