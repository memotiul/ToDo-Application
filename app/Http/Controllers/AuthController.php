<?php
 
namespace App\Http\Controllers;
 use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Hash;
use DB;
use Session;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
 
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('profile')->with('message','Successfull Logged-In');
        }
 
        return redirect("login")->with('message','Log-In details are not Valid');
    }
 
    public function registration()
    {
        return view('auth.registration');
    }
 
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $data = $request->all();
        $check = $this->create($data);
        
        return redirect("dashboard");
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
      return back()->with('message','Registration Successfull');
    }
 
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
    
        return redirect("login")->with('message','You are not allowed to access');
    }
 
    public function signOut() {
        Session::flush();
        Auth::logout();
 
        return Redirect('login');
    }

    public function profile()
    {
               $users = User::get();
        return view('profile', compact('users'));
    }

    public function edit()
    {
        return view('changePassword');
    } 
   
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return back()->with('message','Password Change Successfully');
    }

         public function addquestion()
    {
        return view('add');
    }
      public function customadd(Request $request)
    {
             $event = new Event;
             $event->name = $request->name;
             $event->description = $request->description;
             $event->status = $request->status;
             $event->save();
            return back ();
    }
     public function todolist()
    {
        $event = Event::all();
        return view('todolist', compact('event'));
    }
     public function qview($id)
    {
        $event = Event::find($id);
        return view('singleview', compact('event'));
    }
     public function userDetails()
    {
        $user = User::all();
        return view('userDetails', compact('user'));
    }
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
 
        return back();
    } 
     public function todoedit($id)
    {
        $event = Event::find($id);
        return view('todoedit', compact('event'));  
    }
 
     public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('todolist')
            ->with('success','Product updated successfully');
    }

}
