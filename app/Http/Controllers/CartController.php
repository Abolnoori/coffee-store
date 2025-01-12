<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Prodoct;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
