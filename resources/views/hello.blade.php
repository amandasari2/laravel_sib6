<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello ini File Pertama saya di dalam views Laravel</h1>
    @php
        $nama = 'Manda';
        $nilai = 70.0;
    @endphp
    {{-- Struktur Kendali IF --}}
    @if ($nilai >= 60)
        @php $ket = "Lulus" ; @endphp
    @endif

    {{-- Memanggil variable hasil didalam laravel menggunakan kurung kurawal --}}
    {{ $nama }} <p>Dengan Nilai </p> {{ $nilai }} <p>Dinyatakan </p> {{ $ket }}
</body>

</html>
