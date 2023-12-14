<?php

namespace App\Http\Controllers;

use App\Models\Fooditem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $foodItem = Fooditem::create($request->all());
        return response()->json($foodItem, 201);
    }

    public function show($id)
    {
        $foodItem = Fooditem::find($id);

        if (!$foodItem) {
            return response()->json(['message' => 'Food Item not found'], 404);
        }

        return response()->json($foodItem);
    }

    public function update(Request $request, $id)
    {
        $foodItem = Fooditem::find($id);

        if (!$foodItem) {
            return response()->json(['message' => 'Food Item not found'], 404);
        }

        $foodItem->update($request->all());

        return response()->json($foodItem, 200);
    }

    public function destroy($id)
    {
        $foodItem = Fooditem::find($id);

        if (!$foodItem) {
            return response()->json(['message' => 'Food Item not found'], 404);
        }

        $foodItem->delete();

        return response()->json(['message' => 'Food Item deleted'], 204);
    }

    public function indexByDonor($donorId)
    {
        $foodItems = Fooditem::where('donor_id', $donorId)->get();

        return response()->json($foodItems);
    }}
