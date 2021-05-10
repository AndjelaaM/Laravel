<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre;
use App\Http\Resources\GameResource;
class GameController extends Controller
{
    public function index(){
       
        $resource=GameResource::collection(Game::all());
        $response=[];
        foreach ($resource as $res) {
           $response[]=$res;
        }
        return view('games',["chunks"=>array_chunk($response,3)]);
    }
    public function change(Request $request, $id){
        $game=Game::find($id);
        if(isset($_POST["delete"])){
            $game->delete();
            return redirect('/');
        }
        return view('updateGame',['game'=>$game,'genres'=>Genre::all()]);
    }
    public function update(Request $request, $id){
        $game=Game::find($id);
        $input=$request->all();
        $game->update($input);
        return redirect('/');
    }
    public function newGame(){
       
        
        return view('newGame',['genres'=>Genre::all()]);
    }
    public function create(Request $request){
        $input=$request->all();
        if ($request->hasFile('image')){
          
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalName();
            $filename = $file_extension;
            $destination_path = public_path() . '/folder/img/';
            $request->file('image')->move($destination_path, $filename);
            $input['image'] ='folder/img/'.$filename;
            Game::create($input);
            
          
        }
        return redirect('/');
    }
}
