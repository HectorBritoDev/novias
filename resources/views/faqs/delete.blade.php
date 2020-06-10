<form action="{{ route('faq.destroy',$faq->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete is-danger" type="submit"></button>
</form>
