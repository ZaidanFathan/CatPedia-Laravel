@extends('admin.layout.admin')

@section('title', 'Artikel')
@section('page_title', 'View Artikel')

@section('content')
    <!-- Responsive navbar-->
    <!-- Page content-->
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8">
          <!-- Post content-->
          <article>
            <!-- Post header-->
            <header class="mb-4">
              <!-- Post title-->
              <h1 class="fw-bolder mb-1">{{ $article->judul }}</h1>
              <!-- Post meta content-->
              <div class="text-muted fst-italic mb-2">
              {{ $article->created_at }}
              </div>
              <!-- Post categories-->
              <a
                class="badge bg-secondary text-decoration-none link-light"
                href="#!"
                >{{ $article->cat->breed->tipe }}</a
              >
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4">
              <img
                class="img-fluid rounded"
                src="https://dummyimage.com/900x400/ced4da/6c757d.jpg"
                alt="..."
              />
            </figure>
            <!-- Post content-->
            <section class="mb-5">
              <p class="fs-5 mb-4">
                {!! $article->content !!}
              </p>
            </section>
          </article>
          <!-- Comments section-->
        </div>
        <!-- Side widgets-->
      </div>
    </div>
    <!-- Footer-->
    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
@endsection