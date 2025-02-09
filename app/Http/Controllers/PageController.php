<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'pages' => Page::all(),
            'rootpages' => Page::whereNull('parent_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newpage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = Page::create([
            'title' => $request->title,
            'text' => $request->text,
            'parent_id' => $request->parent_id,
        ]);

        return redirect("/page/$page->id");
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('viewpage', [
            'page' => $page,
            'rootpages' => Page::whereNull('parent_id')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('viewpage', [
            'page' => $page,
            'rootpages' => Page::whereNull('parent_id')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $page->title = $request->title;
        $page->text = $request->text;
        $page->save();

        return redirect("/page/$page->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect('/');
    }
}
