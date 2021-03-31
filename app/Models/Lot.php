<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lot extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FINCACODI',
        'LOTECODCC',
        'LOTECODI',
        'LOTENOMB',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

          public function scopeSearch($query, $nombre)
  {
  return $query ->where('LOTENOMB','LIKE' ,  "%$nombre%");
  }

      public function getFullNameAttribute()
{
    return "{$this->LOTECODI} {$this->LOTENOMB}";
}


}
