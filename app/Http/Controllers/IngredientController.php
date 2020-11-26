<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Recipe;

class IngredientController extends Controller
{
    public function get(Recipe $recipe){
        $ingredients = $recipe->ingredients;

        if(count($ingredients) > 0){
            return response()->json(['data' => $ingredients], 200);
        }

        return response()->json(['data' => 'no ingredients for this recipes yet'], 404);
    }

    public function store(Recipe $recipe, Request $request){
        if(is_null($recipe)){
            return response()->json(["data" => "can not add ingredients without a recipe"], 404);
        }
        foreach ($request->ingredients as $key => $ingredient_data){
            $ingredient = new Ingredient();

            $ingredient->ingredient = $ingredient_data['ingredient'];
            $ingredient->amount = $ingredient_data['amount'];
            $ingredient->measurement_unit = $ingredient_data['measurement_unit'];
            $ingredient->recipe_id = $recipe->id;
            $ingredient->save();
        }

        return response()->json(['data' => 'ingredient saved']);
    }

    public function update(Request $request){
        $ingredient = Ingredient::whereId($request->input('id'))->first();

        if(!is_null($ingredient)){
            $ingredient->ingredient = $request->input("ingredient");
            $ingredient->amount  = $request->input("amount");
            $ingredient->measurement_unit = $request->input("measurement_unit");

            $ingredient->save();

            return response()->json(["data" => "ingredient is updated"], 200);
        }
        return response()->json(["data" => "could not find instruction to update"], 500);

    }

    public function destory(Request $request){
        $ingredient = Ingredient::whereId($request->input("id"))->first();

        if(!is_null($ingredient)){
            $ingredient->delete();
            return response()->json(["data" => "ingredient is deleted"], 200);
        }

        return response()->json(["data" => "ingredient is not deleted", 500]);
    }

}
