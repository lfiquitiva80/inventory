<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'farm_id',
        'lot_id',
        'columna',
        'fila',
        'statu_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'farm_id' => 'integer',
        'lot_id' => 'integer',
        'statu_id' => 'integer',
        'user_id' => 'integer',
    ];


    public function farm()
    {
        return $this->belongsTo(\App\Models\Farm::class);
    }

    public function lot()
    {
        return $this->belongsTo(\App\Models\Lot::class);
    }

    public function statu()
    {
        return $this->belongsTo(\App\Models\Statu::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function scopeSearch($query, $nombre)
    {
        return $query ->where('farm_id','LIKE' ,  "%$nombre%");
    }


}
