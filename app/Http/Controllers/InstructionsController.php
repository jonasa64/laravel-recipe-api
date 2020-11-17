<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruction;
use App\Models\Recipe;

class InstructionsController extends Controller
{

    public function get(Recipe $recipe){
        $instructions = $recipe->instructions;

        if(count($instructions) > 0){
            return response()->json(["instructions" => $instructions], 200);
        }

         return response()->json(["instructions" => 'no instructions yet'], 200);
    }

    public function update(Request $request){
        $instruction = Instruction::whereId($request->input('id'))->first();

        if(!is_null($instruction)){
            $instruction->instruction = $request->input("instruction");

            $instruction->save();

            return response()->json(["message" => "instruction is updated"], 200);
        }
        return response()->json(["message" => "could not find instruction to update"], 500);

    }
}
