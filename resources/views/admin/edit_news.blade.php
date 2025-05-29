<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Noticia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>
    @include('admin.sidebar') <!-- incluye el sidebar del administrador -->

    <div class="container py-5" style="margin-left: 250px;">
        <h1 class="mb-4">Editar Noticia</h1>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div> <!-- muestra mensaje de éxito -->
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- muestra los errores de validación -->
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news3.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Imagen actual --}}
            @if($noticia->imagen)
                <div class="mb-3">
                    <label class="form-label">Imagen actual:</label>
                    <div>
                        <img src="{{ asset('fotos/' . $noticia->imagen) }}" alt="Imagen noticia" class="img-thumbnail" style="max-width: 300px;"> <!-- muestra la imagen actual de la noticia -->
                    </div>
                </div>
            @endif

            {{-- Campo para subir nueva imagen --}}
            <div class="mb-3">
                <label for="imagen" class="form-label">Cambiar imagen (opcional)</label>
                <input class="form-control @error('imagen') is-invalid @enderror" type="file" name="imagen" id="imagen" />
                @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div> <!-- muestra error si la imagen no es válida -->
                @enderror
            </div>

            {{-- Campo titular --}}
            <div class="mb-3">
                <label for="titular" class="form-label">Titular</label>
                <input type="text" name="titular" id="titular" 
                       class="form-control @error('titular') is-invalid @enderror"
                       value="{{ old('titular', $noticia->titular) }}" /> <!-- campo para editar el titular de la noticia -->
                @error('titular')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo descripcion con CKEditor --}}
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="6"
                          class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $noticia->descripcion) }}</textarea> <!-- campo para editar la descripción -->
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Noticia</button> <!-- botón para actualizar la noticia -->
            <a href="{{ route('news3') }}" class="btn btn-secondary ms-2">Cancelar</a> <!-- botón para cancelar -->
        </form>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CKEditor 5 Classic CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error); // muestra error si CKEditor falla
            });
    </script>
</body>

</html>