<form action="{{ route('taskCategory.destroy',$task_category->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit"></button>
</form>
