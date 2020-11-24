<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index(){
        $recipes = Recipe::all();


      return response()->json(['data' => $recipes], 200);
    }

    public function store(Request $request){
        $recipe = Recipe::create([
                "title" => $request->input("title"),
                "imageUrl" => $request->input("imageUrl")
            ]
        );

        return response()->json(["data" => $recipe], 201);
    }

public function destory(Request $request){
        $recipe = Recipe::whereId($request->input("id"))->first();

        if(!is_null($recipe)){
            $recipe->delete();
            return response()->json(["data" => "recipe is deleted"], 200);
        }

        return response()->json(["data" => "recipe is not deleted", 500]);
}

public function  getOne($id){
        $recipe = Recipe::where("id", "=", $id)->first();

        return response()->json(["data" => $recipe], 200);
}

public function update(Request $request){
    $recipe = Recipe::whereId($request->input('id'))->first();

    if(!is_null($recipe)){
        $recipe->title = $request->input("title");
        $recipe->imageUrl = $request->input("imageUrl");

        $recipe->save();

        return response()->json(["data" => "recipe is updated"], 200);
    }
return response()->json(["data" => "could not find recipe to update"], 500);

}

}
