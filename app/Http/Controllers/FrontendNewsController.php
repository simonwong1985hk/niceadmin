<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendNewsController extends Controller
{
    public function index()
    {
        $news = News::with(['author', 'category'])
            ->latest()
            ->orderBy('id', 'desc')
            ->filter(request(['category']))
            ->simplePaginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name', 'asc')->get();

        return view('news.index', [
            'news' => $news,
            'categories' => $categories
        ]);
    }
}
