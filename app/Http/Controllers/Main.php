<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Products;

class Main extends Controller
{
    //  Admin Panel
    public function adminpanel_login(){
        return view('adminpanel.pages.login');
    }
    public function login(Request $req){
        $validateData=$req->validate([
            'email'=>"required|regex:/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/",
            'password'=>"required|regex:/^[a-zA-Z0-9]{3,16}+$/",
            

        ],[
            'email.required'=>'Email is required',
            'email.regex'=>'Invalid Email Address',
            'password.required'=>'Password is required',
            'password.regex'=>'Only alphabets,numbers allowed and password must be atleast 3 characters & maximum 16 characters',

           ]);
           if($validateData){
            $email=$req->email;
            $password=$req->password;
           
            $user=Admin::where(['email'=>$email])->first();
           
            if($user){
            if(Hash::check($password,$user->password)){
               
                $req->session()->put('sid',$user);
                //return back()->with('success','Log In successfull.');
                return redirect('/adminpanel/dashboard');
            }
            else{
                return back()->with('error','Incorrect Password.');
            }
        }
        else{
            return back()->with('error','User does not Exist.');
        }
           


        }
          

    }

    public function adminpanel_register(){
        return view('adminpanel.pages.register');
    }
    public function register(Request $req){
        $validateData=$req->validate([
                    'email'=>"required|regex:/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/",
                    'password'=>"required|regex:/^[a-zA-Z0-9]{3,16}+$/",
                    'uname'=>"required|regex:/^[a-zA-Z0-9 ]+$/",
                    'name'=>"required|regex:/^[a-zA-Z ]+$/",
                    'age'=>"required",
                    'city'=>"required",
                   
                    'image'=>"required|mimes:jpg,jpeg,png"

                ],[
                    'email.required'=>'Email is required',
                    'email.regex'=>'Invalid Email Address',
                    'password.required'=>'Password is required',
                    'password.regex'=>'Only alphabets,numbers allowed and password must be atleast 3 characters & maximum 16 characters',
                    'name.required'=>'Name is required',
                    'name.regex'=>'Only alphabets and white spaces are allowed',
                    'uname.required'=>'Username is required',
                    'uname.regex'=>'Only alphabets digits and white spaces are allowed',
                    'age.required'=>'Age is required',
                    'city.required'=>'City is required',
                    'image.required'=>'Image is required',
                   
                    
                ]);
                if($validateData){
                    $email=$req->email;
                    
                    $image=$req->file('image');
                    
                    $filename="$email-".time().".".$image->getClientOriginalExtension();
           
                    $image->move(public_path('Uploads'),$filename);
                    
                    
                    Admin::insert([
                      
                      'email' =>$req->email,
                      'password'=>Hash::make($req->password),
                      'uname' => $req->uname,
                      'name' => $req->name,
                      'age' => $req->age,
                      'city' => $req->city,
                      'image' => $filename,
                    ]);
                
                  //return back()->with('success','User Registered successfully.');
                  return redirect('/adminpanel/login');
                }
      
    }
    public function dashboard_adminpanel(){
        return view('adminpanel.pages.dashboard');
    }
    public function changepass_adminpanel(){
        return view('adminpanel.pages.changepass');
    }
    public function changepass(Request $req){
        $validateData=$req->validate([
            'old_password'=>"required",
            'password'=>"required",
            'con_password'=>"required",
            
        ],[
            'old_password.required'=>'Old Password is required',
            'con_password.required'=>'Confirm Password is required',
            'password.required'=>'New Password is required',
           
        ]);
        $data = Admin::where('email', $req->id)->first();
        if (Hash::check($req->old_password,$data->password))  {
            if ($req->password == $req->con_password) {
                Admin::where('email', $req->id)->update([
                    'password' => Hash::make($req->con_password),
                ]);
                return back()->with('success', "Password changed");
            } else {
                return back()->with('error', "Confirm password not match");
            }
        } 
        else {
            return back()->with('error', "Old password does not matched");
        }
       
    }
    
