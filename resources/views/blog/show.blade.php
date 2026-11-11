@extends('layout.app')
@section('content')
    <div class="flex flex-col w-full">
        <div class="bg-light border-bottom py-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 py-1" style="font-size: 0.85rem;">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none text-muted d-inline-flex align-items-center gap-1"
                                href="index.html">
                                <i class="bi bi-house-door"></i> Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none text-muted" href="blog.html">Blog</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none text-muted"
                                href="blog.html#tips-dan-trick">Tips &amp; Trick</a></li>
                        <li aria-current="page"
                            class="breadcrumb-item active text-primary fw-semibold text-truncate blog-crumb-title">Mengapa
                            Visual Branding Penting dalam Penyelenggaraan Event?</li>
                    </ol>
                </nav>
            </div>
        </div>
        <article>
            <!-- BEGIN: ArticleHeader -->
            <header class="bg-white pt-4 pt-lg-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-xl-8 text-center">
                            <a class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 mb-3 text-decoration-none"
                                href="blog.html#tips-dan-trick">Tips &amp; Trick</a>
                            <h1 class="display-6 fw-bold text-dark lh-sm mb-3">{{ $blog->name ?? '' }}</h1>
                            <p class="text-muted fs-6 lh-base mb-4">{{ $blog->brief_description ?? '' }}</p>
                            <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 small text-muted">
                                <span class="d-inline-flex align-items-center gap-2 fw-semibold text-dark">
                                    <img alt="" class="rounded-circle object-fit-cover border" height="36"
                                        src="https://api-minio.primagraphia.co.id/web-asset/images/assets/logo-pg-persona.jpg"
                                        width="36" />
                                    Tim PPKD Sticker
                                </span>
                                <span class="d-inline-flex align-items-center gap-1"><i class="bi bi-calendar3"></i><time
                                        datetime="{{ $blog->created_at }}">{{ $blog->created_at->format('d M Y') }}</time></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4 mt-lg-5">
                        <div class="col-xl-10">
                            <figure class="mb-0 rounded-4 overflow-hidden shadow-sm bg-light blog-hero-media">
                                <img alt="Mengapa Visual Branding Penting dalam Penyelenggaraan Event?"
                                    class="w-100 h-100 object-fit-cover" data-img-fallback fetchpriority="high"
                                    src="{{ asset('storage/' . $blog->cover_path) ?? '' }}" />
                            </figure>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: ArticleHeader -->
            <!-- BEGIN: ArticleBody -->
            <section class="bg-white py-5">
                <div class="container">
                    <div class="row justify-content-center g-4 g-xl-5">
                        <div class="col-lg-8 col-xl-7">
                            <div class="blog-prose" id="blogContent">
                                {!! $blog->content ?? '' !!}
                            </div>
                            <!-- Share -->
                            <div
                                class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 p-3 p-lg-4 mt-5 bg-light rounded-4 border">
                                <p class="fw-semibold text-dark mb-0">Bermanfaat? Bagikan artikel ini.</p>
                                <div class="d-flex flex-wrap align-items-center gap-2" data-blog-share
                                    data-title="Mengapa Visual Branding Penting dalam Penyelenggaraan Event?">
                                    <button class="btn btn-sm btn-pg-primary rounded-pill px-3 d-none" data-share-native
                                        type="button"><i class="bi bi-share me-1"></i>Bagikan</button>
                                    <a aria-label="Bagikan ke WhatsApp"
                                        class="btn btn-sm btn-light border rounded-circle blog-share-btn"
                                        data-share="whatsapp" href="#" rel="noopener noreferrer" target="_blank"><i
                                            class="bi bi-whatsapp"></i></a>
                                    <a aria-label="Bagikan ke Facebook"
                                        class="btn btn-sm btn-light border rounded-circle blog-share-btn"
                                        data-share="facebook" href="#" rel="noopener noreferrer" target="_blank"><i
                                            class="bi bi-facebook"></i></a>
                                    <a aria-label="Bagikan ke LinkedIn"
                                        class="btn btn-sm btn-light border rounded-circle blog-share-btn"
                                        data-share="linkedin" href="#" rel="noopener noreferrer" target="_blank"><i
                                            class="bi bi-linkedin"></i></a>
                                    <button class="btn btn-sm btn-light border rounded-pill px-3" data-share-copy
                                        type="button"><i class="bi bi-link-45deg me-1"></i><span data-copy-label>Salin
                                            tautan</span></button>
                                </div>
                            </div>
                            <!-- Prev / next -->
                            <div class="row row-cols-1 row-cols-md-2 g-3 mt-2">
                                <!-- Artikel Sebelumnya -->
                                <div class="col">
                                    @if (isset($previousBlog) && $previousBlog)
                                        <a class="card border-0 shadow-sm rounded-4 h-100 text-decoration-none blog-pager"
                                            href="{{ route('blog.show', $previousBlog->slug) }}">
                                            <div class="card-body p-3 p-lg-4">
                                                <div class="small text-muted mb-1"><i
                                                        class="bi bi-arrow-left me-1"></i>Artikel sebelumnya</div>
                                                <div class="fw-semibold text-dark lh-sm">{{ $previousBlog->name }}</div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <aside class="col-lg-4 col-xl-3 d-none d-lg-block" aria-label="Navigasi artikel">
                            <div class="blog-aside d-flex flex-column gap-4">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-body p-4">
                                        <h2 class="small text-uppercase fw-bold text-muted mb-3"
                                            style="letter-spacing: .05em;">Daftar isi</h2>
                                        <nav class="nav flex-column blog-toc" id="blogToc">
                                            <a class="nav-link" href="#sec-apa-itu-visual-branding-dalam-event">Apa Itu
                                                Visual Branding dalam Event?</a>
                                            <a class="nav-link"
                                                href="#sec-mengapa-visual-branding-penting-dalam-penyelenggaraan-event">Mengapa
                                                Visual Branding Penting dalam Penyelenggaraan Event?</a>
                                            <a class="nav-link ps-3 blog-toc-sub"
                                                href="#sec-1-membangun-kesan-pertama-yang-profesional">1. Membangun Kesan
                                                Pertama yang Profesional</a>
                                            <a class="nav-link ps-3 blog-toc-sub"
                                                href="#sec-2-memperkuat-identitas-brand">2. Memperkuat Identitas Brand</a>
                                            <a class="nav-link ps-3 blog-toc-sub"
                                                href="#sec-3-membantu-navigasi-dan-penyampaian-informasi">3. Membantu
                                                Navigasi dan Penyampaian Informasi</a>
                                            <a class="nav-link ps-3 blog-toc-sub"
                                                href="#sec-4-menciptakan-area-yang-menarik-untuk-dokumentasi">4.
                                                Menciptakan Area yang Menarik untuk Dokumentasi</a>
                                            <a class="nav-link ps-3 blog-toc-sub"
                                                href="#sec-5-mendukung-pengalaman-pengunjung">5. Mendukung Pengalaman
                                                Pengunjung</a>
                                            <a class="nav-link"
                                                href="#sec-media-cetak-apa-saja-yang-mendukung-visual-branding-event">Media
                                                Cetak Apa Saja yang Mendukung Visual Branding Event?</a>
                                            <a class="nav-link"
                                                href="#sec-wujudkan-visual-branding-event-bersama-primagraphia">Wujudkan
                                                Visual Branding Event Bersama PrimaGraphia</a>
                                        </nav>
                                    </div>
                                </div>
                                <div class="rounded-4 p-4 text-white blog-aside-cta">
                                    <p class="fw-bold mb-2">Siap mencetak ide Anda?</p>
                                    <p class="small mb-3 opacity-75">Pesan online, file dicek tim kami sebelum dicetak.</p>
                                    <a class="btn btn-light btn-sm rounded-pill px-3 fw-semibold text-primary"
                                        href="{{ route('product.index') }}">Lihat produk <i
                                            class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
            <!-- END: ArticleBody -->
        </article>
        <!-- BEGIN: RelatedArticles -->
        <section class="py-5 bg-light" aria-labelledby="blogRelated">
            <div class="container">
                <div class="d-flex align-items-end justify-content-between gap-3 mb-4">
                    <h2 class="h4 fw-bold text-dark mb-0" id="blogRelated">Baca juga</h2>
                    <a class="text-primary fw-semibold small d-flex align-items-center gap-1"
                        href="{{ route('blog.index') }}">Semua
                        artikel <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($relatedBlogs as $item)
                        <div class="col" data-category="{{ $item->category->slug ?? '' }}">
                            <article class="article-card blog-card">
                                <a class="ratio ratio-3x2 d-block overflow-hidden bg-light blog-card-media"
                                    href="{{ route('blog.show', $item->slug) }}" tabindex="-1" aria-hidden="true">
                                    <img alt="{{ $item->name }}" class="object-fit-cover" data-img-fallback
                                        loading="lazy" src="{{ asset('storage/' . $item->cover_path) }}" />
                                </a>
                                <div class="p-3 p-lg-4 d-flex flex-column flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 text-muted small mb-2">
                                        <span
                                            class="text-primary fw-semibold">{{ $item->category->name ?? 'Uncategorized' }}</span>
                                        <span aria-hidden="true">·</span>
                                        <time
                                            datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->translatedFormat('d M Y') }}</time>
                                    </div>
                                    <h3 class="h6 fw-bold mb-2 lh-sm">
                                        <a class="text-dark stretched-link-title text-decoration-none"
                                            href="{{ route('blog.show', $item->slug) }}">{{ $item->name }}</a>
                                    </h3>
                                    <p class="text-muted small mb-3 flex-grow-1 blog-excerpt">
                                        {{ Str::limit($item->brief_description, 90) }}</p>
                                    <a class="text-primary fw-bold small d-inline-flex align-items-center gap-1 mt-auto text-decoration-none"
                                        href="{{ route('blog.show', $item->slug) }}">
                                        Baca artikel <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- END: RelatedArticles -->
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
                                href="{{ route('product.index') }}">
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
@endsection
