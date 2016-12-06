<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Question;


class UserController extends Controller
{

    public function _construct(){

        $this->middleware('auth');
    }

    public function profile(){

        $user = Auth::user();


        return view('users.profile', compact('user'));





    }


    public function loginview(){

        return view('users.signup');
        
    }

    public function signup(Request $request)
    {


        $this->validate($request , [
            'email' => 'required|email|unique:users',
            'username' => 'required|max:120',
            'password' => 'required|min:4',
            'cell_no' => 'min:10'
        ]);

        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['password']);
        $cell_no = $request['cell_no'];

        $user = new User();

        $user->email = $email;
        $user->username = $username;
        $user->password = $password;
        $user->cell_no = $cell_no;
        $user->save();



        
        return redirect('/ ');

    }
    
   
    public function signin(Request $request)
    {

        $this->validate($request , [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password'] ]))
        {
            
            return redirect('/');
        }
        return back();

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
?>


