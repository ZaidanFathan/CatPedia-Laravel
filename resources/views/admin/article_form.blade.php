@extends("admin.layout.admin")

@section('content')
<div class="container">

    <form 
        method="POST" 
        action="{{ $article ? route('articles.update', $article->id) : route('articles.store') }}"
    >
        @csrf
        @if ($article)
            @method('PATCH')
        @endif

        <div class="mb-3">
            <label class="form-label">Judul Artikel</label>
            <input 
                type="text" 
                class="form-control" 
                name="judul" 
                value="{{ old('judul', $article->judul ?? '') }}"
                placeholder="Masukkan judul artikel"
            >
            @error('judul')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input 
                type="text" 
                class="form-control" 
                name="deskripsi" 
                value="{{ old('deskripsi', $article->deskripsi ?? '') }}"
                placeholder="Masukkan deskripsi artikel"
            >
            @error('deskripsi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
        <label class="form-label">Example textarea</label>
        <textarea class="form-control"  rows="3" name="content_article">{{ old('content_article', $article->content ?? '') }}</textarea>
         @error('content_article')
                <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

      <div class="mb-3">
    <label class="form-label">Pilih Ras Kucing</label>
    <select class="form-select" aria-label="Default select example" name="cat_id">
        <option value="" disabled selected>Pilih salah satu ras kucing</option>
        @foreach ($breeds as $breed)
            <option value="{{ $breed->id }}" 
                {{ old('cat_id') == $breed->id ? 'selected' : '' }}>
                {{ $breed->breed->tipe }}
            </option>
        @endforeach
    </select>

    @error('cat_id')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="btn btn-primary">
            {{ $article ? 'Update' : 'Simpan' }}
        </button>
    </form>

</div>
@endsection
