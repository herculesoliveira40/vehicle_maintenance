<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\DB;


class ManutencaoController extends Controller
{

    protected $veiculo;
    protected $manutencao;

    protected $model;
    public function __construct(Manutencao $manutencao)
    {
        $this->model = $manutencao; //User::
    }


    public function home()
    {
        $veiculos = Veiculo::all();



        if (auth()->user()->profile == 0) {
            $manutencoes = DB::table('manutencoes')
                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select(
                    'manutencoes.id',
                    'veiculos.user_id',
                    'manutencoes.veiculo_id',
                    'veiculos.placa',
                    'manutencoes.proxima_manutencao',
                    'veiculos.nome_veiculo',
                    'manutencoes.status'
                )
                ->where([
                    ['manutencoes.proxima_manutencao', '>=', now()->subDays(1)],
                    ['manutencoes.proxima_manutencao', '<', now()->addDays(7)],
                    ['manutencoes.status', '!=', 2],
                ])->orderByRaw('proxima_manutencao ASC')
                ->get();
        } else {
            $manutencoes = DB::table('manutencoes')
                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select(
                    'manutencoes.id',
                    'veiculos.user_id',
                    'manutencoes.veiculo_id',
                    'veiculos.placa',
                    'manutencoes.proxima_manutencao',
                    'veiculos.nome_veiculo',
                    'manutencoes.status'
                )
                ->where([
                    ['manutencoes.proxima_manutencao', '>=', now()->subDays(1)],
                    ['manutencoes.proxima_manutencao', '<', now()->addDays(7)],
                    ['manutencoes.status', '!=', 2],
                    ['veiculos.user_id', '=', auth()->user()->id],
                ])->orderByRaw('proxima_manutencao ASC')
                ->get();
        }
        return View('manutencoes.home', compact('manutencoes', 'veiculos'));
    }

    
    public function dashboard(Request $request)
    {
        $veiculos = Veiculo::all();



        if (auth()->user()->profile == 0) {
            $manutencoes = DB::table('manutencoes')
                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select(
                    'manutencoes.id',
                    'veiculos.user_id',
                    'veiculos.placa',
                    'manutencoes.veiculo_id',
                    'manutencoes.proxima_manutencao',
                    'veiculos.nome_veiculo',
                    'manutencoes.status'
                )
                ->orderByRaw('id ASC')
                //->get();
                ->paginate(5);
        } else {

            $manutencoes = DB::table('manutencoes')

                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select(
                    'manutencoes.id',
                    'veiculos.user_id',
                    'veiculos.placa',
                    'manutencoes.veiculo_id',
                    'manutencoes.proxima_manutencao',
                    'veiculos.nome_veiculo',
                    'manutencoes.status'
                )
                ->where([
                    ['veiculos.user_id', '=', auth()->user()->id],

                ])->orderByRaw('id ASC')
                ->paginate(5);
                
            //  dd($manutencoes);
        }
        $search = $request->search;
        $manutencoes_search = $this->model
            ->getMaintenance(search: $request->search ?? '');


        // Status Pie Chart
        $results = DB::select(DB::raw("select count(manutencoes.status) as quanty_status, 
        manutencoes.status
            FROM manutencoes 
                GROUP BY manutencoes.status"));

        $data = "";

        foreach ($results as $val) {
            if ($val->status == 0){
                $val->status = "Pendente";
            }
            elseif ($val->status == 1){
                $val->status = "Andamento";
            }
            else{
                $val->status = "Concluido";
            }

            $data.= "['".$val->status."',  " . $val->quanty_status . "],";
        }
        // dd($results);
        $charData = $data;
        return View('manutencoes.dashboard', compact('charData', 'manutencoes', 'veiculos', 'manutencoes_search'));
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


            if (count($veiculos) <= 0) {
                return redirect('/veiculos/create')->with('alerta', 'Você não tem veiculos, cadastre!');
            } else {
                // dd('else');
            }
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
            ->select('manutencoes.id', 'veiculos.user_id', 'manutencoes.veiculo_id',)->orderByRaw('id ASC')->get(); // orderBy id abençoado

        //  dd($manutencoes[$manutencao->id -1]);
        if (auth()->user()->id == $manutencoes[$id - 1]->user_id or auth()->user()->profile == 0) {

            return view('manutencoes.edit', ['manutencao' => $manutencao], compact('veiculos', 'manutencoes'));
        } else {
            return redirect()->back()->with('alerta', 'Ops você não tem permissão para editar outro:c');
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





    public function gerarPdf(){
            $veiculos = Veiculo::all();

            $manutencoes = DB::table('manutencoes')
                ->join('veiculos', 'manutencoes.veiculo_id', '=', 'veiculos.id')
                ->select(
                    'manutencoes.id',
                    'veiculos.user_id',
                    'veiculos.placa',
                    'manutencoes.veiculo_id',
                    'manutencoes.proxima_manutencao',
                    'veiculos.nome_veiculo',
                    'manutencoes.status'
                )
                ->get();

        //dd($estoques);

        $pdf = PDF::loadView('manutencoes.relatorio', compact('manutencoes', 'veiculos'));

        return $pdf->setPaper('a4')->stream('Relatorio_geral_manutencoes.pdf');

    }
}
