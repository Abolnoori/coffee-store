<?php

namespace App\Http\Controllers;

use App\Models\Prodoct;
use Illuminate\Http\Request;
use openApi\Annotations as OA;
use function Laravel\Prompts\select;

class ProductController extends Controller
{
    
/**
 * @OA\Get(
 *     path="/api/v1/products",
 *     summary="دریافت لیست همه محصولات",
 *     tags={"Products"},
 *     @OA\Response(
 *         response=200,
 *         description="لیست محصولات",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="آیفون 14"),
 *                 @OA\Property(property="description", type="string", example="آخرین مدل آیفون اپل"),
 *                 @OA\Property(property="price", type="number", format="float", example=999.99),
 *                 @OA\Property(property="discount", type="number", format="float", example=10.0),
 *                 @OA\Property(property="image", type="string", example="iphone14.jpg"),
 *                 @OA\Property(property="category_id", type="integer", example=2)
 *             )
 *         )
 *     )
 * )
 */




    // get all product

    public function index()
    {   
        $product = Prodoct::all()
        ->select('id','name','description','price','discount','image','category_id');
        return response()->json($product);
    }







/**
 * @OA\Get(
 *     path="/api/v1/products/category/{category_id}",
 *     summary="دریافت محصولات بر اساس دسته‌بندی",
 *     tags={"Products"},
 *     @OA\Parameter(
 *         name="category_id",
 *         in="path",
 *         required=true,
 *         description="آیدی دسته‌بندی محصول",
 *         @OA\Schema(type="integer", example=3)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="لیست محصولات این دسته‌بندی",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=5),
 *                 @OA\Property(property="name", type="string", example="مانیتور سامسونگ"),
 *                 @OA\Property(property="description", type="string", example="مانیتور ۲۷ اینچ 4K"),
 *                 @OA\Property(property="price", type="number", format="float", example=4200000),
 *                 @OA\Property(property="discount", type="number", format="float", example=15.0),
 *                 @OA\Property(property="image", type="string", example="monitor.jpg"),
 *                 @OA\Property(property="category_id", type="integer", example=3)
 *             )
 *         )
 *     )
 * )
 */





    //  get Products By Category

    public function getProductsByCategory($category_id) {
        $products = Prodoct::where('category_id', $category_id)
        ->select('id','name','description','price','discount','image','category_id')
        ->get();
        return response()->json($products);
    }



/**
 * @OA\Get(
 *     path="/api/v1/products/{id}",
 *     summary="دریافت محصول بر اساس آیدی",
 *     tags={"Products"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="آیدی محصول",
 *         @OA\Schema(type="integer", example=10)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="اطلاعات محصول",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=10),
 *                 @OA\Property(property="name", type="string", example="هدفون بی‌سیم"),
 *                 @OA\Property(property="description", type="string", example="هدفون نویز کنسلینگ حرفه‌ای"),
 *                 @OA\Property(property="price", type="number", format="float", example=1490000),
 *                 @OA\Property(property="discount", type="number", format="float", example=5.0),
 *                 @OA\Property(property="image", type="string", example="headphone.jpg"),
 *                 @OA\Property(property="category_id", type="integer", example=4)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="محصول پیدا نشد"
 *     )
 * )
 */




    // get Product By Id
    
    public function show($id)
    {
        $products = Prodoct::where('id', $id)
        ->select('id','name','description','price','discount','image','category_id')
        ->get();
        return response()->json($products);
    }
}
