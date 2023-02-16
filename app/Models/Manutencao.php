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

  public function veiculoManutencao() {
        return $this->belongsTo(Veiculo::class);
    }  

    public function getMaintenance(string | null $search = '' ) {
        $manutencoes_search = $this->where(function ($query) use ($search) {
            if($search) {
                $query->where('id', 'LIKE', "%{$search}%");
               // $query->orwhere('email', $search);
            }
        })
        ->with('veiculoManutencao')
        ->paginate(5);

        return $manutencoes_search;
    }

    
}
