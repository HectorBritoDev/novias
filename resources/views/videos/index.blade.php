<div class="content has-text-centered">
    @if ($user->video()->count()==0)

    <p class="title is-4">¡No hay Video!</p>

    <a class="modal-button" data-target="#modal" aria-haspopup="true"> <button class="button is-link">Agregar</button>
    </a>

    @else

    <p class="title is-4">Video</p>


    <a class="modal-button" data-target="#modalEdit" aria-haspopup="true"> <button class="button is-link">Cambiar</button>
    </a>
    @include('videos.delete')

</div>

<br>

<div class="columns is-multiline">
    <div class="column is-one-quarter has-text-centered">
        <div class="card">

            <figure>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$user->video->url}}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                {{-- <iframe width="560" height="315" src="{{ $user->video->ulr }}" allowfullscreen></iframe> --}}
            </figure>


        </div>
    </div>

</div>

<br>

@endif
<div class="modal" id="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Agregar Video</p>
            <button class="delete modal-close" aria-label="close"></button>
        </header>
        <form action="{{ route('video.store') }}" method="POST">
            <section class="modal-card-body">

                @csrf
                <label class="label" for="url">Url del video</label>
                <input class="input" type="text" name="url" id="url" style="max-width: 35%">

            </section>
            <footer class="modal-card-foot">
                <button type="submit" class="button is-success">Agregar</button>
            </footer>
        </form>

    </div>
</div>
@if ($user->video)


<div class="modal" id="modalEdit">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Cambiar Video</p>
            <button class="delete modal-close" aria-label="close"></button>
        </header>
        <form action="{{ route('video.update',$user->video) }}" method="POST">
            <section class="modal-card-body">

                @csrf
                @method('PUT')
                <label class="label" for="url">ID del video</label>
                <input class="input" type="text" name="url" id="url" style="max-width: 35%">

            </section>
            <footer class="modal-card-foot">
                <button type="submit" class="button is-success">Guardar</button>

            </footer>
        </form>
    </div>
</div>
@endif


<script type="text/javascript">
    document.querySelectorAll('.modal-button').forEach(function (el) {
        el.addEventListener('click', function () {
            var target = document.querySelector(el.getAttribute('data-target'));

            target.classList.add('is-active');

            target.querySelector('.modal-close').addEventListener('click', function () {
                target.classList.remove('is-active');
            });
        });
    });

</script>
