<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    private $checkValidation = [
        'slug' => [
            'required',
            'string',
            'max:100',
        ],
        'slug' => [
            'required',
            'string',
            'max:100',
        ],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $this->checkValidation['slug'][] = 'unique:tags';
        $this->checkValidation['name'][] = 'unique:tags';
        $request->validate($this->checkValidation);
        $data = $request->all();

        // salvataggio dati
        $tag = new Tag();
        $tag->name = $data['name'];
        $tag->slug = $data['slug'];
        $tag->save();

        // redirezionamento
        return redirect()
            ->route('admin.tags.show', ['tag' => $tag])
            ->with('success_created', $tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        // validazione
        $this->checkValidation['slug'][] = Rule::unique('tags')->ignore($tag);
        $this->checkValidation['name'][] = Rule::unique('tags')->ignore($tag);
        $request->validate($this->checkValidation);
        $data = $request->all();

        // salvataggio dati
        $tag->name = $data['name'];
        $tag->slug = $data['slug'];
        $tag->update();

        // redirezionamento
        return redirect()
            ->route('admin.tags.show', ['tag' => $tag])
            ->with('success_updated', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
