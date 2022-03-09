<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    use HasFactory;

    protected $table="ordenes";
    protected $guarded=["inventario"];
    protected $appends=["producto"];
    public function cliente(){
        return $this->belongsTo(User::class,"id_usuario");
    }

    public function getProductoAttribute(){
        $producto=productos::where("id",$this->id_producto)->first();
        return $producto;
    }
}
