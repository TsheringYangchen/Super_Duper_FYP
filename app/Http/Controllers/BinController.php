<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Bin;
use DB;
use App\License;
use App\BRevoke;

class BinController extends Controller
{
    public function store(Request $request)
    {
        $license = License::where('license_no', '=', Input::get('license_no'))->first();
        $license_check = License::where('license_no', '=', Input::get('license_no'))->pluck('license_type');
        $license_type= DB::table('licenses')->select('license_type')->where('license_type', '=', 'Bar License')->pluck('license_type');
        $lis = DB::table('licenses')
        ->select('id')
        ->where('license_no', '=', Input::get('license_no'))->pluck('id');
        $bin_count = Bin::where('license_no','=',Input::get('license_no'))->count();
        $license_update = License::find($lis[0]);
                if($license_check[0] == $license_type[0])
                {
                    if ($lis[0])
                    {
                        $bins= new Bin;
                        $request->validate([
                        'license_no' => 'required',
                        'violation_date' => 'required',
                        'violation_type' => 'required',
                        'images' => 'required',
                        ]);

                        //store checkbox
                        if (!empty($request->input('violation_type')))
                        {
                            $checkbox=join(' , ',$request->input('violation_type'));
                            $bins->violation_type=$checkbox;
                        }
                        else{
                            $checkbox=', ';
                        }

                        // Upload the image
                        $input=$request->all();
                        $images=array();
                        if($files=$request->file('images'))
                        {
                            foreach($files as $file)
                            {
                                $name=$file->getClientOriginalName();
                                $file->move('uploads/bin',$name);
                                $images[]=$name;
                            }
                        }
                        if($bin_count == 0)
                        {
                            bin::create([
                                'user_id' => auth()->user()->id,
                                'license_no' => $request->license_no,
                                'violation_date' => $request->violation_date,
                                'violation_type' => $checkbox,
                                'image' => json_encode($images),  
                                ]);

                            $license_update->status = 1;
                            $license_update->save();
                        } 
                        else if ($bin_count == 1)
                        {
                            bin::create([
                                'user_id' => auth()->user()->id,
                                'license_no' => $request->license_no,
                                'violation_date' => $request->violation_date,
                                'violation_type' => $checkbox,
                                'image' => json_encode($images),  
                                ]);

                            $license_update->status = 2;
                            $license_update->save();
                        } 
                        else if ($bin_count == 2)
                        {
                            bin::create([
                                'user_id' => auth()->user()->id,
                                'license_no' => $request->license_no,
                                'violation_date' => $request->violation_date,
                                'violation_type' => $checkbox,
                                'image' => json_encode($images),  
                                ]);
                            $license_update->status = 3;
                            $license_update->save();
                        }
                        elseif($bin_count > 2){
                            $request->session()->flash('warning', 'This License has been Revoked!');
                            // Redirect to
                            return view('front/bin');
                        }
                        $request->session()->flash('msg', 'BIN Issued successfully');
                        // Redirect to
                        return view('front/success');
                    }
                }
                else
                {
                $request->session()->flash('warning', 'This License number is Entertainment License number!');
                    return view('front/bin');
                    
                }
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $issuers = Bin::where('license_no', 'LIKE', '%'.$q.'%')->get();
            if(count($issuers) > 0)                    
            return view('admin.searchBin',compact('issuers'));
        }
        return redirect('/admin/viewbin')->with('warning','No results found');
    }

    public function viewbin()
    {
        $issuer=Bin::paginate(10);     
        return view('admin.viewbin',['issuers'=>$issuer]);
    }
}
