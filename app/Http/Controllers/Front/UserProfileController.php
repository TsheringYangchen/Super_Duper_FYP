<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;
use Image;

class UserProfileController extends Controller
{
    public function index() 
    {
        /*$id = auth()->user()->id;
        $user = User::where('id', $id)->first();*/

        //return view('front.profile.index', compact('user'));
       return view('front.profile.index',array('user' => Auth::user()));
       //return view('front.profile.index', ['user' => Auth::user()] );
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
         }

         return view('front.profile.index',['user' => Auth::user()] );
    }

	public function changepw()
	{
		return view ('front.profile.change-pw');
	}
	public function updatepw(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
