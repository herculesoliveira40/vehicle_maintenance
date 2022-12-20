<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versao;

class VersaoController extends Controller
{
    public function dashboard()
    {
        $versoes = Versao::all();

        return View('versoes.dashboard', compact('versoes'));
    }

    public function create()
    {
        return view('versoes.create');
    }

    public function store(Request $request)
    {
        $versao = new Versao();
        $versao->nome_versao = $request->nome_versao;

        $versao->save();

        return redirect('/versoes/dashboard')->with('mensagem', 'Versao Cadastrada com Sucesso!'); //Invocar mensagem section
    }

    public function edit($id)
    {
        $versao = Versao::findOrFail($id);

        return view('versoes.edit', ['versao' => $versao]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        Versao::findOrFail($request->id)->update($data);
        return redirect('/versoes/dashboard')->with('mensagem', 'Versao Editada com Sucesso!', ['data' => $data]); //Invocar mensagem section
    }

    public function destroy(Request $request, $id)
    {
        $id = $request['index_id'];
        Versao::findOrFail($id)->delete();

        return redirect('/versoes/dashboard')->with('mensagem', 'Versao deletada com Sucesso!'); //Invocar mensagem section
    }
}
