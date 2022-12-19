<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function dashboard() {
        $marcas = Marca::all();

        return View('marcas.dashboard', compact('marcas'));
    }

    public function create() {
        return view('marcas.create');
    }

    public function store(Request $request) {
        $marca = new Marca();
        $marca->nome_marca = $request ->nome_marca;

        $marca->save();

        return redirect('/marcas/dashboard')->with('mensagem', 'Marca Cadastrada com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }

    public function edit($id) {
        $marca = Marca::findOrFail($id);
       
    return view('marcas.edit', ['marca' => $marca]); 
    }

    public function update(Request $request) {

        $data = $request->all(); 

        Marca::findOrFail($request->id)->update($data);
    return redirect('/marcas/dashboard')->with('mensagem', 'Marca editada com Sucesso!', ['data' => $data]);
    }


    
}
