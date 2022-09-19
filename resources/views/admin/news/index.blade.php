@extends('admin.layouts.app')

@section('title', 'All News')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All News</h5>

                @if ($news->count())
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::words($item->content, 7) }}</td>
                                <td>{{ $item->author->name }}</td>
                                <td>
                                    <a href="{{ route('admin.news.index', ['category' => $item->category->id]) }}&{{ http_build_query(request()->except('category', 'page')) }}">
                                        {{ $item->category->name }}
                                    </a>
                                </td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <!-- edit -->
                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="d-inline btn btn-link">Edit</a>

                                    <!-- delete -->
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link text-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $news->links() }}
                @else
                <p class="text-center">No News Found.</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection