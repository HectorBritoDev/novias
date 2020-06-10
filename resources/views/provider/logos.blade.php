<br>

<div class="container box is-radiusless">

    @if($errors->any())

    <div class="container is-fluid box is-radiusless">
        <p><strong>
                Corrige estos errores para continuar:
            </strong></p>

        <ul>
            @foreach($errors->all() as $errors)
            <li class="">{{ $errors }}</li>
            @endforeach
        </ul>
    </div>

    <br>

    @endif

    <form class="has-text-centered" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="columns">
            <div class="column">
                <input type="hidden" name="photos" value="1">
                <label class="label" for="provider_logo">Logo</label>
                <br>

                <div class="card">
                    <div class="card-image">
                        <figure class="image is-5by3">
                            <img src="{{ Storage::url($user->provider_logo) }}" alt="logo">
                        </figure>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            <div class="file">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="provider_logo">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Selecciona un Archivo
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column">
                <label class="label" for="main_photo">Imagen Principal</label>
                <br>
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-5by3">
                            <img src="{{ Storage::url($user->provider_main_photo) }}" alt="logo">
                        </figure>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            <div class="file">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="provider_main_photo">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Selecciona un Archivo
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <button class="button is-success" type="submit">Guardar</button>
    </form>

    <br>

    <div class="container is-fluid box is-radiusless">
        @include('photos.index')

        @include('photos.create')
    </div>
    <br>


</div>
<div class="container is-fluid box is-radiusless">
    @include('videos.index')

</div>
