@extends('admin.layout.admin')

@section('title', 'Artikel')
@section('page_title', 'Kelola Artikel')

@section('content')
<div class="container-fluid">

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Artikel</h4>
        <a href="{{ route('articles.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Artikel
        </a>
    </div>

    {{-- Pesan Jika Kosong --}}
    @if($articles->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Belum ada artikel yang ditambahkan.
        </div>
    @else
        {{-- Tabel Artikel --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Konten</th>
                        <th>Ras Kucing</th>
                        <th>Terakhir Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $index => $article)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $article->judul }}</td>
                        <td>{{ Str::limit($article->deskripsi, 60, '...') }}</td>
                        <td>{{ Str::limit(strip_tags($article->content), 80, '...') }}</td>
                        <td>{{ $article->cat->breed->tipe ?? 'Data kosong' }}</td>
                        <td>{{ $article->updated_at->format('d M Y, H:i') }}</td>
                        <td class="text-center">
                            <div class="btn-group mx-3 px-3" role="group">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm">
                                    View
                                </a>
                                <a href="{{ url("articles/$article->id/edit") }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ url("articles/$article->id") }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
