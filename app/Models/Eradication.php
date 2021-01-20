<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eradication extends Model
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
        'disease_id',
        'type_id',
        'official_id',
        'fecha_erradicacion',
        'user_id',
        'observaciones',
        'inventory_id',
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
        'disease_id' => 'integer',
        'type_id' => 'integer',
        'official_id' => 'integer',
        'fecha_erradicacion' => 'datetime',
        'user_id' => 'integer',
        'inventory_id' => 'integer',
    ];


    public function farm()
    {
        return $this->belongsTo(\App\Models\Farm::class);
    }

    public function lot()
    {
        return $this->belongsTo(\App\Models\Lot::class);
    }

    public function disease()
    {
        return $this->belongsTo(\App\Models\Disease::class);
    }

    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class);
    }

    public function official()
    {
        return $this->belongsTo(\App\Models\Official::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function inventory()
    {
        return $this->belongsTo(\App\Models\Inventory::class);
    }
    public function scopeSearch($query, $nombre)
    {
        return $query ->where('farm_id','LIKE' ,  "%$nombre%");
    }    
}
