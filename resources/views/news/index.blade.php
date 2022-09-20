@extends('layouts.blog')

@section('content')

<div class="row mb-2 mt-4 d-none">
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">World</strong>
                <h3 class="mb-0">Featured post</h3>
                <div class="mb-1 text-muted">Nov 12</div>
                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                </svg>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">Design</strong>
                <h3 class="mb-0">Post title</h3>
                <div class="mb-1 text-muted">Nov 11</div>
                <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                </svg>

            </div>
        </div>
    </div>
</div>

<div class="row g-5 mt-2">
    <div class="col-md-8">
        @foreach ($news as $item)
        <article class="blog-post">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid" style="width:200px;" />
            <h2 class="blog-post-title mb-1">{{ $item->title }}</h2>
            <p class="blog-post-meta">{{ $item->created_at->diffForHumans() }} by {{ $item->author->name }} | <a href="{{ route('home', ['category' => $item->category->id]) }}&{{ http_build_query(request()->except('category', 'page')) }}">{{ $item->category->name }}</a></p>
            <div>{!! $item->content !!}</div>

        </article>
        @endforeach

        {{ $news->links() }}

    </div>

    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4">
                <h4 class="fst-italic">Category</h4>
                <ol class="list-unstyled">
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('home', ['category' => $category->id]) }}&{{ http_build_query(request()->except('category', 'page')) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection