<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidato extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'user_id',
      'vacante_id',
      'cv'
    ];
    
    //relacion entre candidato y usuario
    public function user()
    {//ordenando los candidatos descendentemente
      return $this->belongsTo(User::class)->orderBy('created_at', 'DESC');
    }
}
