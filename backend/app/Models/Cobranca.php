<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // Importando Carbon

class Cobranca extends Model
{
    use HasFactory;

    protected $fillable = [ 'nome_cliente', 'valor', 'data_registro', 'tipo', 'status', 'telefone'];

}
