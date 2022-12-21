<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function dashboard()
    {
        $manutencoes = Manutencao::all();

        return View('manutencoes.dashboard', compact('manutencoes'));
    }

    public function create()
    {
        $veiculos = Veiculo::all();

        return view('manutencoes.create', compact('veiculos'));
    }

    public function store(Request $request)
    {
        $veiculos = Veiculo::all();

        $manutencao = new Manutencao();
        $manutencao->veiculo_id = $request->veiculo_id;
        $manutencao->ultima_manutencao = $request->ultima_manutencao;
        $manutencao->proxima_manutencao = $request->proxima_manutencao;
        $manutencao->status = $request->status;
       

        $manutencao->save();

        return redirect('/manutencoes/dashboard')->with('mensagem', 'Manutencao Cadastrada com Sucesso!', compact('veiculos')); //Invocar mensagem section
    }

    public function edit($id)
    {
        $manutencao = Manutencao::findOrFail($id);
        $veiculos = Veiculo::all();

        return view('manutencoes.edit', ['manutencao' => $manutencao], compact('veiculos'));
    }

    public function update(Request $request)
    {

        $data = $request->all();

        Manutencao::findOrFail($request->id)->update($data);
        return redirect('/manutencoes/dashboard')->with('mensagem', 'Manutencao Editada com Sucesso!', ['data' => $data]); //Invocar mensagem section
    }

    public function destroy(Request $request, $id)
    {
        $id = $request['index_id'];
        Manutencao::findOrFail($id)->delete();

        return redirect('/manutencoes/dashboard')->with('mensagem', 'Manutencao deletada com Sucesso!'); //Invocar mensagem section
    }
}
