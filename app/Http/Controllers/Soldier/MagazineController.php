<?php

namespace App\Http\Controllers\Soldier;

use App\Soldier\Gun;
use App\Soldier\Magazine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagazineController extends Controller
{

    public function store($gun_id) {
        $gun = Gun::with(['magazine'])
            ->find($gun_id);

        if (!$gun) {
            return response()->json("Can't find gun");
        }

        $magazineCount = $gun->magazine->count();
        $max_magazine = $gun->max_magazine;

        if ($max_magazine <= $magazineCount) {
            return response()->json("This gun is verified, can't add more magazine, max magazine is " . $max_magazine);
        }

        $data = Magazine::create([
            'gun_id' => $gun_id,
        ]);

        return response()->json($data);
    }

    public function delete($id) {
        $data = Magazine::with(['gun'])
            ->find($id);

        if (!$data) {
            return response()->json("Can't find magazine");
        }

        $gunName = $data->gun->name;
        $data->delete();
        return response()->json('success to delete magazine from ' . $gunName);
    }
}
