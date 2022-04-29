<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class authController extends Controller
{
    //##################registration############

    function register()
    {
        return view('auth_files.registration');
    }



    function insert_user(Request $request)
    {
// dd(csrf_token());
        $data = $this->validate($request, [
            'name'     => "required|string|max:50",
            'email'    => "required|email|min:10|max:60|unique:users",
            'password' => "required|min:6|max:60",
            'image'    => "required|image|mimes:png,jpg,jpeg",


        ]);

        $imageName = uniqid() . '.' . $data['image']->extension();


        if ($request->image->move(public_path('/images'), $imageName)) {
            $data['image'] =  $imageName;
        }

        $data['password'] = bcrypt($data['password']);

        $insert_data = User::create($data);

        if($insert_data){
            $message = 'user inserted';
        }else{
            $message = 'error to  insert user';
        }

        session()->flash('message' , $message);

        return redirect('ToDo/register');
    }



###################### login #############
    function login_page(){
        return view('auth_files.login');
    }


    function login(Request $request){

        $data = $this->validate($request , [
            'email'    => "required|email|min:10|max:60",
            'password' => "required|min:6|max:60",
        ]);

        if(auth()->attempt($data)){
           return redirect('/ToDo');

        }else{
            session()->flash('message' , 'user & password are not valid');
            return redirect('ToDo/login');
            dd('error');
        }


    }

// ###################### user profile ###################


//     function userData(){
//         if(auth()->check()){
//             $data = User::get();
//             return view('auth_files.userData' , ['data' => $data]);
//         }else{
//             return redirect(url('ToDo/login'));
//         }

//     }




// function logout(){
//     auth()->logout();

//     return redirect(url('ToDo/login'));


// }


// ###########delet#########

// function destroy($id){
//     $raw = User::find($id);

//     $delete = User::where('id' , $id)->delete();

//     if ($delete) {

//         unlink(public_path('images/' . $raw->image));

//         $message = 'Raw Deleted';
//     } else {
//         $message = 'Error Try Again';
//     }

//          # Set Message Session ....


//          return session()->flash('Message',$message);
// }

// function checklang(Request $request){

//     session()->put('lang' , $request->lang);

//     return back();
// }


}
