<html>
<head>
    <title>Produk</title>
</head>

<body>
    <h1>{{$judul}}</h1>
    <ol>
        @foreach($product as $produk)
        <li>{{$produk}}</li>
        @endforeach
    </ol>
</body>

</html>