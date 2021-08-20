<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #tabla{
            font-family: 'Courier New', Courier, monospace;
            border-collapse: collapse;
            width: 100;
        }

        #tabla td, #tabla th{
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tabla th{
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

    {{-- <title>Exportar a Excel</title> --}}
</head>
<body>
    <table  id="tabla">
        <caption class="caption">Datos</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Ubicaci&oacute;n</th>
                <th>Departamento</th>
                <th>Jefe inmediato</th>
                <th>Puesto</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultados as $item)
                <tr>
                    {{-- <th scope="row">{{$item->idsesion}}</th> --}}
                    <td>{{$item->id_empleado}}</td>
                    <td>{{$item->nombre_completo}}</td>
                    <td>{{$item->ubicacion}}</td>
                    <td>{{$item->departamento}}</td>
                    <td>{{$item->jefe_inmediato}}</td>
                    <td>{{$item->puesto}}</td>
                    <td>{{$item->tipo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>