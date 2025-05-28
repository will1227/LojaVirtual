<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Types</title>
</head>

<body>
    <h3>Lista de tipos</h3>
    <ul>
        @foreach($types as $type)
        <li>{{$type['name']}} <a href="{{ url('/types/update', ['id' => $type->id]) }}">Editar</a>
            {{$type['']}}  <a href="{{ url('/types/delete', ['id' => $type->id]) }}">Excluir</a>

        </li>

        @endforeach

    </ul>

</body>

</html>