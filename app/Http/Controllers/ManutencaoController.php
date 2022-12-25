<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Veiculo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ManutencaoController extends Controller
{
    public function home()
    {
        $veiculos = Veiculo::all();
        $manutencoes = DB::table('manutencoes')
            ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
            ->select('manutencoes.id', 'veiculos.user_id', 'manutencoes.veiculo_id', 'manutencoes.proxima_manutencao', 'veiculos.nome_veiculo')
            ->where([
                ['manutencoes.proxima_manutencao', '>=', now()->subDays(1)],
                ['manutencoes.proxima_manutencao', '<', now()->addDays(7)],
                ['manutencoes.status', '!=', 2],
            ])->orderByRaw('proxima_manutencao ASC')
            ->get();

        return View('manutencoes.home', compact('manutencoes', 'veiculos'));
    }

    public function dashboard()
    {
        $veiculos = Veiculo::all();

        if (auth()->user()->profile == 0) {
            $manutencoes = DB::table('manutencoes')
                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select('manutencoes.id', 'veiculos.user_id', 'manutencoes.veiculo_id', 'manutencoes.proxima_manutencao', 'veiculos.nome_veiculo')
                ->orderByRaw('id ASC')->get();
        } else {

            $manutencoes = DB::table('manutencoes')

                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select('manutencoes.id', 'veiculos.user_id', 'manutencoes.veiculo_id', 'manutencoes.proxima_manutencao')
                ->where([
                    ['veiculos.user_id', '=', auth()->user()->id],

                ])->orderByRaw('id ASC')
                ->get();
            //  dd($manutencoes);
        }

        return View('manutencoes.dashboard', compact('manutencoes', 'veiculos'));
    }

    public function create()
    {
        if (auth()->user()->profile == 0) {
            $veiculos = Veiculo::all();
        } else {

            $veiculos = DB::table('veiculos')
                ->select('*')
                ->where([
                    ['veiculos.user_id', '=', auth()->user()->id],

                ])
                ->get();
        }
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
        $manutencoes = DB::table('manutencoes')
            ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
            ->select('manutencoes.id', 'veiculos.user_id', 'manutencoes.veiculo_id',)->get();

        //  dd($manutencoes[$id-1]->user_id);
        if (auth()->user()->id == $manutencoes[$id - 1]->user_id or auth()->user()->profile == 0) {

            return view('manutencoes.edit', ['manutencao' => $manutencao], compact('veiculos', 'manutencoes'));
        } else {
            return redirect()->back()->with('alerta', 'Ops você não tem permissão para editar outro:(');
        }
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
