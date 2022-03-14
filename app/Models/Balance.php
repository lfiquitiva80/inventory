<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;


    protected $connection = 'palmeras';
    
    protected $guarded = [];

    protected $table = 'BALANCE_MAQUILA_REFINACION';
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'title',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public $timestamps = false;


      public function scopeSearch($query, $nombre)
    {
        return $query ->where('NUMTIQUETE','LIKE' ,  "%$nombre%");
    }


      public function proc()
    {
        return $this->belongsTo(\App\Models\Procedencia::class,'PROCEDENCIA');
    }
}
