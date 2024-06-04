<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KelurahanController extends Controller
{
    public function index()
    {
        $villages = Village::all();
        return response()->json($villages);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'code' => 'required|unique:villages|numeric',
        'district_id' => 'required|exists:districts,id',
        'name' => 'required|string|max:255',
        'meta' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $village = Village::create([
        'code' => $request->code,
        'district_id' => $request->district_id,
        'name' => $request->name,
        'meta' => $request->meta,
    ]);

    return response()->json([
        'data' => $village,
        'message' => 'Village added successfully!'], 201);
}


    public function show($id)
    {
        $village = Village::findOrFail($id);
        return response()->json($village);
    }

    public function update(Request $request, $id)
    {
        $village = Village::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'code' => [
                'required',
                Rule::unique('villages')->ignore($village->id),
                'numeric',
            ],
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string|max:255',
            'meta' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $village->update($request->all());
        return response()->json([
            'data' => $village,
            'message' => 'update berhasil'
        ], 201);
    }

    public function destroy($id)
    {
        $village = Village::findOrFail($id);
        $village->delete();
        return response()->json([
            'message' => 'delete berhasil',
            null], 204);
    }

    public function viewindex()
{
    $villages = Village::all();
    return view('villages.index', compact('villages'));
}

public function edit($id)
{
    $village = Village::findOrFail($id);
    $districts = District::all();
    return view('villages.edit', compact('village', 'districts'));
}

public function create()
{
    $districts = District::all();
    return view('villages.create', compact('districts'));
}

public function lihat($id)
{
    $village = Village::findOrFail($id);
    return view('villages.show', compact('village'));
}

}