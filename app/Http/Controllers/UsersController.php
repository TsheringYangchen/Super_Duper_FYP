<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{

    public function index() 
    {
        $users = User::paginate(5);  
        return view('admin.users.index', compact('users'));
    }

    public function add()
    {
        return view('admin.users.add');
    }
    public function find()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $users = User::where('name', 'LIKE', '%'.$q.'%')
                            ->orWhere('cid', 'LIKE', '%'.$q.'%')
                           ->get();
        if(count($users) > 0)                    
            return view('admin.users.searchIssuer',compact('users'));
        }
        return redirect('/admin/users')->with('warning','No results found');
    }
    public function editIssuer($id)    
    {
        $user = User::find($id);
       return view('admin.users.issuer-edit')->with('user',$user);
    }
    public function update(Request $request, $id)
    {
      $user = User::find($id);

          $user->name=$request->input('name');
          $user->cid=$request->input('cid');
          $user->phone=$request->input('phone');
          $user->email=$request->input('email');
          $user->user_type=$request->input('user_type');
          $user->save();
       
      return redirect('admin/users')->with('user',$user);
    }
      public function  deleteIssuer($id)
      {
        $users = User::findOrFail($id);  
        $users->delete();
        return redirect('/admin/users');
    }

}
