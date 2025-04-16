<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{



    /**
 * @OA\Post(
 *     path="/api/v1/contact",
 *     summary="ارسال پیام از طریق فرم تماس با ما",
 *     tags={"Contact"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email", "subject", "message"},
 *             @OA\Property(property="name", type="string", example="حسین علیزاده"),
 *             @OA\Property(property="email", type="string", format="email", example="hossain@example.com"),
 *             @OA\Property(property="subject", type="string", example="پرسش در مورد محصول"),
 *             @OA\Property(property="message", type="string", example="لطفا اطلاعات بیشتری در مورد این محصول بدهید.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="پیام با موفقیت ارسال شد",
 *         @OA\JsonContent(
 *             @OA\Property(property="Send Message", type="object",
 *                 @OA\Property(property="name", type="string", example="حسین علیزاده"),
 *                 @OA\Property(property="email", type="string", example="hossain@example.com"),
 *                 @OA\Property(property="subject", type="string", example="پرسش در مورد محصول"),
 *                 @OA\Property(property="message", type="string", example="لطفا اطلاعات بیشتری در مورد این محصول بدهید.")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="خطا در اعتبارسنجی",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="object")
 *         )
 *     )
 * )
 */





    //add 
    public function index(Request $request){

        $data = $request->all();

        $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
        ];

        $validator = Validator::make( $data ,$rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }else{

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return response()->json(['Send Message'=> $contact] );
        };





    }





/**
 * @OA\Get(
 *     path="/api/v1/contact",
 *     summary="دریافت لیست تمام پیام‌های ارسال‌شده از فرم تماس با ما",
 *     tags={"Contact"},
 *     @OA\Response(
 *         response=200,
 *         description="لیست پیام‌های ارسال‌شده",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="حسین علیزاده"),
 *                 @OA\Property(property="email", type="string", example="hossain@example.com"),
 *                 @OA\Property(property="subject", type="string", example="پرسش در مورد محصول"),
 *                 @OA\Property(property="message", type="string", example="لطفا اطلاعات بیشتری در مورد این محصول بدهید.")
 *             )
 *         )
 *     )
 * )
 */





    //show
    public function show(){
        $contact = Contact::all()
        ->select('id','name','email','subject','message');
        return response()->json($contact);

    }



/**
 * @OA\Get(
 *     path="/api/v1/articles",
 *     summary="دریافت لیست تمام مقالات",
 *     tags={"Articles"},
 *     @OA\Response(
 *         response=200,
 *         description="لیست مقالات",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="عنوان مقاله"),
 *                 @OA\Property(property="description", type="string", example="توضیحاتی درباره مقاله"),
 *                 @OA\Property(property="image", type="string", example="article-image.jpg"),
 *                 @OA\Property(property="category_id", type="integer", example=2),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-04-15T12:00:00Z"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-04-14T12:00:00Z")
 *             )
 *         )
 *     )
 * )
 */




    //showarticles
    public function showarticles(){

        $articles = Article::all()
        ->select('id', 'title','description','image','category_id','updated_at','created_at');
        return response()->json($articles);



    }



    
}
