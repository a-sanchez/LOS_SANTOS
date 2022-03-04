<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial_usuarios extends Model
{
    use HasFactory;
    protected $table = "historial_usuarios";

    protected $guarded=[];
    protected $appends=["producto"];
    public function cliente(){
        return $this->belongsTo(User::class,"id_usuario");
    }

    public function getProductoAttribute(){
        $producto=productos::where("id",$this->id_producto)->first();
        return $producto;
    }
}
