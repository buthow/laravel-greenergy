<?php

namespace App\Http\Controllers;

use App\About;
use App\Admin;
use App\Brand;
use App\CaseStudy;
use App\Contact;
use App\Http\Requests;

use App\News;
use App\NewsImage;
use App\Product;
use App\ProductImage;
use App\Quote;
use App\Service;
use App\Slider;
use App\SliderImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules\In;


class BackEndController extends Controller
{
    //    ==================== INDEX ====================

    public function index(){

        if(Auth::guard('admin')->check()){

            $active = "";

            $total_user     =   User::count() + Admin::count();

            $total_products =   Product::count();


            $user_dl =   User::sum('downloads');

            return view('backend.home.index',compact('active','total_user','user_dl','total_products'));

        }else{

            return redirect('/admin/login')->with('fail','invalid action');

        }
    }

    //    ==================== ABOUT ====================

    public function about_add_form(){

        if (Auth::guard('admin')->check()) {


            $active =   'home';

            $data   =   About::find(1);

            $id     =   1;

            return view('backend.home.about_settings', compact('active','data','id'));

        } else {

            return redirect('/admin/login')->with('Invalid action');

        }

    }

    public function about_add(Requests\AdminAbout $request){

        if(Auth::guard('admin')->check()){

            $extension                  =   $request->file('about-image')->getClientOriginalExtension();
            $file_name                  =   '/images/about/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
            $destination_path           =   base_path() . '/images/about';
            $uploadSuccess              =   $request->file('about-image')->move($destination_path, $file_name);



            if ($uploadSuccess){
                $insert                         =   new About();
                $insert->about_desc             =   Input::get('about-description');
                $insert->about_img              =   $file_name;
                $insert->save();

                return redirect('/admin/about')->with('success','Upload Success.');
            }else{
                return redirect('/admin/about')->with('fail','Upload failed.');
            }

        }else{

            return redirect('/admin/login')->with('Invalid action');

        }


    }

    public function about_edit_form($id  =   NULL){

        if (Auth::guard('admin')->check()) {

            $active     = "home";

            if(About::verify_about(1) ==  true){



                $data       =   About::find(1);

                $id         =   About::count();


                return view('backend.home.about_settings', compact('active','data','id'));

            }else{

                return view('backend.home.about_settings', compact('active','data','id'));
            }

        } else {

            return redirect('/admin/login')->with('invalid action');

        }

    }

    public function about_edit(Requests\AdminAbout $request, $id  =   NULL){

        if (Auth::guard('admin')->check()) {

            if(About::verify_about(1)){

                $update                         =    About::find(1);

                if($request->file('about-image')   != ""){

                    $extension                  =   $request->file('about-image')->getClientOriginalExtension();
                    $file_name                  =   '/images/about/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                    $destination_path           =   base_path() . '/images/about';
                    $uploadSuccess              =   $request->file('about-image')->move($destination_path, $file_name);


                    if($uploadSuccess){

                        $update->about_img   =   $file_name;


                    }

                }



                $update->about_desc             =   Input::get('about-description');
                $update->save();

                return  redirect('/admin/about')->with('success','Updated Successfully');

            }else{

                $extension                  =   $request->file('about-image')->getClientOriginalExtension();
                $file_name                  =   '/images/about/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                $destination_path           =   base_path() . '/images/about';
                $uploadSuccess              =   $request->file('about-image')->move($destination_path, $file_name);



                if ($uploadSuccess){
                    $insert                         =   new About();
                    $insert->about_desc             =   Input::get('about-description');
                    $insert->about_img              =   $file_name;
                    $insert->save();

                    return redirect('/admin/about')->with('success','Upload Success.');
                }

            }

        } else {

            return redirect('/admin/login')->with('fail','Invalid action');

        }

    }

    //    ==================== QUOTE ====================

    public function quote_edit_form($id  =   NULL){

        if (Auth::guard('admin')->check()) {

            $active     = "home";

            $id         =   Quote::count();

            $data       =   "";

            if(Quote::verify_quote(1) ==  true){
                $data       =   Quote::find($id);
            }else{
                return view('backend.home.quote_settings', compact('active','id','data'));
            }

            return view('backend.home.quote_settings', compact('active','id','data'));

       } else {

           return redirect('/admin/login')->with('Invalid action');

        }


    }

