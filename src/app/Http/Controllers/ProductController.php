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

    public function search(Request $request)
    {

        $products = Product::KeywordSearch($request->keyword)->get();

        return view('product', compact('products'));
    }

    public function register()
    {
        $seasons = Season::all();
        // dd($seasons);
        return view('register', ['seasons' => $seasons]);
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
        $product->seasons()->attach($season);

        return redirect('products');
    }

    public function detail(Product $productId)
    {
        $seasons = Season::all();
        return view('detail', ['product' => $productId, 'seasons' => $seasons]);
    }

    public function update(Request $request, Product $productId)
    {
        // dd($request->all());
        $product = $request->only(['name', 'price', 'description']);

        $filename = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $filename);
        $product['image'] = $filename;

        $productId->update($product);

        $season = $request->input('season');
        $productId->seasons()->sync($season);

        return redirect('products');
    }

    public function destroy(Product $productId)
    {

        $productId->delete();

        return redirect('products');
    }
}
