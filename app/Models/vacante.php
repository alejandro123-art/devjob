<?php

namespace App\Models;

use App\Models\salario;
use App\Models\candidato;
use App\Models\categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class vacante extends Model
{
    use HasFactory;

    protected $dates = ['ultimo_dia'];

    protected $fillable = [
                              'titulo',
                              'salario_id',
                              'categoria_id',
                              'empresa',
                              'ultimo_dia',
                              'descripcion',
                              'imagen',
                              'publicado',
                              'user_id'
                          ];

    //returnando para hacer la relacion entre categoria y categoria_id y mostrar la informacion
    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }
    
      //returnando para hacer la relacion entre salario y salario_id y mostrar la informacion
    public function salario()
    {
        return $this->belongsTo(salario::class);
    }

    //retornando la relacion entre el candidato y la vacante de uno a muchos
    public function candidatos()
    {
       return $this->hasMany(candidato::class);
    }

    //relacion de 1 a 1 entre vacante y reclutador o usuario
    public function reclutador()
    {
        //especificando la union entre vacante y reclutador unidos por user_id
        return $this->belongsTo(User::class,'user_id');
    }
}
