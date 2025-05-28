<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <p>seja bem vindo ao sistema</p>

    <ul>
        <li><a href="{{ url('/types') }}">Manutenção de tipos</a></li>
        <li><a href="{{ url('/products') }}">Manutenção de produtos</a></li>
    </ul>
</body>
</html>