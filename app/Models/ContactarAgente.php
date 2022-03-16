<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactarAgente extends Model
{
    use HasFactory;
    protected $table="contactar_agente";
    protected $guarded=['_token'];
}
