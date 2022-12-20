<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;

class ModeloController extends Controller
{
    public function dashboard()
    {
        $modelos = Modelo::all();

        return View('modelos.dashboard', compact('modelos'));
    }

    public function create()
    {
        return view('modelos.create');
    }

    public function store(Request $request)
    {
        $modelo = new Modelo();
        $modelo->nome_modelo = $request->nome_modelo;

        $modelo->save();

        return redirect('/modelos/dashboard')->with('mensagem', 'Modelo Cadastrado com Sucesso!'); //Invocar mensagem section
    }

    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);

        return view('modelos.edit', ['modelo' => $modelo]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        Modelo::findOrFail($request->id)->update($data);
        return redirect('/modelos/dashboard')->with('mensagem', 'Modelo Editado com Sucesso!', ['data' => $data]); //Invocar mensagem section
    }

    public function destroy(Request $request, $id)
    {
        $id = $request['index_id'];
        Modelo::findOrFail($id)->delete();

        return redirect('/modelos/dashboard')->with('mensagem', 'Modelo Deletado com Sucesso!'); //Invocar mensagem section
    }
}
