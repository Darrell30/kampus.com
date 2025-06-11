@if(auth()->check() && auth()->user()->role === 'admin')
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" 
          style="display: inline-block;" 
          onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form>
@endif