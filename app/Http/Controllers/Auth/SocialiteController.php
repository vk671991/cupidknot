<?php
   
namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use DB;
   
class SocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('home')->with('status', "Welcome, $finduser->first_name.");
            } else {
                DB::beginTransaction();
                $finduser = User::where('email', $user->email)->first();
                if ($finduser) {
                    $finduser->google_id = $user->id;
                    $finduser->google_connect = 1;
                    $finduser->save();
                    DB::commit();
                    Auth::login($finduser);
                    return redirect()->intended('home')->with('status', "Welcome, $finduser->first_name.");
                }
                DB::rollback();
                return redirect()->route('login')->with('error', 'The email is not registered with us.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('login')->with('error', 'Something went wrong.');
        }
    }
}