<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Versao;

use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function dashboard()
    {
        $veiculos = Veiculo::all();

        return View('veiculos.dashboard', compact('veiculos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $versoes = Versao::all();

        return view('veiculos.create', compact('marcas', 'modelos','versoes'));
    }

    public function store(Request $request)
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $versoes = Versao::all();

        $veiculo = new Veiculo();
        $veiculo->nome_veiculo = $request->nome_veiculo; // deixar ?
        $veiculo->ano = $request->ano;
        $veiculo->cor = $request->cor;
        $veiculo->img = $request->img;
        $veiculo->placa = $request->placa;
        $veiculo->marca_id = $request->marca_id;
        $veiculo->modelo_id = $request->modelo_id;
        $veiculo->versao_id = $request->versao_id;

        $veiculo->save();

        return redirect('/veiculos/dashboard')->with('mensagem', 'Veiculo Cadastrado com Sucesso!', compact('marcas', 'modelos','versoes')); //Invocar mensagem section
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $versoes = Versao::all();

        return view('veiculos.edit', ['veiculo' => $veiculo], compact('marcas', 'modelos','versoes'));
    }

    public function update(Request $request)
    {

        $data = $request->all();

        Veiculo::findOrFail($request->id)->update($data);
        return redirect('/veiculos/dashboard')->with('mensagem', 'Veiculo Editado com Sucesso!', ['data' => $data]); //Invocar mensagem section
    }

    public function destroy(Request $request, $id)
    {
        $id = $request['index_id'];
        Veiculo::findOrFail($id)->delete();

        return redirect('/veiculos/dashboard')->with('mensagem', 'Veiculo deletado com Sucesso!'); //Invocar mensagem section
    }
}