    public function quote_edit(Requests\AdminQuote $request, $id  =   NULL)
    {

      if (Auth::guard('admin')->check()) {

            if(Quote::verify_quote(1)){

                $update                         =    Quote::find(1);

                if($request->file('quote-image')   != ""){

                    $extension                  =   $request->file('quote-image')->getClientOriginalExtension();
                    $file_name                  =   '/images/quote/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                    $destination_path           =   base_path() . '/images/quote';
                    $uploadSuccess              =   $request->file('quote-image')->move($destination_path, $file_name);

                    if($uploadSuccess){

                        $update->quote_img   =   $file_name;

                    }
                }

                $update->quote_name             =   Input::get('name');
                $update->quote_pos             =   Input::get('quote-position');
                $update->quote_desc             =   Input::get('quote-description');
                $update->save();

            return  redirect('/admin/quote')->with('success','Updated Successfully');

            }else{

                $extension                  =   $request->file('quote-image')->getClientOriginalExtension();
                $file_name                  =   '/images/quote/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                $destination_path           =   base_path() . '/images/quote';
                $uploadSuccess              =   $request->file('quote-image')->move($destination_path, $file_name);

                if ($uploadSuccess){
                    $insert                         =   new Quote();
                    $insert->quote_name             =   Input::get('name');
                    $insert->quote_pos              =   Input::get('quote-position');
                    $insert->quote_desc             =   Input::get('quote-description');
                    $insert->quote_img              =   $file_name;
                    $insert->save();

                    return redirect('/admin/quote')->with('success','Upload Success.');
                }


                return  redirect('/admin')->with('fail','Invalid id');
            }

        } else {

            return redirect('/admin/login')->with('fail','Invalid action');

        }

    }



    //    ==================== SLIDER ====================

    public function slider_edit_form($id    =   NULL){



        if (auth('admin')->check()){

            $active     =   "home";
                if(Slider::verify_slider(1)){
                    $data       =   Slider::first();

                    $id         =   Slider::first()->slider_id;

                }else{

                    return  view('backend.home.slider_settings', compact('active','data','id'));
                }


            return  view('backend.home.slider_settings', compact('active','data','id'));


        }else{

            return redirect('/admin/login')->with('Invalid action');

        }

    }

