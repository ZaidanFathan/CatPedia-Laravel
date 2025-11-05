<div class="container-content" id="beranda">
      <div id="content1">
        <div id="title">
          <h3>Cat</h3>
          <h3>Pedia</h3>
        </div>

        <div id="button">
          <a href="#informasi"><button>Baca Sekarang</button></a>
        </div>
      </div>
      <div id="content2">
        <h3>Apa itu CatPedia</h3>
        <p>
          CatPedia adalah pusat pengetahuan lengkap dan terpercaya tentang dunia
          kucing. Kami hadir sebagai panduan bagi para pecinta kucing—mulai dari
          pemilik baru yang ingin mengenal sahabat berbulu pertamanya, hingga
          penggemar sejati yang ingin terus memperdalam pengetahuan tentang
          kucing. Di CatPedia, kamu dapat menemukan informasi menyeluruh tentang
          berbagai ras kucing dari seluruh dunia, lengkap dengan sejarah
          asal-usul, karakteristik fisik, kepribadian, hingga kebutuhan
          perawatan khusus masing-masing ras.
        </p>
        <p>
          Kami juga menyediakan panduan kesehatan dan perawatan harian seperti
          tips grooming, panduan makanan bergizi, vaksinasi, hingga pencegahan
          penyakit umum pada kucing. Tak hanya itu, CatPedia membahas perilaku
          dan psikologi kucing, membantu kamu memahami bahasa tubuh mereka,
          mengatasi masalah perilaku, dan memberikan stimulasi mental yang tepat
          agar kucing tetap bahagia.
        </p>
      </div>
    </div>

    <div id="search-bar">
      <input
        type="text"
        id="search-input"
        placeholder="Cari informasi tentang kucing...."
      />
      <button id="reset-btn">X</button>
    </div>
    <div class="container" id="informasi">
        @forelse ($articles as $article)
      <div class="info-card">
        <div class="info-card-img">
          <img src="https://placecats.com/neo_2/300/200" alt="Placeholder cat image" />
        </div>
        <div class="info-card-content">
          <h1>{{ $article->cat->breed->tipe }}</h1>
          <h2>{{ $article->judul }}</h2>
          <p>{{ $article->deskripsi }}</p>
          <p>
          <span>{{ $article->created_at->format('d M Y, H:i')  }}</span>
          </p>
          <a href="{{ route('show.article', $article->id) }}">
          <button>Baca Selengkapnya</button>
          </a>
        </div>
      </div>
        @empty
        <h2>Tidak ada artikel</h2>
      @endforelse
    
    </div> 