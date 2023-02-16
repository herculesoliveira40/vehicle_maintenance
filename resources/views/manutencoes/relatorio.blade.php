<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Relatorio</title>
        <style>
            body{ border-style: dashed; border-radius: 5px; border-color: brown;
				  background-color: white; margin: 2px; padding: 22px; }
						
            h1 { color: red; text-align: center; } 

            table { padding: 4px; border: 1px solid black ; background: #ffffff;} 
            td, tr { padding: 4px; border: 2px solid black ; font-size: 18px} 
            tr:nth-child(even) { background-color: #00000034;  }     
        </style>
</head>
<body>
    <h1>Relatorio Manutenções </h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Veiculo</th>
                <th scope="col">Placa</th>
                <th scope="col">Manutenção</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($manutencoes as $manutencao)
                <tr>
                    <td scropt="row">{{ $manutencao->id }}</td>
                    <td>{{ $manutencao->nome_veiculo }}</td>
                    <td>{{ $manutencao->placa }}</td>
                    <td>{{ date('d/m/Y', strtotime($manutencao->proxima_manutencao)) }}</td>

                    @if ($manutencao->status == 0)        
                        <td class="bg-success"> Pendente </td>      
                    @elseif ($manutencao->status == 1)              
                        <td class="bg-secondary"> Em andamento </td>         
                    @else              
                        <td class="bg-primary"> Concluido </td>                  
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>    