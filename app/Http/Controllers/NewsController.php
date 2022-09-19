<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::latest()
                ->orderBy('id', 'desc')
                ->filter(request(['search', 'category']))
                ->paginate(7)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')?->store('news');
        } else {
            $image = null;
        }

        $request->user()->news()->create(array_merge($request->validated(), [
            'image' => $image,
        ]));

        return redirect()->route('admin.news.index')->with('status', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $this->authorize('update', $news);

        if ($request->hasFile('image')) {
            $image = $request->file('image')?->store('news');
        } else {
            $image = $news->image;
        }

        $news->update(array_merge($request->validated(), [
            'image' => $image,
        ]));

        return back()->with('status', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->authorize('delete', $news);

        Storage::delete($news->image ?? '');

        $news->delete();

        return back()->with('status', 'News deleted successfully.');
    }
}
