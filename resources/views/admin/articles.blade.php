@extends('admin.layout.admin')

@section('title', 'Artikel')
@section('page_title', 'Kelola Artikel')

@section('content')
<a href="{{ route('articles.create') }}" class="btn btn-success mb-3">+ Tambah Artikel</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>deskripsi</th>
            <th>Content</th>
            <th>Ras Kucing</th>
            <th>Artikel dibuat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
        <tr>
            <td>1</td>
            <td>{{ $article->judul }}</td>
            <td>{{ $article->deskripsi }}</td>
            <td>{{ $article->content }}</td>
            <td>{{ $article->cat->breed->tipe ?? "Data kosong" }}</td>
            <td>{{ $article->updated_at }}</td>
            <td>
                <a href="{{ url("articles/$article->id/edit") }}" class="btn btn-warning btn-sm">Edit</a>
                 <form action="{{ url("articles/$article->id") }}" method="post" style="display:inline;">
                @csrf
                @method("DELETE")
                 <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
                </button>
                </form>
                <a href="#" class="btn btn-primary btn-sm">View</a>
            </td>
        @empty
        <td>Data kosong</td>
         </tr>
         @endforelse
    </tbody>
</table>
@endsection
