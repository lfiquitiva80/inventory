<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    use HasFactory;




    protected $connection = 'palmeras';
    
    protected $guarded = [];

    protected $table = 'PROCEDENCIA';
  

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
        return $query ->where('Tercero','LIKE' ,  "%$nombre%");
    }
}
