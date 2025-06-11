@if (auth()->check() && auth()->user()->role === 'admin')
    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus komentar ini?')">
            Hapus
        </button>
    </form>
@endif
