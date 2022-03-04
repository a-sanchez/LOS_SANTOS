<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productos extends Model
{
    use HasFactory;
    protected $table = "productos";

    protected $guarded=[];


    public function setFile(UploadedFile $imagen){
        if ($this->attributes["imagen"]!=null) {
            Storage::disk("public")->delete("storage/imagenes/productos/".$this->attributes["imagen"]);
        }
        // dd($imagen);
        $filename=$imagen->hashName();
        $imagen->storeAs("imagenes/productos",$filename,"public");
        $this->attributes["imagen"]=$filename;
        $this->save();
    }

    public function delete_image(){
        Storage::disk("public")->delete("imagenes/productos/".$this->attributes["imagen"]);
        $this->attributes["imagen"]=null;
        $this->save();
    }


    public function getImagenAttribute()
    {
        if ($this->attributes["imagen"] == null) {
            return null;
        }
        else{
        $ruta = asset("storage/imagenes/productos/".$this->attributes["imagen"]);
        return $ruta;
        }
    }
}
