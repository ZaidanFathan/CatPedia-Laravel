<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
/>

<div class="bootstrap-page">
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">
        <article>
          <header class="mb-4">
            <h1 class="fw-bolder mb-1">{{ $article->judul }}</h1>
            <div class="text-muted fst-italic mb-2">
              {{ $article->created_at }}
            </div>
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">
              {{ $article->cat->breed->tipe }}
            </a>
          </header>

          <figure class="mb-4">
            <img
              class="img-fluid rounded"
              src="https://dummyimage.com/900x400/ced4da/6c757d.jpg"
              alt="..."
            />
          </figure>

          <section class="mb-5">
            <p class="fs-5 mb-4">{!! $article->content !!}</p>
          </section>
        </article>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>