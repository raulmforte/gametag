<h1>{{ $juego->nombre }}</h1>
<p><strong>Género:</strong> {{ $juego->genero }}</p>
<img src="{{ asset('storage/imagenes/' . $juego->imagen) }}" alt="Imagen del juego">
<p>{{ $juego->descripcion }}</p>

<iframe width="560" height="315" 
        src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($juego->trailer, 'v=') }}" 
        frameborder="0" allowfullscreen>
</iframe>

<h3>Comparador de precios</h3>
<table>
    <thead>
        <tr>
            <th>Plataforma</th>
            <th>Precio</th>
            <th>Enlace</th>
        </tr>
    </thead>
    <tbody>
        @foreach($juego->precios as $precio)
        <tr>
            <td>{{ $precio->plataforma }}</td>
            <td>{{ $precio->precio }} €</td>
            <td><a href="{{ $precio->url_compra }}" target="_blank">Comprar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
