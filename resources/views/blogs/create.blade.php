@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="container is-fluid box is-radiusless">

    <p><strong>
            Corrige estos errores para continuar
        </strong></p>
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>

</div>
@endif

<br>

<section class="section">
    <div class="container">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="select">
                <select name="tag_id" required>
                    <option value="">Etiqueta</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <br><br>

            <label class="label" for="main_photo">Foto Principal:</label>

            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="main_photo" required>
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Añadir Foto...
                        </span>
                    </span>
                </label>
            </div>

            <br>

            <label class="label" for="name">Título:</label>
            <input class="input" type="text" name="name" value="{{ old('name') }}" style="max-width: 50%" maxlength="190"
                required>

            <br><br>

            <label class="label" for="name">Contenido:</label>
            <textarea class="textarea has-fixed-size" name="description" cols="30" rows="40" required>{{ old('description') }}</textarea>
            <br>

            <div class="content has-text-centered">
                <button class="button is-danger is-outlined" type="submit">Crear</button>
            </div>
        </form>
    </div>
</section>


<br><br>

<script>
    $(function () {
        $('textarea').froalaEditor()
    });

</script>
@endsection

@section('aditional_scripts')
<!-- Include JS file. -->
<script type='text/javascript' src='{{ asset('js/froala_editor.min.js') }}'></script>
@endsection

@section('aditional_styles')
<!-- Include Editor style. -->
<link href='{{ asset('css/froala_editor.min.css') }}' rel='stylesheet' type='text/css' />
<link href='{{ asset('css/froala_style.min.css') }}' rel='stylesheet' type='text/css' />

@endsection
