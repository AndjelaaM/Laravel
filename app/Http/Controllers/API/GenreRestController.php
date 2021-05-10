<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres=Genre::all();
        return response()->json($genres,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        try {
            Genre::create($input);
            return response()->json($input,200);
        } catch (\Throwable $th) {
            return response()->json($th,503);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        if(isset($genre)){
            return response()->json($genre,200);
           }
           return response()->json(null,404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        if(!isset($genre)){
            return response()->json(null,404);
        }
        try {
            if(isset($request->name)){
                $genre->name=$request->name;
            }
            $genre->save();
            return response()->json($game,200);
        } catch (\Throwable $th) {
            return response()->json($th,501);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        if(!isset($genre)){
            return response()->json(null,404);
        }
        try {
            $genre->delete();
            return  response()->json(null,200);
        } catch (\Throwable $th) {
            return  response()->json($th,501);
        }
    }
}
