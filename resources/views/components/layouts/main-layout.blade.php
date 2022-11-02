@props(['title'])
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store | {{ $title }}</title>
    @vite('resources/css/app.css')

</head>
<body>
    @include('partials._nav')
    <div class="bg-green-700 text-black">{{ Session::get('status') }}</div>
    {{ $slot }}

    @vite('resources/js/app.js')

</body>
</html>