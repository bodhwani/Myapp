<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;



class UserController extends Controller
{

    public function _construct(){

        $this->middleware('auth');
    }

    public function profile(){

        $user = Auth::user();


        return view('users.profile', compact('user'));

    }
    
    public function userQ(User $user){

        $id = Auth::user()->id;
        $user = User::with('questions.user')->find($id);


        if($user) {
            return view('users.userQ', compact('user'));
        }
        return 'No questions';


        //return $question;
    }

    public function userA(User $user){

        $id = Auth::user()->id;
        $user = User::with('answers.user')->find($id);


        if($user) {
            return view('users.userA', compact('user'));
        }
        return 'No answers';


        //return $question;
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


