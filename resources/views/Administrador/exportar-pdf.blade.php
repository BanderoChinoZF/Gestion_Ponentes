<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #sesiones{
            font-family: 'Courier New', Courier, monospace;
            border-collapse: collapse;
            width: 100;
        }

        #sesiones td, #sesiones th{
            border: 1px solid #ddd;
            padding: 8px;
        }

        #sesiones th{
            padding-bottom: 12px;
            padding-top: 12px;
            text-align: left;
            /* background-color: #da2c4e; */
            background-color: black;
            color: #ddd 
        }

        .caption{
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
            font-weight: bold;
            text-align: left;
            border-collapse: collapse;
            width: 300;
            /* background-color:#da2c4e; */
            padding: 15px;
        }
    </style>

    {{-- <title>Exportar a PDF</title> --}}
</head>
<body>
    <table  id="sesiones">
        <caption class="caption">Lista de sesiones</caption>
        <thead>
            <tr>
                <th>Id sesion</th>
                <th>Fecha</th>
                <th>Estatus</th>
                <th>Tallerista</th>
                <th>N&uacute;mero de<br>asistentes</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultados as $item)
                <tr>
                    {{-- <th scope="row">{{$item->idsesion}}</th> --}}
                    <td>{{$item->idsesion}}</td>
                    <td>{{$item->fecha}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->tallerista}}</td>
                    <td>{{$item->num_asistentes}}</td>
                    <td>{{$item->tiposesion}}</td>
                </tr>
            @endforeach
            @foreach ($resultados as $item)
                <tr>
                    {{-- <th scope="row">{{$item->idsesion}}</th> --}}
                    <td>{{$item->idsesion}}</td>
                    <td>{{$item->fecha}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->tallerista}}</td>
                    <td>{{$item->num_asistentes}}</td>
                    <td>{{$item->tiposesion}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>