<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    public function create()
    {
        return view("create");
    }

    public function store()
    {
        CarBrand::create([
            'name' => "奥迪",
            'story' => "奥迪比奔驰宝马保时捷都要号",
            'tags' => 'asss',
            'photos' => 'ppp'
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->aa;
        $data = CarBrand::search($query)->get();
        dd($data->toArray());
    }
}
