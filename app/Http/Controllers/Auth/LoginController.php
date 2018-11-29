<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(string $driver){
        return SociaLite::driver($driver)->redirect();
    }

    public function handleProviderCallback(string $driver){
        if (! request()->has('code')||request()->has('denied')) {
            session()->flash('message', ['danger', 'Inicio de sesión cancelado'])
             return redirect('login'); 
        }


        $socilaUser = SociaLite::driver($driver)->user();
       $user = null;
       $sucess = true;
       $email = $socilaUser->email;
       $check = User::whereEmail($email)->first();
       if($check){
            $user = $check;
       }else{
        \DB::beginTransaction();
        try{

            User::create([
                'name'=> $socilaUser->name;
                'email'=> $email;
            ]);

            UserSocialAccount::create([
                'user_id'=> $user->id;
                'provider'=> driver;
                'provider_uid'=> $socilaUser->id;

            ]);

            Student::create([
                'user_id'=> $user->id;
            ]);

        }catch(\Exception $exception){
            $sucess = $exception->getMessage();
            \DB::rollBack();
        }
       }
       if($sucess === true){
        DB::commit();
        auth()->loginUsingId($user-id);
        return redirect(route('home'));
       }
       session()->flash('message', ['danger', $sucess]);
       return redirect('login'); 
    }
}
