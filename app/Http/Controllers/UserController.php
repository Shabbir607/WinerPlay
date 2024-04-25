<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('backend.users.profile')->with('profile',$profile);
    }
    public function profileUpdate(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $this->validate($request,
            [
                'name'=>'string|required|max:30',
                'email'=>'string|required',
                'role'=>'required|in:admin,user',
                'status'=>'required|in:active,inactive',
                'photo'=>'nullable|string',
            ]);
        // dd($request->all());
        $data=$request->all();
        // dd($data);

        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occured while updating');
        }
        return redirect()->route('/dashboard');

    }

}
