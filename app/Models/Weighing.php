<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{
    use HasFactory;

 
    protected $connection = 'improagro';
    
    protected $guarded = [];

    protected $table = 'bRegistroBascula';

    public function scopeSearch($query, $nombre)
    {
        return $query ->where('numero','LIKE' ,  "%$nombre%");
    }

}
