@extends('admin.layout.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Admin')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
     <td>
        <div class="d-flex justify-content-center gap-2">
            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </div>
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
</table>
@endsection
