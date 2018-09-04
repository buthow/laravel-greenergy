<?php

namespace App\Http\Controllers;

use App\About;
use App\Brand;
use App\CaseStudy;
use App\Contact;
use App\News;
use App\NewsImage;
use App\Product;
use App\ProductImage;
use App\Quote;
use App\Service;
use App\Slider;
use App\SliderImage;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{

    public function register(Requests\Register $request){


        $insert                 =   new User();
        $insert->username       =   Input::get('username');
        $insert->password       =   Hash::make(Input::get('password'));
        $insert->downloads      =   0;
        $insert->save();

        return redirect('/login')->with('success','Registered successfully.');


    }

    public function login_form(){

        if (auth('user')->check()){
            return redirect('/');
        }else{

            return view('frontend.login.login');
        }



    }

    public function login(Requests\Login $request){

        $username           =   Input::get('login-username');
        $password           =   Input::get('login-pwd');


        $remember           =   true;
        //$remember           =   (Input::get('remember') && Input::get('remember') == "1" ? true : false);

        if (auth('user')->attempt(['username' => $username, 'password' => $password],$remember)) {

            return redirect('/');

        }else{

            return redirect('/login')->with('fail','Invalid username or password');

        }


    }

    public function logout(){

        auth('user')->logout();

        return redirect('/');

    }

    //  ================    INDEX    ================

    public function index(){

        $slider_data        =   Slider::all();
        $slider_desc        =   Slider::find(1);
        $slider_images      =   SliderImage::all();

//        how to get the $slider_data->slider_text to explode to array, then print out again
        if ($slider_data->count()   >   0){
            foreach ($slider_data   as  $sd){
                $text   =   explode(",", $sd->slider_text);
            }
        }


        $service_data       =   Service::find(1);
        $quote_data         =   Quote::find(1);
        $about_data         =   About::find(1);
        $contact_data       =   Contact::find(1);

        $product_data      =   Product::all();
        $product_array     =   [];
        if ($product_data->count() >   0){
            foreach($product_data  as  $nd){
                $gallery        =   ProductImage::where('product_id','=',$nd->product_id)->limit(1)->get();
                $product_array[]       =   [
                    'product_id'       =>   $nd->product_id,
                    'product_name'       =>   $nd->product_name,
                    'product_model'       =>   $nd->product_model,
                    'product_desc'       =>   $nd->product_desc,
                    'product_pdf'       =>   $nd->product_pdf,
                    'product_type'       =>   $nd->product_type,
                    'updated_at'       =>   $nd->updated_at,
                    'gallery'       =>  $gallery,
                ];
            }
        }

        return view('frontend.index.index',compact('product_array'
                                                    ,'slider_data'
                                                    ,'slider_desc'
                                                    ,'service_data'
                                                    ,'text'
                                                    ,'contact_data'
                                                    ,'about_data'
                                                    ,'quote_data'
                                                    ,'slider_images'));
    }

//    public function contact_form(ClientContact $request){
//
//        $data = [
//            'subject'   =>      "Website-Contact Us Form",
//            'name'      =>      Input::get('name'),
//            'email'     =>      Input::get('email'),
//            'message'   =>      Input::get('message')
//
//        ];
//
//        $contact_email  =   Contact::find(1);
//
//        Mail::send('email.notification', ['data' => $data], function ($message) use ($data) {
//
//            $message->from($data['email'], 'GREENERGY LED');//gimconsultancy12@gmail.com
//            $message->to('greenergy@gmail.com', $data['message'])->subject('Website-Contact Us Form');
//
//        });
//
//        return redirect('/contact')->with('success', 'Message sent successfully');
//
//    }

    //  ================    NEWS    ================

    public function news_index(){

        $news_data      =   News::paginate(5);//10 is example 10 per page
        $news_array     =   [];
        if ($news_data->count() >   0){
            foreach($news_data  as  $nd){
                $gallery        =   NewsImage::where('news_id','=',$nd->news_id)->limit(3)->get();
                $news_array[]       =   [
                    'news_id'       =>   $nd->news_id,
                    'news_name'       =>   $nd->news_name,
                    'news_desc'       =>   $nd->news_desc,
                    'updated_at'       =>   $nd->updated_at,
                    'gallery'       =>  $gallery,
                ];
            }
        }

        return view('frontend.news.news-list',compact('news_data','news_array'));
    }

    public function news_page($id   =   NULL){

        if (News::verify_news($id)){
            $news_data          =   News::find($id);


            $news_images        =   NewsImage::where('news_id','=',$id)->get();


            return  view('frontend.news.news-page',compact('news_data','news_images'));
        }else{
            return redirect('/news');
        }


    }

    //  ================    CASESTUDY    ================

    public function case_index(){

        $case_data      =   CaseStudy::paginate(5);//10 is example 10 per page



        return view('frontend.casestudy.casestudy-list',compact('case_data'));
    }

    public function case_page($id   =   NULL){

        if (CaseStudy::verify_case($id)){
            $case_data          =   CaseStudy::find($id);

            return  view('frontend.casestudy.casestudy-page',compact('case_data'));
        }else{
            return redirect('/casestudy');
        }


    }

    public function case_pdf_download($id   =   NULL){

        if (auth('user')->check()){


            if (CaseStudy::verify_case($id)){

                //update the download number here
                // verify the id
                $user_data              =   User::find(auth('user')->user()->user_id);

                $user_download          =   $user_data->downloads;

                $update                 =   User::find(auth('user')->user()->user_id);
                $update->downloads      =   $user_download  +   1;
                $update->save();


                $case_detail		= CaseStudy::find($id);

                return redirect($case_detail->case_pdf);
            }else{
                return redirect('/casestudy/'.$id);
            }



        }else{

            return  redirect('frontend.login.login')->with('fail','Please login before you proceed to download.');
        }


    }

    //  ================    PRODUCT    ================

    public function product_index(){

        $product_data      =   Product::all();//10 is example 10 per page
        $array     =   [];
        if ($product_data->count() >   0){
            foreach($product_data  as  $nd){
                $gallery        =   ProductImage::where('product_id','=',$nd->product_id)->limit(1)->get();
                $array[]       =   [
                    'product_id'       =>   $nd->product_id,
                    'product_name'       =>   $nd->product_name,
                    'product_model'       =>   $nd->product_model,
                    'product_desc'       =>   $nd->product_desc,
                    'product_pdf'       =>   $nd->product_pdf,
                    'product_type'       =>   $nd->product_type,
                    'updated_at'       =>   $nd->updated_at,
                    'gallery'       =>  $gallery,
                ];
            }
        }




        return view('frontend.product.product-list',compact('product_data','array'));
    }

    public function product_page($id    =   NULL){

        if (Product::verify_product($id)){
            $product_data          =   Product::find($id);

            $product_brand         =    Brand::find($product_data->product_brand);

            $product_image        =   ProductImage::where('product_id','=',$id)->get();


            return  view('frontend.product.product-page',compact('product_data','product_image','product_brand'));

        }else{

            return redirect('/product');

        }


    }

    public function product_pdf_download($id   =   NULL){

        if (auth('user')->check()){


            if (Product::verify_product($id)){

                //update the download number here
                // verify the id
                $user_data              =   User::find(auth('user')->user()->user_id);

                $user_download          =   $user_data->downloads;

                $update                 =   User::find(auth('user')->user()->user_id);
                $update->downloads      =   $user_download  +   1;
                $update->save();


                $product_detail		= Product::find($id);

                return redirect($product_detail->product_pdf);


            }else{
                return redirect('/product/'.$id);
            }

        }else{
            return  redirect('frontend.login.login')->with('fail','Please login before you proceed to download.');
        }


    }

    //  ================    CONTACT    ================
    public function contact_form(Requests\Contact $request){
        $secretKey  =   "6Lc-fhYUAAAAAB655VdSJgPlmAum6PS0nnwpji2g";//your secret key
        $ip         =   request()->ip();
        $captcha    =   $request->input('g-recaptcha-response');//here
        $response   =   file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
            //fail
            return redirect('/')->with('fail','Please complete the captcha.');
        }else{
            //success
            $data               =   [];
            $data['name']      =   $request->input('name');
            $data['email']      =   $request->input('email');
            $data['message']      =   $request->input('message');
            $data['subject']      =   "Greenergy LED Message";

            Mail::send('email.notification', ['data' => $data], function ($m) use ($data) {
                $m->from($data['email'], 'Greenergy LED');

                $m->to('info@greenergy-led.com')->subject('Greenergy LED Message');
            });

            return redirect('/')->with('success','Your message has been sent.');

        }


    }

}
