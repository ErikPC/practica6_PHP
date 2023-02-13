<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use App\Models\Formulario;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formularios = Formulario::orderBy('id', 'desc')->paginate(5);
        return view('formulario', compact('formularios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormularioRequest $request)
    {

        $post = new Formulario;
        $post->title = $request->title;
        $post->excerpt = $request->extract;
        $post->content = $request->content;
        $post->access = $request->access;
        $post->save();

        return redirect()->route('formulario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formulario = Formulario::findOrFail($id);
        return view('formularios.show', compact('formulario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulario = Formulario::findOrFail($id);
        return view('formularios.edit', compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormularioRequest $request, $id)
    {
        $post = Formulario::findOrFail($id);
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->access = $request->access;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulario = Formulario::findOrFail($id);
        $formulario->delete();
        return redirect()->route('posts.index');
    }
}
