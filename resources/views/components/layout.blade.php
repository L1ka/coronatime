<!DOCTYPE html>
<html >

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Coronatime</title>
        <script async src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <body class="h-screen w-screen">
        {{ $slot }}
    </body>
</html>
