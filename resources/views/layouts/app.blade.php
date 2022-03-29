<!doctype html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

    <title>{{ config('app.name') }}</title>
</head>
<body>

@include('layouts._navbar')

<main>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 my-2 sm:my-4">
        {{ $slot }}
    </div>
</main>

</body>
</html>
