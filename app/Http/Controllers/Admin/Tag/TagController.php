<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;


class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request)
    {
        $data= $request->validated();
        Tag::firstOrcreate($data); // Используется first для создания только уникальных значений, при этом у можно развёрнуто делать с разными условиями

        return redirect()->route('admin.tag.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {

        $data = $request->validated();
        $tag->update($data);

        return redirect()->route('admin.tag.show', compact('tag'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tag.index',compact('tag'));
    }

}