    public function edit_adminpanel(){
        
        return view('adminpanel.pages.edit');
    }
    public function update(Request $request){
        $data = Admin::where('email', $request->id)->first();
        if($data){
        Admin::where('email',$request->id)->update([
            'email'=>$request->email,
            'uname'=>$request->uname,
            'name'=>$request->name,
            'age'=>$request->age,
            'city'=>$request->city
        ]);
        session('sid')->email = $request->email;
        session('sid')->uname = $request->uname;
        session('sid')->name = $request->name;
        session('sid')->age = $request->age;
        session('sid')->city = $request->city;
        //$request->session()->put('sid',$data);
        return back()->with('success','Updated Successfully');
        }
        else{
            return back()->with('success','Not Updated Successfully');
        }
    }
    public function feedback_adminpanel(){
        return view('adminpanel.pages.feedback');
    }
    public function feedback(Request $req){
            $validateData=$req->validate([
                'subject'=>"required|min:2|max:20",
                'message'=>"required|min:10|max:500",
                
            ],[
                'subject.required'=>'Subject is required',
                'subject.min'=>'Minimum 2',
                'subject.max'=>'Maximum 20',
                'message.required'=>'Message is required',
                'message.min'=>'Minimum 10',
                'message.max'=>'Maximum 500',
            ]);
            if($validateData){
                
                return back()->with('success',"Thank You For your valuable Feedback.") ;
            }
            else{
                         return back()->with('error',"Error") ;
                         }
        }

        public function logout(){
            session()->forget('sid');
            return redirect("/adminpanel/login");
        }

        public function changeimage_adminpanel(){
            return view('adminpanel.pages.changeimage');
        }
        public function changeimage(Request $req){
            $validateData=$req->validate([
                'image'=>"required|mimes:jpg,jpeg,png",
                
                
            ],[
                'image.required'=>'Image is required',
               
            ]);
            
            $email=$req->id;
            $image=$req->file('image');
                    
            $filename="$email-".time().".".$image->getClientOriginalExtension();
           
            $image->move(public_path('Uploads'),$filename);
                    Admin::where('email', $req->id)->update([
                        'image' => $filename,
                    ]);
                    session('sid')->image = $filename;
                    return back()->with('success', "Image changed");
                    
           
        }

        public function category(){
            $catdata=Category::all();
            return view("adminpanel.pages.category",['catdata'=>$catdata]);
        }
        public function addcategory(){
            return view("adminpanel.pages.addcategory");
        }
        public function postaddcategory(Request $req){
             $validateData=$req->validate(
                 [
                     'name'=>'required|unique:categories',
                     'description'=>'required|min:5|max:200',
                     'image'=>'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG,gif,GIF'
                 ]
             );
             if($validateData){
                $name=$req->name;
                $description=$req->description;
                $image=$req->file('image');
                $dest=public_path('/Uploads');
                $fname="$name-".time().".".$image->extension();
                if($image->move($dest,$fname))
                {
                    $cat=new Category();
                    $cat->name=$name;
                    $cat->description=$description;
                    $cat->image=$fname;
                    if($cat->save()){
                       return redirect("/adminpanel/category");
                    }
                    else {
                        $path=public_path()."Uploads/".$fname;
                        unlink($path);
                        return back()->with('error','Catgegory Not Added');
                    }
                }
                else {
                    return back()->with('error','Uploading Error');
                }
             }
        }
        public function delcategory(Request $req){
            $catdata=Category::where('id',$req->cid)->first();
            $imagePath=public_path().'/Uploads/'.$catdata->image;
            $cat=Category::where('id',$req->cid)->first();
            if($cat->delete()){
                unlink($imagePath);
                return "Category Deleted";
            }
            else{
                return "Category Not Deleted";
            }
        }
        public function editcategory($id)
        {
            $catdata=Category::where('id',$id)->first();
            return view('adminpanel.pages.editcategory',['catdata'=>$catdata]);
        }
        public function updatecategory(Request $req){
            $validateData=$req->validate(
                [
                    'name'=>'required|unique:categories',
                    'description'=>'required|min:5|max:200',
                    'image'=>'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG,gif,GIF'
                ]
            );
            if($validateData){
            $name=$req->name;
            $description=$req->description;
            $image=$req->file('image');
            $dest=public_path('/Uploads');
            $fname="$name-".time().".".$image->extension();
            $image->move($dest,$fname);
            $data = Category::where('id', $req->catid)->first();
            if($data){
            Category::where('id',$req->catid)->update([
            'name'=>$req->name,
            'description'=>$req->description,
            'image'=>$fname,
            
        ]);
        
        return back()->with('success','Updated Successfully');
        }
        else{
            return back()->with('error','Not Updated Successfully');
        }
           
        }
    }

