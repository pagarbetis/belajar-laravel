@extends('layout.app')
@section('content')
    <div class="flex flex-col w-full">
        {{-- <div class="bg-light border-bottom py-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 py-1" style="font-size: 0.85rem;">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none text-muted d-inline-flex align-items-center gap-1"
                                href="index.html">
                                <i class="bi bi-house-door"></i> Beranda
                            </a>
                        </li>
                        <li aria-current="page" class="breadcrumb-item active text-primary fw-semibold">Blog</li>
                    </ol>
                </nav>
            </div>
        </div> --}}
        <!-- BEGIN: BlogHero -->
        <section class="py-4 py-lg-5 bg-white border-bottom">
            <div class="container">
                <div class="row align-items-end g-4">
                    <div class="col-lg-7">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-light text-primary fw-semibold mb-3 border"
                            style="font-size: 0.8rem;">
                            <i class="bi bi-journal-text text-danger"></i> Blog &amp; Edukasi
                        </div>
                        <h1 class="display-6 fw-bold text-dark mb-3 lh-sm">Artikel &amp; tips cetak</h1>
                        <p class="text-muted fs-6 mb-0 lh-base">Panduan bahan, finishing, dan ide promosi dari tim
                            PrimaGraphia.</p>
                    </div>
                    <div class="col-lg-5">
                        <form class="blog-search" role="search">
                            <label class="form-label small fw-semibold text-muted" for="blogSearchInput">Cari
                                artikel</label>
                            <div class="input-group shadow-sm rounded-pill overflow-hidden border">
                                <span class="input-group-text bg-white border-0 text-muted ps-3"><i
                                        class="bi bi-search"></i></span>
                                <input autocomplete="off" class="form-control border-0 ps-1" id="blogSearchInput"
                                    maxlength="100" placeholder="Cari artikel, mis. stiker, banner…"
                                    style="font-size: 0.9rem;" type="search" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="pg-category-pills mt-4" aria-label="Kategori artikel" role="group">
                    <button class="pill-filter-btn active" data-blog-filter="all" type="button">Semua <span
                            class="opacity-75 ms-1">{{ $totalBlogsCount ?? 0 }}</span></button>
                    @foreach ($categories as $category)
                        <button class="pill-filter-btn" data-blog-filter="{{ $category->slug }}" type="button">
                            <i class="bi bi-lightbulb me-1">{{ $category->name ?? '' }}</i><span
                                class="opacity-75 ms-1">{{ $category->blogs_count ?? 0 }}</span></button>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- END: BlogHero -->
        <!-- BEGIN: BlogList -->
        <section class="py-5 bg-light" id="artikel">
            <div class="container">
                <!-- Featured article -->
                @if ($latestBlog)
                    <article class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 blog-item blog-featured"
                        data-category="tips-dan-trick">
                        <div class="row g-0 align-items-stretch">
                            <div class="col-lg-7">
                                <a class="ratio ratio-3x2 d-block h-100 bg-light blog-card-media"
                                    href="{{ route('blog.show', $latestBlog->slug) }}" tabindex="-1" aria-hidden="true">
                                    <img alt="{{ $latestBlog->name }}" class="object-fit-cover img-fluid" data-img-fallback
                                        fetchpriority="high" src="{{ asset('storage/' . $latestBlog->cover_path) }}" />
                                </a>
                            </div>
                            <div class="col-lg-5 d-flex">
                                <div class="card-body p-4 p-xl-5 d-flex flex-column justify-content-center">
                                    <span class="badge bg-danger rounded-pill align-self-start px-3 py-2 mb-3">
                                        <i class="bi bi-stars me-1"></i>Artikel terbaru
                                    </span>
                                    <div class="d-flex flex-wrap align-items-center gap-2 text-muted small mb-2">
                                        <span class="text-primary fw-semibold">Tips &amp; Trick</span>
                                        <span aria-hidden="true">·</span>
                                        <time
                                            datetime="{{ $latestBlog->created_at }}">{{ $latestBlog->created_at->format('d M Y') }}</time>
                                        <span aria-hidden="true">·</span>
                                    </div>
                                    <h2 class="h3 fw-bold lh-sm mb-3">
                                        <a class="text-dark text-decoration-none"
                                            href="{{ route('blog.show', $latestBlog->slug) }}">
                                            {{ $latestBlog->name }}
                                        </a>
                                    </h2>

                                    <p class="text-muted mb-4">{{ $latestBlog->brief_description }}</p>

                                    <a class="btn btn-pg-primary rounded-pill px-4 py-2 fw-semibold align-self-start d-inline-flex align-items-center gap-2"
                                        href="{{ route('blog.show', $latestBlog->slug) }}">
                                        Baca artikel <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endif
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="blogGrid">
                    @foreach ($blogs as $blog)
                        <div class="col blog-item" data-category="{{ $blog->category->slug ?? '' }}">
                            <article class="article-card blog-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                <a class="ratio ratio-3x2 d-block overflow-hidden bg-light blog-card-media"
                                    href="{{ route('blog.show', $blog->slug) }}" tabindex="-1" aria-hidden="true">
                                    <img alt="{{ $blog->name }}" class="object-fit-cover img-fluid" data-img-fallback
                                        loading="lazy" src="{{ asset('storage/' . $blog->cover_path) }}" />
                                </a>
                                <div class="p-3 p-lg-4 d-flex flex-column flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 text-muted small mb-2">
                                        <span class="text-primary fw-semibold">Product</span>
                                        <span aria-hidden="true">·</span>
                                        <time
                                            datetime="{{ $blog->created_at }}">{{ $blog->created_at->format('d M Y') }}</time>
                                        <span aria-hidden="true">·</span>
                                    </div>
                                    <h2 class="h6 fw-bold mb-2 lh-sm">
                                        <a class="text-dark text-decoration-none stretched-link-title"
                                            href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a>
                                    </h2>
                                    <p class="text-muted small mb-3 flex-grow-1 blog-excerpt">
                                        {{ $blog->brief_description }}</p>
                                    <a class="text-primary fw-bold small d-inline-flex align-items-center gap-1 mt-auto text-decoration-none"
                                        href="{{ route('blog.show', $blog->slug) }}">
                                        Baca artikel <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="alert alert-light border text-center py-5 rounded-4 mt-4 d-none" id="blogNoResults">
                    <i class="bi bi-journal-x fs-1 text-muted d-block mb-2"></i>
                    <h2 class="h6 fw-bold">Artikel tidak ditemukan</h2>
                    <p class="small text-muted mb-3">Coba kata kunci atau kategori lain.</p>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3" id="blogResetBtn"
                        type="button">Tampilkan semua artikel</button>
                </div>
            </div>
        </section>
        <!-- END: BlogList -->
        <section class="py-4 bg-white" data-purpose="customer-service-cta">
            <div class="container">
                <div class="cta-wa-banner p-4 p-md-5">
                    <div class="row align-items-center justify-content-between g-3">
                        <div class="col-lg-8">
                            <h2 class="h4 fw-bold text-dark mb-2">Siap mencetak ide Anda?</h2>
                            <p class="text-muted mb-0">Pesan online, file dicek tim kami sebelum dicetak. Butuh saran bahan
                                atau finishing? Chat CS kami.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end d-flex flex-wrap gap-2 justify-content-lg-end">
                            <a class="btn btn-pg-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2 shadow-sm"
                                href="katalog.html">
                                <i class="bi bi-grid"></i> Lihat produk
                            </a>
                            <a class="btn btn-outline-secondary rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-2"
                                href="kontak.html">
                                <i class="bi bi-chat-dots"></i> Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('blogSearchInput');
        const filterButtons = document.querySelectorAll('.pill-filter-btn');
        const blogCards = document.querySelectorAll('#blogGrid .col');
        const featuredCard = document.querySelector('.blog-featured');

        let currentCategory = 'all';
        let currentKeyword = '';

        function applyFilter() {
            if (featuredCard) {
                const fCategory = featuredCard.getAttribute('data-category')?.toLowerCase() || '';
                const fTitle = featuredCard.querySelector('h2 a')?.textContent.toLowerCase() || '';
                const fExcerpt = featuredCard.querySelector('p')?.textContent.toLowerCase() || '';

                const matchesCategory = (currentCategory === 'all' || fCategory === currentCategory);
                const matchesKeyword = (fTitle.includes(currentKeyword) || fExcerpt.includes(currentKeyword));

                if (matchesCategory && matchesKeyword) {
                    featuredCard.style.display = '';
                } else {
                    featuredCard.style.display = 'none';
                }
            }

            blogCards.forEach(function(card) {
                const cardCategory = card.getAttribute('data-category')?.toLowerCase() || '';
                const titleElement = card.querySelector('h2 a');
                const excerptElement = card.querySelector('p');

                const title = titleElement ? titleElement.textContent.toLowerCase() : '';
                const excerpt = excerptElement ? excerptElement.textContent.toLowerCase() : '';

                const matchesCategory = (currentCategory === 'all' || cardCategory === currentCategory);
                const matchesKeyword = (title.includes(currentKeyword) || excerpt.includes(currentKeyword));

                if (matchesCategory && matchesKeyword) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                currentKeyword = searchInput.value.toLowerCase().trim();
                applyFilter();
            });
        }

        filterButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                filterButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                currentCategory = this.getAttribute('data-blog-filter')?.toLowerCase() || 'all';
                applyFilter();
            });
        });
    });
</script>
@endsection
