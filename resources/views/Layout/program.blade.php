<html>
<head>
    <title>Program</title>
</head>

<body>
    <h1>{{$judul}}</h1>
    <ol>
        @foreach($program as $Program)
        <li>{{$Program}}</li>
        @endforeach
    </ol>
</body>

</html>