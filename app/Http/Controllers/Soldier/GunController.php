<?php

namespace App\Http\Controllers\Soldier;

use App\Soldier\Gun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GunController extends Controller
{
    public function index() {
        $data = Gun::latest()->get();
        return response()->json($data);
    }

    public function store(Request $request) {
        $data = Gun::create([
            'name' => $request->name,
            'max_magazine' => $request->max_magazine,
        ]);

        return response()->json($data);
    }

    public function show($id) {
        $data = Gun::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id) {
        $data = Gun::find($id);
        $data->name = $request->name;
        $data->max_magazine = $request->max_magazine;
        $data->save();
        return response()->json($data);
    }

    public function delete($id) {
        $data = Gun::find($id);
        $name = $data->name;
        $data->delete();
        return response()->json('success to delete ' . $name);
    }
}
