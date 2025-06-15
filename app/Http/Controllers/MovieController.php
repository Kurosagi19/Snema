<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả phim
        $movies = Movie::all();
        return view('Movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = DB::table('movies')
            ->join('genre_movies', 'movies.genre_movie_id', '=', 'genre_movies.id')
            ->join('genres', 'genre_movies.genre_id', '=', 'genres.id')
            ->select('movies.*', 'genres.genre_name as genre_name', 'genres.id as genre_id')
            ->get();
        $genres = Genre::all();
        return view('movies.create', compact('movies', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $img_name = $request->file('poster')->getClientOriginalName();
        if(!Storage::exists('/public/dashboard/img'.$img_name)) {
            Storage::putFileAs('public/dashboard/img', $request->file('poster'), $img_name);
        }
        $array = [];
        $array = Arr::add($array, 'title', $request->title);
        $array = Arr::add($array, 'release_date', $request->release_date);
        $array = Arr::add($array, 'poster', $img_name);
        $array = Arr::add($array, 'author', $request->author);
        $array = Arr::add($array, 'duration', $request->duration);
        $array = Arr::add($array, 'language', $request->language);
        $array = Arr::add($array, 'caption', $request->caption);
        $array = Arr::add($array, 'description', $request->description);
        $array = Arr::add($array, 'comment', $request->comment);
        $array = Arr::add($array, 'rating', $request->rating);
        $array = Arr::add($array, 'genre_movie_id', $request->genre_movie_id);
        Movie::create($array);
        return Redirect::route('admin.movies');
    }

    /**
     * Display the specified resource.
     */
    public function details($id)
    {
        $cinemas = Cinema::all();
        $showtimes = Showtime::all();
        $movies = Movie::with('genre_movie.genre')->findOrFail($id);
        return view('movies.movie_details', compact('movies', 'cinemas', 'showtimes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movie = Movie::with('genre_movie.genre')->findOrFail($id);
        $genre_movies = GenreMovie::with('genre')->get();
        return view('Movies.edit', compact('movie', 'genre_movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png',
            'author' => 'nullable|string',
            'duration' => 'nullable|integer',
            'language' => 'nullable|string',
            'caption' => 'nullable|string',
            'description' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:10',
            'genre_movie_id' => 'nullable|exists:genre_movies,id',
        ]);

        $movie = Movie::findOrFail($id);

        $movie->update([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'author' => $request->author,
            'duration' => $request->duration,
            'language' => $request->language,
            'caption' => $request->caption,
            'description' => $request->description,
            'rating' => $request->rating,
            'genre_movie_id' => $request->genre_movie_id,
        ]);

        // Nếu người dùng upload poster mới
        if ($request->hasFile('poster')) {
            $poster_path = $request->file('poster')->store('posters', 'public');
            $movie->poster = $poster_path;
            $movie->save();
        }

        return redirect()->route('admin.movies')->with('success', 'Cập nhật phim thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie, Request $request)
    {
        $del_movie = new Movie();
        $del_movie->id = $request->id;
        $del_movie->destroyMovie();
        return Redirect::route('admin.movies');
    }
}