    public function slider_edit(Requests\AdminSlider $request, $id  =   NULL){
        if (auth('admin')->check()){

               if (Slider::verify_slider(1)){

                   $update                          =   Slider::find(1);
                   $update->slider_text            =   Input::get('points');
                   $update->slider_desc            =   Input::get('slider-description');
                   $update->save();

                   return  redirect('/admin/slider')->with('success','Updated Successfully');

               }else{

                   $insert                         =   new Slider();
                   $insert->slider_text            =   Input::get('points');
                   $insert->slider_desc            =   Input::get('slider-description');

                   $insert->save();

                   return  redirect('/admin/slider')->with('success','Uploaded Successfully');

                }

           }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function slider_image_list(){
        $message    =   [];
        if (auth('admin')->check()){

            $slider_image       =   SliderImage::orderBy('created_at','ASC')->get();

           $message   =   [
                'error_code'        =>  200,
                'data'              =>  $slider_image
            ];
        }else{
            $message   =   [
                'error_code'        =>  401,
            ];
        }

        return $message;
    }

    public function slider_image_delete(Request $request){

        $image_name     =   $request->input('image');

        $count      =   SliderImage::where('slider_img','=',$image_name)->count();

        $message    =   [];

        if ($count  ==  1){
            if(is_file(base_path().$image_name)){
                unlink(base_path().$image_name);
            }
            SliderImage::where('slider_img','=',$image_name)->delete();
            $message        =   [
                'error_code'    =>   200,
                'message'       =>  'Successfully removed image'
            ];
        }else{
            $message        =   [
                'error_code'    =>   404,
                'message'       =>  'problem'.$image_name
            ];
        }

        return $message;
    }

    public function slider_image_upload(Requests\AdminSliderImage $request, $id =   NULL){

        $extension                  =   Input::file('file')->getClientOriginalExtension();
        $file_name                  =   '/images/slider/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
        $destination_path           =   base_path() . '/images/slider';
        $uploadSuccess              =   Input::file('file')->move($destination_path, $file_name);


        if ($uploadSuccess){
            $insert                         =   new SliderImage();
            $insert->slider_id              =   1;
            $insert->slider_img             =   $file_name;
            $insert->save();

            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }

    //    ==================== SERVICE ====================

    public function service_edit_form($id    =   NULL){

        if (auth('admin')->check()){
            $active     =   "home";



            if(Service::verify_service(1)){

                $data       =   Service::first();

                $id         =   Service::first()->service_id;



                return  view('backend.home.service_settings', compact('active','data','id'));
            }else{

                return  view('backend.home.service_settings', compact('active','data','id'));
            }


        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function service_edit(Requests\AdminService $request, $id  =   NULL){
        if (auth('admin')->check()){

            if(Service::verify_service(1)){

                $update                         =    Service::first();

                if($request->file('service-image')   != ""){

                    $extension                  =   $request->file('service-image')->getClientOriginalExtension();
                    $file_name                  =   '/images/service/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                    $destination_path           =   base_path() . '/images/service';
                    $uploadSuccess              =   $request->file('service-image')->move($destination_path, $file_name);

                    if($uploadSuccess){

                        $update->service_img   =   $file_name;

                    }
                }

                $update->service_desc             =   Input::get('service-description');
                $update->service_strat1           =   Input::get('service-strat1');
                $update->service_strat2           =   Input::get('service-strat2');
                $update->service_strat3           =   Input::get('service-strat3');
                $update->service_strat4           =   Input::get('service-strat4');
                $update->save();

                return  redirect('/admin/service')->with('success','Updated Successfully');

            }else{


                $extension                  =   $request->file('service-image')->getClientOriginalExtension();
                $file_name                  =   '/images/service/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                $destination_path           =   base_path() . '/images/service';
                $uploadSuccess              =   $request->file('service-image')->move($destination_path, $file_name);

                if ($uploadSuccess){
                    $insert                           =   new Service();
                    $insert->service_desc             =   Input::get('service-description');
                    $insert->service_img              =   $file_name;
                    $insert->service_strat1           =   Input::get('service-strat1');
                    $insert->service_strat2           =   Input::get('service-strat2');
                    $insert->service_strat3           =   Input::get('service-strat3');
                    $insert->service_strat4           =   Input::get('service-strat4');

                    $insert->save();

                    return redirect('/admin/service')->with('success','Upload Success.');
                }




            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    //    ==================== CONTACT ====================

    public function contact_edit_form($id    =   NULL){

        if (auth('admin')->check()){
            $active     =   "home";

            if(Contact::verify_contact(1)){

                $data       =   Contact::first();

                $id         =   Contact::first()->contact_id;

                return  view('backend.home.contact_settings', compact('active','data','id'));
            }else{

                return  view('backend.home.contact_settings', compact('active'));
            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function contact_edit(Requests\AdminContact $request, $id  =   NULL){
        if (auth('admin')->check()){


            if (Contact::verify_contact(1)){


                    $update                           =   Contact::first();
                    $update->company_location          =   Input::get('company-address');
                    $update->factory_location          =   Input::get('factory-address');
                    $update->email                    =   Input::get('contact-email');
                    $update->telephone                =   Input::get('contact-number');
                    $update->save();

                    return  redirect('/admin/contact')->with('success','Updated Successfully');

            }else{


                $insert                           =   new Contact();
                $insert->company_location         =   Input::get('company-address');
                $insert->factory_location          =   Input::get('factory-address');
                $insert->email                    =   Input::get('contact-email');
                $insert->telephone                =   Input::get('contact-number');
                $insert->save();

                return  redirect('/admin/contact')->with('success','Uploaded Successfully');

            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }


    //    ==================== USER ====================

    public function user_index(){
        if (auth('admin')->check()) {


            $active = "user";

            $user = User::all();
            $admin  =   Admin::all();

            $user_list  =   [];

            if ($admin->count() >   0){
                foreach ($admin as  $a){
                    $user_list[]    =   [
                        'user_id'   =>  $a->admin_id,
                        'username'  =>  $a->username,
                        'type'      =>  'admin'
                    ];
                }
            }

            if ($user->count() >   0){
                foreach ($user as  $u){
                    $user_list[]    =   [
                        'user_id'   =>  $u->user_id,
                        'username'  =>  $u->username,
                        'type'      =>  'user'
                    ];
                }
            }
            return view('backend.user.user_list', compact('active', 'user_list'));

        } else {

            return redirect('/admin/login')->with('invalid action');

        }
    }

    public function user_add(){
        if (Auth::guard('admin')->check()) {

            $active =   'user';

            return view('backend.user.user_settings', compact('active'));

        } else {

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function user_store(Requests\AdminUser $request){
        if(auth('admin')->check()){

            if (Input::get('user-type') == 'user'){
                $insert                         =   new User();
                $insert->username               =   Input::get('username');
                $insert->password               =   Hash::make(Input::get('password'));
                $insert->downloads              =   0;
                $insert->save();

            }else{
                $insert                         =   new Admin();
                $insert->username               =   Input::get('username');
                $insert->password               =   Hash::make(Input::get('password'));
                $insert->save();
            }


            return redirect('/admin/user/list')->with('success','Successfully Registered.');

        }else{

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function user_edit_form(Request $request, $id    =   NULL){

        if (auth('admin')->check()){

            $type       =   $request->input('type');

            switch ($type){
                case "admin":
                    if(Admin::verify_admin($id) == true ){
                        $active     =   "user";

                        $data       =   Admin::find($id);
                    }
                    break;
                case "user":
                    if(User::verify_user($id) == true ){
                        $active     =   "user";

                        $data       =   User::find($id);
                    }
                    break;
                default:
                    abort(403);
                    break;
            }

            return  view('backend.user.user_settings', compact('active','data','id','type'));
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function user_edit(Requests\AdminUser $request, $id  =   NULL){
        if (auth('admin')->check()){

            $type       =   Input::get('user-type');

            switch ($type){
                case "admin":
                    if(Admin::verify_admin($id) == true ){

                        $update                             =   Admin::find($id);
                        $update->username                   =   Input::get('username');

                        if (!empty(Input::get('password'))){
                            $update->password                   =   Input::get('password');
                        }

                        $update->save();
                    }
                    break;
                case "user":
                    if(User::verify_user($id) == true ){
                        $update                             =   User::find($id);
                        $update->username                   =   Input::get('username');

                        if (!empty(Input::get('password'))){
                            $update->password                   =   Input::get('password');
                        }

                        $update->save();

                    }
                    break;
                default:
                    abort(403);
                    break;
            }

            return  redirect('/admin/user/list')->with('success','Updated Successfully');

        }else{
            return  redirect('/admin/user/list')->with('fail','Invalid id');
        }
    }

    public  function user_destroy(Request $request, $id   =   NULL){

        if (auth('admin')->check()) {

            $type       =   $request->input('type');


            switch ($type){
                case "admin":
                    if(Admin::verify_admin($id) == true ){

                        Admin::where('admin_id','=',$id)->delete();

                        return  redirect('/admin/user/list')->with('success','Deleted Successfully');
                    } else {

                        return redirect('/admin/user/list')->with('fail', 'Invalid ID.');

                    }
                    break;
                case "user":
                    if(User::verify_user($id) == true ){

                        User::where('user_id','=',$id)->delete();

                    }else {

                        return redirect('/admin/user/list')->with('fail', 'Invalid ID.');

                    }
                    break;
                default:
                    abort(403);
                    break;
            }

            return redirect('/admin/user/list')->with('success', 'Deleted Successfully');


        } else{
            return redirect('/admin/login')->with('Invalid action');
        }


    }


    //  ==================== NEWS ====================

    public function news_index(){
        if (auth('admin')->check()) {


            $active = "news";

            $news_list = News::all();

            return view('backend.news.news_list', compact('active', 'news_list'));

        } else {

            return redirect('/admin/login')->with('invalid action');

        }
    }

    public function news_add(){

        if (auth('admin')->check()){

            $active =   'news';

            return  view('backend.news.news_settings', compact('active'));
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function news_store(Requests\AdminNews $request){


        if (auth('admin')->check()){

            $insert                 =   new News();
            $insert->news_name      =   Input::get('news-name');
            $insert->news_desc      =   Input::get('descr');
            $insert->save();

            return redirect('/admin/news/list')->with('success','Successfully uploaded');

        }else{

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function news_edit(Request $request, $id   =   null){
        if (auth('admin')->check()) {

            if (News::verify_news($id) == true) {
                $active = "news";

                $data = News::find($id);

                $id     =   $data->news_id;

                return  view('backend.news.news_settings', compact('active','data','id'));

            }else{
                return  redirect('/admin/news/list')->with('fail','Invalid id');
            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function news_update(Requests\AdminNews $request, $id     =   null){

        if (auth('admin')->check()){

            if(News::verify_news($id) == true ){

                $update                 =   News::find($id);
                $update->news_name      =   Input::get('news-name');
                $update->news_desc      =   Input::get('descr');
                $update->save();

                return redirect('/admin/news/list')->with('success','Successfully updated');
            }else{
                return redirect('/admin/news/list')->with('fail','Invalid id.');
            }
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function news_destroy($id    =   NULL){
        if (auth('admin')->check()) {

            if (News::verify_news($id)) {

                News::where('news_id', '=', $id)->delete();

                //get all image first
                $gallery        =   NewsImage::where('news_id','=',$id)->get();
                if ($gallery->count()   >   0){
                    foreach ($gallery   as  $g){
                        if(is_file(base_path().$g->news_img)){
                            unlink(base_path().$g->news_img);
                        }
                    }
                }
                NewsImage::where('news_id','=',$id)->delete();

                return redirect('/admin/news/list')->with('success', 'Deleted Successfully');

            } else {

                return redirect('/admin/news/list')->with('fail', 'Invalid ID.');

            }

        } else{

            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function news_image_list(Request $request){
        $message    =   [];

        $news_id     =   $request->input('id');

        if (auth('admin')->check()){

            $news_image       =   NewsImage::where('news_id','=',$news_id)->orderBy('created_at','ASC')->get();

            $message   =   [
                'error_code'        =>  200,
                'data'              =>  $news_image,

            ];
        }else{
            $message   =   [
            'error_code'        =>  401,
            ];
        }

        return $message;
    }

    public function news_image_upload(Requests\AdminNewsImage $request, $id =   NULL){


        $extension                  =   Input::file('file')->getClientOriginalExtension();
        $file_name                  =   '/images/news/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
        $destination_path           =   base_path() . '/images/news';
        $uploadSuccess              =   Input::file('file')->move($destination_path, $file_name);


        if ($uploadSuccess){

            $insert                       =   new NewsImage();
            $insert->news_id              =   $id;
            $insert->news_img             =   $file_name;
            $insert->save();

            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }

    public function news_image_delete(Request $request,$id  =   null){

        $image_name     =   $request->input('image');

        $count      =   NewsImage::where('news_img','=',$image_name)->where('news_id','=',$id)->count();

        $message    =   [];

        if ($count  ==  1){
            if(is_file(base_path().$image_name)){
                unlink(base_path().$image_name);
            }
            NewsImage::where('news_img','=',$image_name)->where('news_id','=',$id)->delete();
            $message        =   [
                'error_code'    =>   200,
                'message'       =>  'Successfully deleted'
            ];
        }else{
            $message        =   [
                'error_code'    =>   404,
                'message'       =>  'Problem is '.$image_name
            ];
        }

        return $message;
    }


    //  ==================== CASESTUDY ====================

    public function case_index(){
        if (auth('admin')->check()) {


            $active = "case";

            $case_list = CaseStudy::all();

            return view('backend.casestudy.casestudy_list', compact('active', 'case_list'));

        } else {

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function case_add(){

        if (auth('admin')->check()){

            $active =   'case';

            return  view('backend.casestudy.casestudy_settings', compact('active'));
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function case_store(Requests\AdminCaseStudy $request){

        if (auth('admin')->check()){

            if ($request->file('case-pdf') != ""){

                $extension                  =   $request->file('case-image')->getClientOriginalExtension();
                $file_name                  =   '/images/casestudy/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                $destination_path           =   base_path() . '/images/casestudy';
                $uploadSuccess              =   $request->file('case-image')->move($destination_path, $file_name);

                $extension1                  =   $request->file('case-pdf')->getClientOriginalExtension();
                $file_name1                  =   '/pdf/casestudy/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension1;
                $destination_path1           =   base_path() . '/pdf/casestudy';
                $uploadSuccess1              =   $request->file('case-pdf')->move($destination_path1, $file_name1);

                if ($uploadSuccess && $uploadSuccess1) {
                    $insert = new CaseStudy();
                    $insert->case_name = Input::get('case-name');
                    $insert->case_img = $file_name;
                    $insert->case_desc = Input::get('descr');
                    $insert->case_pdf = $file_name1;
                    $insert->save();

                    return redirect('/admin/case/list')->with('success', 'Upload Success');
                }
            }else{
                $extension                  =   $request->file('case-image')->getClientOriginalExtension();
                $file_name                  =   '/images/casestudy/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                $destination_path           =   base_path() . '/images/casestudy';
                $uploadSuccess              =   $request->file('case-image')->move($destination_path, $file_name);


                if ($uploadSuccess) {
                    $insert = new CaseStudy();
                    $insert->case_name = Input::get('case-name');
                    $insert->case_img = $file_name;
                    $insert->case_desc = Input::get('descr');
                    $insert->save();
                    return redirect('/admin/case/list')->with('success', 'Upload Success');
                }
            }
        }else{

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function case_edit(Request $request, $id   =   null){

        if (auth('admin')->check()) {

            if (CaseStudy::verify_case($id) == true) {
                $active = "case";

                $data = CaseStudy::find($id);

                $id     =   $data->case_id;

                return  view('backend.casestudy.casestudy_settings', compact('active','data','id'));

            }else{
                return  redirect('/admin/case/list')->with('fail','Invalid id');
            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function case_update(Requests\AdminCaseStudy $request, $id     =   null){
        if (auth('admin')->check()){

            if(CaseStudy::verify_case($id) == true ){

                $update             =   CaseStudy::find($id);

                if($request->file('case-image')   != ""){

                    $extension                  =   $request->file('case-image')->getClientOriginalExtension();
                    $file_name                  =   '/images/casestudy/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                    $destination_path           =   base_path() . '/images/casestudy';
                    $uploadSuccess              =   $request->file('case-image')->move($destination_path, $file_name);

                    if($uploadSuccess){

                        $update->case_img   =   $file_name;


                    }

                }
                if($request->file('case-pdf')   != ""){

                    $extension1                  =   $request->file('case-pdf')->getClientOriginalExtension();
                    $file_name1                  =   '/pdf/casestudy/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension1;
                    $destination_path1           =   base_path() . '/pdf/casestudy';
                    $uploadSuccess1              =   $request->file('case-pdf')->move($destination_path1, $file_name1);

                    if($uploadSuccess1){
                        $update->case_pdf   =   $file_name1;
                    }

                }

                $update->case_name = Input::get('case-name');
                $update->case_desc = Input::get('descr');
                $update->save();

                return redirect('/admin/case/list')->with('success','Successfully updated');
            }else{
                return redirect('/admin/case/list')->with('fail','Invalid id.');
            }
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function case_destroy($id    =   NULL){

        if (auth('admin')->check()){
            if (CaseStudy::verify_case($id)){
                $data = CaseStudy::find($id);

                if ($data->count()   >   0){
                    unlink(base_path().$data->case_img);
                    unlink(base_path().$data->case_pdf);
                }
                CaseStudy::where('case_id','=',$id)->delete();

                return redirect('/admin/case/list')->with('success', 'Deleted Successfully');
            }else{
                return redirect('/admin/case/list')->with('fail', 'Invalid ID.');
            }
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    //  ==================== BRAND ====================

    public function brand_index(){
        if (auth('admin')->check()) {

            $active = "brand";

            $brand_list = Brand::all();

            return view('backend.brand.brand_list', compact('active', 'brand_list'));

        } else {

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function brand_add(){

        if (auth('admin')->check()){

            $active =   'brand';

            $id =   null;

            return  view('backend.brand.brand_settings', compact('active','id'));
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function brand_store(Requests\AdminBrand $request){


        if (auth('admin')->check()){

            $insert = new Brand();
            $insert->brand_name = Input::get('brand-name');
            $insert->save();

            return redirect('/admin/brand/list')->with('success', 'Upload Success');

        }else{

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function brand_edit($id  =   NULL){

        if (auth('admin')->check()) {

            if (Brand::verify_brand($id) == true) {
                $active = "brand";

                $data = Brand::find($id);

                $id     =   $data->brand_id;

                return  view('backend.brand.brand_settings', compact('active','data','id'));

            }else{
                return  redirect('/admin/brand/list')->with('fail','Invalid id');
            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function brand_update(Requests\AdminBrand $request, $id  =   null){

        if (auth('admin')->check()){


            if(Brand::verify_brand($id) == true ){

                $update             =   Brand::find($id);


                $update->brand_name = Input::get('brand-name');

                $update->save();

                return redirect('/admin/brand/list')->with('success','Successfully updated');
            }else{
                return redirect('/admin/brand/list')->with('fail','Invalid id.');
            }


        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function brand_destroy($id   = null){

        if (auth('admin')->check()){
            if (Brand::verify_brand($id)){


                Brand::where('brand_id','=',$id)->delete();

                return redirect('/admin/brand/list')->with('success', 'Deleted Successfully');
            }else{
                return redirect('/admin/brand/list')->with('fail', 'Invalid ID.');
            }
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }


    //  ==================== PRODUCT ====================

    public function product_index(){
        if (auth('admin')->check()) {

            $active = "product";

            $product_list = Product::join('brand','product.product_brand','=','brand.brand_id')->get();


            return view('backend.product.product_list', compact('active', 'product_list'));

        } else {

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function product_add(){

        if (auth('admin')->check()){

            $active =   'product';

            $brand_list =   Brand::all();

            return  view('backend.product.product_settings', compact('active','brand_list'));
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function product_store(Requests\AdminProduct $request){
        if (auth('admin')->check()){

            if ($request->file('product-pdf') != ""){
                $extension                  =   $request->file('product-pdf')->getClientOriginalExtension();
                $file_name                  =   '/pdf/product/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                $destination_path           =   base_path() . '/pdf/product';
                $uploadSuccess              =   $request->file('product-pdf')->move($destination_path, $file_name);

                if ($uploadSuccess) {
                    $insert                               = new Product();
                    $insert->product_name                 = Input::get('product-name');
                    $insert->product_brand                = Input::get('brand-name');
                    $insert->product_model                = Input::get('model-name');
                    $insert->product_desc                 = Input::get('product-descr');
                    $insert->product_pdf                  = $file_name;
                    $insert->product_type                 = Input::get('product-type');
                    $insert->save();
                }

            }else{

                $insert                               = new Product();
                $insert->product_name                 = Input::get('product-name');
                $insert->product_brand                = Input::get('brand-name');
                $insert->product_model                = Input::get('model-name');
                $insert->product_desc                 = Input::get('product-descr');
                $insert->product_type                 = Input::get('product-type');
                $insert->save();

            }

            return redirect('/admin/product/list')->with('success', 'Upload Success');

        }else{

            return redirect('/admin/login')->with('Invalid action');

        }
    }

    public function product_edit($id    =   NULL){

        if (auth('admin')->check()) {

            if (Product::verify_product($id) == true) {

                $active         = "product";

                $data           = Product::find($id);

                $brand_list =   Brand::all();

                $id             =   $data->product_id;

                return  view('backend.product.product_settings', compact('active','data','id','brand_list'));

            }else{
                return  redirect('/admin/product/list')->with('fail','Invalid id');
            }

        }else{
            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function product_update(Requests\AdminProduct  $request, $id     =   null){
        if (auth('admin')->check()){

            if(Product::verify_product($id) == true ){

                $update             =   Product::find($id);

                if($request->file('product-pdf')   != ""){

                    $extension                  =   $request->file('product-pdf')->getClientOriginalExtension();
                    $file_name                 =   '/pdf/product/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
                    $destination_path          =   base_path() . '/pdf/product';
                    $uploadSuccess              =   $request->file('product-pdf')->move($destination_path, $file_name);

                    if($uploadSuccess){
                        $update->product_pdf   =   $file_name;
                    }

                }

                $update->product_name                 = Input::get('product-name');
                $update->product_brand                = Input::get('brand-name');
                $update->product_model                = Input::get('model-name');
                $update->product_desc                 = Input::get('product-descr');
                $update->product_type                 = Input::get('product-type');
                $update->save();

                return redirect('/admin/product/list')->with('success','Successfully updated');
            }else{
                return redirect('/admin/product/list')->with('fail','Invalid id.');
            }
        }else{
            return redirect('/admin/login')->with('Invalid action');
        }

    }

    public function product_destroy($id =   NULL){
        if (auth('admin')->check()) {

            if (Product::verify_product($id)) {

                $product_pdf = Product::find($id);


                if(is_file(base_path().$product_pdf->product_pdf)){
                    unlink(base_path().$product_pdf->product_pdf);
                }


                Product::where('product_id', '=', $id)->delete();

                //get all image first
                $gallery        =   ProductImage::where('product_id','=',$id)->get();
                if ($gallery->count()   >   0){
                    foreach ($gallery   as  $g){
                        if(is_file(base_path().$g->product_img)){
                            unlink(base_path().$g->product_img);
                        }
                    }
                }
                ProductImage::where('product_id','=',$id)->delete();

                return redirect('/admin/product/list')->with('success', 'Deleted Successfully');

            } else {

                return redirect('/admin/news/list')->with('fail', 'Invalid ID.');

            }

        } else{

            return redirect('/admin/login')->with('Invalid action');
        }
    }

    public function product_image_list(Request $request){
        $message    =   [];

        $product_id     =   $request->input('id');

        if (auth('admin')->check()){

            $product_image       =   ProductImage::where('product_id','=',$product_id)->orderBy('created_at','ASC')->get();

            $message   =   [
                'error_code'        =>  200,
                'data'              =>  $product_image,

            ];
        }else{
            $message   =   [
                'error_code'        =>  401,
            ];
        }

        return $message;
    }

    public function product_image_upload(Requests\AdminNewsImage $request, $id =   NULL){


        $extension                  =   Input::file('file')->getClientOriginalExtension();
        $file_name                  =   '/images/product/' . time() . rand(0, 9999999) . rand(1, 9999) . '.' . $extension;
        $destination_path           =   base_path() . '/images/product';
        $uploadSuccess              =   Input::file('file')->move($destination_path, $file_name);


        if ($uploadSuccess){

            $insert                          =   new ProductImage();
            $insert->product_id              =   $id;
            $insert->product_img             =   $file_name;
            $insert->save();

            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }

    public function product_image_delete(Request $request,$id  =   null){

        $image_name     =   $request->input('image');

        $count      =   ProductImage::where('product_img','=',$image_name)->where('product_id','=',$id)->count();

        $message    =   [];

        if ($count  ==  1){

            ProductImage::where('product_img','=',$image_name)->where('product_id','=',$id)->delete();
            if(is_file(base_path().$image_name)){
                unlink(base_path().$image_name);
            }
            $message        =   [
                'error_code'    =>   200,
                'message'       =>  'Successfully deleted'
            ];
        }else{
            $message        =   [
                'error_code'    =>   404,
                'message'       =>  'Problem is '.$image_name
            ];
        }

        return $message;
    }







}
