<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index(){
        $recipes = Recipe::all();


      return response()->json(['recipes' => $recipes], 200);
    }

    public function store(Request $request){
        $recipe = Recipe::create([
                "title" => $request->input("title"),
                "instructions" => $request->input("instructions"),
                "imageUrl" => $request->input("imageUrl")
            ]
        );

        return response()->json(["recipe" => $recipe], 201);
    }

public function destory(Request $request){
        $recipe = Recipe::whereId($request->input("id"))->first();

        if(!is_null($recipe)){
            $recipe->delete();
            return response()->json(["message" => "recipe is deleted"], 200);
        }

        return response()->json(["message" => "recipe is not deleted", 500]);
}

public function  getOne($id){
        $recipe = Recipe::where("id", "=", $id)->first();

        return response()->json(["recipe" => $recipe], 200);
}

public function update(Request $request){
    $recipe = Recipe::whereId($request->input('id'))->first();

    if(!is_null($recipe)){
        $recipe->title = $request->input("title");
        $recipe->instructions = $request->input("instructions");
        $recipe->imageUrl = $request->input("imageUrl");

        $recipe->save();

        return response()->json(["message" => "recipe is updated"], 200);
    }
return response()->json(["message" => "could not find recipe to update"], 500);

}

}