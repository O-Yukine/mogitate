<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function register()
    {
        $seasons = Season::all();
        // dd($seasons);
        return view('/register', ['seasons' => $seasons]);
    }

    public function store(Request $request)
    {

        //写真をそのままの名前で保存
        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $filename);

        //Productテーブルにデータ保存
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $filename
        ]);

        //中間テーブルに季節を保存
        $season = $request->input('season');
        $product->seasons()->sync($season);

        return redirect('/products');
    }
}
