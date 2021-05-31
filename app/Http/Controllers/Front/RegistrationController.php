<?php

namespace App\Http\Controllers\Front;

use App\User;
use Redirect;
use DB;
use App\Bin;
use App\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{

    public function index()
    {
        return view('front.registration.index');
    }

    public function license(Request $request){
    
        $request->validate([
            'license_no' => 'required|max:9',
            'license_name' => 'required',
            'cid' => 'required|digits:11|numeric',
            'phone' => 'required|digits:8|numeric',
            'location' => 'required',
            'image'=>'required',
            'license_type' => 'required',
        ]);
         $license = License::where('license_no', '=', Input::get('license_no'))->first();
        
        if ($request->hasFile('image')) 
        {
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }
        if($license){
            // If try to add again revoked license holders
        $request->session()->flash('warning', 'License number has been taken!');
        
        // Redirect to
        return redirect('/admin/products/create');
        }else{
       License::create([
            'license_no' => $request->license_no,
            'license_name' => $request->license_name,
            'image' => $request->image,
            'cid' => $request->cid,
            'phone' => $request->phone,
            'location' => $request->location,
            'status' => 0,
            'image' => $request->image->getClientOriginalName(),  
            'license_type' => $request->license_type, 
                
        ]);
        
        // Sign the user in
        $request->session()->flash('msg', 'License Holders has been added successfully');

        // Redirect to
        return redirect('/admin/products/create');
    }
    }


    public function store(Request $request)
    {

        // Validate the user
        $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:8|numeric',
            'cid' => 'required|digits:11|numeric',
            'user_type' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $cid = User::where('cid', '=', Input::get('cid'))->first();
        $email = User::where('email', '=', Input::get('email'))->first();
        if($email || $cid){
            $request->session()->flash('msg', 'Email or Cid has been taken!');

            // Redirect to
            return redirect()->back();
        }else{
        // Save the data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cid' => $request->cid,
            'user_type' => $request->user_type,
            'password' => bcrypt($request->password),
        ]);

    
        $request->session()->flash('msg', 'User has been added');

        // Redirect to
        return redirect()->back();
    }
    }
   public function viewLicense()
   {
        $license=License::paginate(10);     
        return view('admin.products.viewLicense',['licenses'=>$license]);
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $licenses = License::where('license_name', 'LIKE', '%'.$q.'%')
                            ->orWhere('license_no', 'LIKE', '%'.$q.'%')
                            ->get();
        if(count($licenses) > 0)                    
            return view('admin.products.search',compact('licenses'));
        }
        return redirect('/admin/viewLicense')->with('warning','No results found');

    }
    
    public function searchfilter(){
        $filter = Input::get('filter');
        if($filter != ""){
            $licenses = License::where('status', '=', $filter)
            ->get();

        if(count($licenses) > 0){                  
            return view('admin.products.search',compact('licenses'));
        } else{
            return back()->with('warning', 'No Results found!');
        }

    }
    }

    public function editLicense($id)    
    {
        $license = License::find($id);
        return view('admin.products.license-edit',compact('license'));
    }
    public function update(Request $request, $id)
    {
        $license = License::find($id);

        $license->license_name=$request->input('license_name');
        $license->license_no=$request->input('license_no');
        $license->cid=$request->input('cid');
        $license->phone=$request->input('phone');
        $license->location=$request->input('location');
        $license->license_type=$request->input('license_type'); 
       
        if ($request->hasfile('image'))
         {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $license->image = $filename;
            }

        $license->save();
        return redirect('admin/viewLicense')->with('license',$license);
    }

    public function Holder(Request $request){

        $request ->validate([
            'no'=>'required',
        ]);
        if($no=License::where('license_no','=',Input::get('no'))->first())
        {
            $status = License::where('license_no','=',Input::get('no'))->get();
            return view ('front.License-Status',compact('status'));
        }
  
    else
    {
         // Session message
        return back()->with('warning','You have entered wrong License No');
    }
}

    
}
