@extends("admin.layout.admin")

@section('content')
<div class="container">

    <form 
        method="POST" 
        action="{{ $cat ? route('cats.update', $cat->id) : route('cats.store') }}"
    >
        @csrf
        @if ($cat)
            @method('PATCH')
        @endif

        <div class="mb-3">
            <label class="form-label">Ras Kucing</label>
            <input 
                type="text" 
                class="form-control" 
                name="cat_breed" 
                value="{{ old('cat_breed', $cat->breed->tipe ?? '') }}"
                placeholder="Masukkan ras kucing"
            >
            @error('cat_breed')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Asal Kucing</label>
            <input 
                type="text" 
                class="form-control" 
                name="cat_origin" 
                value="{{ old('cat_origin', $cat->cat_origin ?? '') }}"
                placeholder="Masukkan asal kucing"
            >
            @error('cat_origin')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $cat ? 'Update' : 'Simpan' }}
        </button>
    </form>

</div>
@endsection