        public function products(){
            $proddata=Products::all();
            return view("adminpanel.pages.products",['proddata'=>$proddata]);
        }
        public function addproducts(){
            $catdata=Category::all();
            return view("adminpanel.pages.addproducts",['catdata'=>$catdata]);
        }
        public function postaddproducts(Request $req){
            $validateData=$req->validate(
                [
                    'category'=>'required',
                    'pname'=>'required|unique:products',
                    'price'=>'required',
                    'quantity'=>'required',
                    'features'=>'required',
                    'image'=>'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG,gif,GIF'
                ]
            );
            if($validateData){
                $category=$req->category;
               $pname=$req->pname;
               $price=$req->price;
               $quantity=$req->quantity;
               $features=$req->features;
               $image=$req->file('image');
               $dest=public_path('/Uploads');
               $fname="$pname-".time().".".$image->extension();
               if($image->move($dest,$fname))
               {
                   $prod=new Products();
                   $prod->pname=$pname;
                   $prod->price=$price;
                   $prod->quantity=$quantity;
                   $prod->features=$features;
                   $prod->image=$fname;
                   $prod->cid=$category;
                   if($prod->save()){
                      return redirect("/adminpanel/products");
                   }
                   else {
                       $path=public_path()."Uploads/".$fname;
                       unlink($path);
                       return back()->with('error','Product Not Added');
                   }
               }
               else {
                   return back()->with('error','Uploading Error');
               }
            }
       }

       public function delproducts(Request $req){
            $proddata=Products::where('id',$req->cid)->first();
            $imagePath=public_path().'/Uploads/'.$proddata->image;
            $prod=Products::where('id',$req->cid)->first();
            if($prod->delete()){
                unlink($imagePath);
                return "Product Deleted";
            }
            else{
                return "Product Not Deleted";
            }
        }

        public function editproducts($id)
        {
            $catdata=Category::all();
            $proddata=Products::where('id',$id)->first();
            return view('adminpanel.pages.editproducts',['proddata'=>$proddata,'catdata'=>$catdata]);
        }
        public function updateproducts(Request $req){
            $validateData=$req->validate(
                [
                    'category'=>'required',
                    'pname'=>'required|unique:products',
                    'price'=>'required',
                    'quantity'=>'required',
                    'features'=>'required',
                    'image'=>'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG,gif,GIF'
                ]
            );
            if($validateData){
                $category=$req->category;
               $pname=$req->pname;
               $price=$req->price;
               $quantity=$req->quantity;
               $features=$req->features;
               $image=$req->file('image');
                $dest=public_path('/Uploads');
                $fname="$pname-".time().".".$image->extension();
                $image->move($dest,$fname);
                $data = Products::where('id', $req->prodid)->first();
                if($data){
                Products::where('id',$req->prodid)->update([
                'pname'=>$req->pname,
                'price'=>$req->price,
                'quantity'=>$req->quantity,
                'features'=>$req->features,
                'image'=>$fname,
                'cid'=>$req->category
                ]);
                
                return back()->with('success','Updated Successfully');

                }
                else{
                    return back()->with('error','Not Updated Successfully');
                }
               
            
            }
        }
    }
                
