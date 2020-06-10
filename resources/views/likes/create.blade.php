<form action="{{ route('like.store') }}" method="POST">
    @csrf
    <input type="hidden" name="provider_id" value="{{ $user->id }}">
    <input type="hidden" name="sector_id" value="{{ $user->sector->id }}">

    <button class="button is-danger is-outlined" type="submit">
        <span class="icon">
            <i class="fas fa-heart"></i>
        </span>
    </button>
</form>
