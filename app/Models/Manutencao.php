<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "manutencoes";

    protected $dates = ['ultima_manutencao', 'proxima_manutencao'];

    public function manutencao() {
        return $this->hasMany('App\Models\Manutencao');
    }

}
