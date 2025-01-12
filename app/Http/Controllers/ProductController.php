<?php

namespace App\Http\Controllers;

use App\Models\Prodoct;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class ProductController extends Controller
{
    
    // get all product

    public function index()
    {   
        $product = Prodoct::all()
        ->select('id','name','description','price','discount','image','category_id');
        return response()->json($product);
    }

    //  get Products By Category

    public function getProductsByCategory($category_id) {
        $products = Prodoct::where('category_id', $category_id)
        ->select('id','name','description','price','discount','image','category_id')
        ->get();
        return response()->json($products);
    }

    // get Product By Id
    
    public function show($id)
    {
        $products = Prodoct::where('id', $id)
        ->select('id','name','description','price','discount','image','category_id')
        ->get();
        return response()->json($products);
    }
}
