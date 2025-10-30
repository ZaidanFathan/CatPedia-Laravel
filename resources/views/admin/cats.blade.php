@extends('admin.layout.admin')

@section('title', 'Tipe Kucing')
@section('page_title', 'Kelola Tipe Kucing')

@section('content')
<a href="{{ route('cats.create') }}" class="btn btn-success mb-3">+ Tambah Tipe Kucing</a>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Ras Kucing</th>
            <th>Asal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
         <?php $no = 1;  ?>
        @forelse ($data as $cat)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $cat->breed->tipe ?? "Data kosong" }}</td>
            <td>{{ $cat->cat_origin ?? 'Tidak ada ras'}}</td>
            <td>
                <a href="{{ url("cats/$cat->id/edit") }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ url("cats/$cat->id") }}" method="post" style="display:inline;">
                @csrf
                @method("DELETE")
                 <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
                </button>
                </form>
            </td>
               @empty
            <td>
                <p>Data kosong</p>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>


<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Ras Kucing</th>
        </tr>
    </thead>
    <tbody>
         <?php $no = 1;  ?>
        @forelse ($cat_breeds as $breed)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $breed->tipe ?? "Data kosong" }}</td>
               @empty
            <td>
                <p>Data kosong</p>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
