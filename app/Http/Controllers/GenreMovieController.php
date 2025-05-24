<?php

namespace App\Http\Controllers;

use App\Models\GenreMovie;
use App\Http\Requests\StoreGenreMovieRequest;
use App\Http\Requests\UpdateGenreMovieRequest;

class GenreMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreMovieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GenreMovie $genreMovie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GenreMovie $genreMovie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreMovieRequest $request, GenreMovie $genreMovie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GenreMovie $genreMovie)
    {
        //
    }
}
