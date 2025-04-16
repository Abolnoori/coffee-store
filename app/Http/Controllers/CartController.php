<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Prodoct;
use Illuminate\Http\Request;

class CartController extends Controller
{


    /**
 * @OA\Get(
 *     path="/api/v1/cart/{id}",
 *     summary="نمایش سبد خرید یک کاربر",
 *     description="نمایش آیتم‌ها و محصولات موجود در سبد خرید بر اساس آیدی کاربر",
 *     tags={"Cart"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="آیدی کاربر",
 *         @OA\Schema(type="integer", example=5)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="نمایش سبد خرید یا پیام خالی بودن آن",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=3),
 *                     @OA\Property(property="user_id", type="integer", example=5),
 *                     @OA\Property(property="items", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="product", type="object",
 *                                 @OA\Property(property="id", type="integer", example=10),
 *                                 @OA\Property(property="name", type="string", example="گوشی سامسونگ A73"),
 *                                 @OA\Property(property="price", type="number", format="float", example=14500000),
 *                                 @OA\Property(property="image", type="string", example="a73.jpg")
 *                             ),
 *                             @OA\Property(property="quantity", type="integer", example=2)
 *                         )
 *                     )
 *                 ),
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="message", type="string", example="سبد خرید شما خالی است.")
 *                 )
 *             }
 *         )
 *     )
 * )
 */




    // نشان دادن سبد خرید یوزر
    public function index($id)
{
        $cart = Cart::with('items.product')->where('user_id', $id )->first();
        // ->select('id');

        if (!$cart) {
            return response()->json(['message' => 'سبد خرید شما خالی است.'], 200);
        }

        return response()->json($cart, 200);
}
    




/**
 * @OA\Post(
 *     path="/api/v1/cart/add",
 *     summary="افزودن محصول به سبد خرید کاربر",
 *     description="اگر محصول قبلاً داخل سبد بوده، فقط تعدادش افزایش می‌یابد. در غیر این صورت، محصول جدید به سبد اضافه می‌شود.",
 *     tags={"Cart"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"userid", "productid", "quantity"},
 *             @OA\Property(property="userid", type="integer", example=3, description="آیدی کاربر"),
 *             @OA\Property(property="productid", type="integer", example=12, description="آیدی محصول"),
 *             @OA\Property(property="quantity", type="integer", example=2, description="تعداد")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="محصول با موفقیت به سبد خرید اضافه شد",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Product added to cart")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="خطای اعتبارسنجی",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="object")
 *         )
 *     )
 * )
 */




    // اضافه کرئن به سبد خرید یوزر
    public function add(Request $request)
{
    $request->validate([
        'userid' =>  'required|exists:users,id',
        'productid' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);
    
    $cart = Cart::firstOrCreate(['user_id' => $request->userid]);
    $cartItem = $cart->items()->where('product_id', $request->productid)->first();

        $price = Prodoct::find($request->productid)->price;
        $discount = Prodoct::find($request->productid)->discount;
        // اطمینان حاصل کنید که $price عدد است
        $price = (string) $price;
    if ($cartItem) {
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
        // ذخیره قیمت به صورت فرمت شده در دیتابیس یا نمایش آن
        $cart->items()->create([
            'product_id' => $request->productid,
            'quantity' => $request->quantity,
            'discount' =>  $discount ,
            'price' => $price,  // ذخیره قیمت به صورت رشته
        ]);
    }

    return response()->json(['message' => 'Product added to cart'], 201);
}










    // حذف کردن یدونه از سبد خرید
public function remove($userid, $productid, $quantity)
{
    // اعتبارسنجی ورودی‌ها
    if (!is_numeric($quantity) || (int)$quantity === 0) {
        return response()->json(['message' => 'تعداد وارد شده معتبر نیست'], 400);
    }

    // پیدا کردن آیتم سبد خرید بر اساس productid
    $cartItem = CartItem::where('product_id', $productid)->first();

    if (!$cartItem) {
        return response()->json(['message' => 'محصول مورد نظر در سبد خرید پیدا نشد'], 404);
    }

    // اطمینان از اینکه کاربر مجاز به دسترسی به این آیتم است
    if ((string)$cartItem->cart->user_id !== (string)$userid) {
        return response()->json(['message' => 'دسترسی غیرمجاز'], 403);
    }

    // کاهش تعداد محصول
    $newQuantity = $cartItem->quantity + $quantity; // افزودن مقدار منفی یا مثبت

    if ($newQuantity > 0) {
        // ذخیره تغییرات اگر تعداد هنوز مثبت باشد
        $cartItem->quantity = $newQuantity;
        $cartItem->save();
        return response()->json(['message' => 'تعداد به‌روزرسانی شد', 'quantity' => $cartItem->quantity], 200);
    } elseif ($newQuantity <= 0) {
        // اگر تعداد به صفر یا کمتر رسید، محصول را حذف کن
        $cartItem->delete();
        return response()->json(['message' => 'محصول از سبد خرید حذف شد'], 200);
    }

    // در صورت وقوع خطای ناشناخته
    return response()->json(['message' => 'یک خطای ناشناخته رخ داد'], 500);
}






/**
 * @OA\Delete(
 *     path="/api/v1/cart/remove/{userid}/{productid}/{quantity}",
 *     summary="حذف یا کاهش تعداد یک محصول از سبد خرید کاربر",
 *     description="اگر تعداد جدید صفر یا کمتر باشد، محصول از سبد خرید حذف می‌شود. در غیر این صورت فقط مقدار آن کاهش می‌یابد.",
 *     tags={"Cart"},
 *     @OA\Parameter(
 *         name="userid",
 *         in="path",
 *         required=true,
 *         description="آیدی کاربر",
 *         @OA\Schema(type="integer", example=3)
 *     ),
 *     @OA\Parameter(
 *         name="productid",
 *         in="path",
 *         required=true,
 *         description="آیدی محصولی که باید از سبد خرید حذف یا کم شود",
 *         @OA\Schema(type="integer", example=12)
 *     ),
 *     @OA\Parameter(
 *         name="quantity",
 *         in="path",
 *         required=true,
 *         description="تعداد برای کم‌کردن (مثبت یا منفی). اگر نتیجه نهایی صفر یا کمتر شود، آیتم حذف می‌شود.",
 *         @OA\Schema(type="integer", example=-1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="محصول حذف شد یا تعداد به‌روزرسانی شد",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="message", type="string", example="محصول از سبد خرید حذف شد")
 *                 ),
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="message", type="string", example="تعداد به‌روزرسانی شد"),
 *                     @OA\Property(property="quantity", type="integer", example=2)
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="مقدار وارد شده معتبر نیست",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="تعداد وارد شده معتبر نیست")
 *         )
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="دسترسی غیرمجاز به آیتم",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="دسترسی غیرمجاز")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="آیتم مورد نظر یافت نشد",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="محصول مورد نظر در سبد خرید پیدا نشد")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="خطای ناشناخته",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="یک خطای ناشناخته رخ داد")
 *         )
 *     )
 * )
 */


    // حذف تمام سبد خرید یک بوزر
public function clear($userid)
{
    $cart = Cart::where('user_id', $userid)->first();

    if ($cart) {
        // حذف تمامی آیتم‌های موجود در سبد
        $cart->items()->delete();

        // حذف خود رکورد سبد
        $cart->delete();
    }

    return response()->json(['message' => 'سبد خرید و کاربر مرتبط با آن حذف شدند'], 200);
}


}
