@extends('layouts.app')

@section('content')


@if($errors->any())
<section class="section">
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
</section>
@endif

<section class="section">

    <div class="container">
        <form action="{{ route('blog.update',$article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-image">
                    <figure class="image is-16by9">
                        <img src="{{ Storage::url($article->main_photo) }}" alt="main_photo">
                    </figure>
                </div>
                <div class="card-content">
                    <label class="label" for="name">Título:</label>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <input class="input" class="input" type="text" name="name" value="{{ old('name',$article->name) }}" maxlength="190" required>
                        </div>
                        <div class="field">
                            <div class="select">
                                <select name="tag_id" id="selector-tag">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="label" for="name">Contenido:</label>

                    <textarea class="textarea has-fixed-size" name="description" cols="30" rows="10" required>
                        {{ old('description',$article->description) }}
                    </textarea>

                </div>
                <div class="card-footer">
                    <div class="card-footer-item">
                        <div class="file">
                            <label class="file-label">
                                <input class="file-input" type="file" name="main_photo">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Cambiar Foto…
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="card-footer-item">
                        <button class="button is-danger" type="submit">Modificar</button>
                    </div>
                    <div class="card-footer-item">
                        <a class="button" href="{{ route('blog.index') }}">Volver</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $(function () {
        $('textarea').froalaEditor()
    });

</script>
@endsection

@section('aditional_scripts')
<!-- Include JS file. -->
<script type='text/javascript' src='{{ asset('js/froala_editor.min.js') }}'></script>
<script>
    function preselect_items() {


        // Etiquetas
        var tag = '<?php echo $article->tag_id; ?>';
        var selector_tag = document.getElementById('selector-tag');

        selector_tag.value = tag;
    }
    window.addEventListener('load', preselect_items);

</script>

@endsection

@section('aditional_styles')
<!-- Include Editor style. -->
<link href='{{ asset('css/froala_editor.min.css') }}' rel='stylesheet' type='text/css' />
<link href='{{ asset('css/froala_style.min.css') }}' rel='stylesheet' type='text/css' />

@endsection
