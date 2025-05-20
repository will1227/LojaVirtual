<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>seja bem vindo ao sistema</p>

    <ul>
        <li><a href="{{ url('/types') }}">Cadastro de tipos</a></li>
        <li><a href="{{ url('/products') }}">Cadastro de produtos</a></li>
    </ul>
</body>
</html>