<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Noticia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('admin.sidebar')
    <div>
        <div class="container py-5">
            <h1 class="mb-4">Crear Nueva Noticia</h1>

            {{-- Mostrar mensaje de éxito --}}
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('noticia.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Campo de imagen (una sola imagen) --}}
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control @error('imagen') is-invalid @enderror" type="file" name="imagen" id="imagen">
                    @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Campo de titular --}}
                <div class="mb-3">
                    <label for="titular" class="form-label">Titular</label>
                    <input class="form-control @error('titular') is-invalid @enderror" type="text" name="titular" id="titular" value="{{ old('titular') }}">
                    @error('titular')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Campo de descripción --}}
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="6">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar noticia</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
