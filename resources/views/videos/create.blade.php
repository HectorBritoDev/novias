<form action="{{ route('video.store') }}" method="POST">

    @csrf
    <label class="label" for="url">Url del video</label>
    <input class="input" type="text" name="url" id="url" style="max-width: 35%">

</form>
