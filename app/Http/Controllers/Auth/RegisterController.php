<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserPreference;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use DB;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function register(Request $request)
    {
        try {
            
            $find_user = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();
            if ($find_user) {
                return redirect()->back()->with('error', 'The email or phone is already registered with us.');
            } else {
                DB::beginTransaction();
                $user = new User();
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->date_of_birth = $request->date_of_birth;
                $user->annual_income = $request->annual_income;
                $user->occupation = $request->occupation;
                $user->famiy_type = $request->famiy_type;
                $user->manglik = $request->manglik;
                $user->password = bcrypt($request->password);
                $user->save();
                
                if($user){
                    if(is_array($request->prefered_occupation) && count($request->prefered_occupation) > 1){
                        $prefered_occupation=implode(',', $request->prefered_occupation);
                    }
                    else{
                        $prefered_occupation = trim(implode(' ', $request->prefered_occupation));
                    }
                    if(is_array($request->prefered_famiy_type) && count($request->prefered_famiy_type) > 1){
                        $prefered_famiy_type=implode(',', $request->prefered_famiy_type);
                    }
                    else{
                        $prefered_famiy_type = trim(implode(' ', $request->prefered_famiy_type));
                    }
                    $user_prefrence = new UserPreference();
                    
                    $prefered_annual_income = explode('-', $request->prefered_annual_income);
                    $user_prefrence->user_id = $user->id;
                    $user_prefrence->expected_annual_income_from = $prefered_annual_income[0];
                    $user_prefrence->expected_annual_income_to = $prefered_annual_income[1];
                    $user_prefrence->occupation = $prefered_occupation;
                    $user_prefrence->famiy_type = $prefered_famiy_type;
                    $user_prefrence->manglik = $request->prefered_manglik;
                    $user_prefrence->save();
                    
                    DB::commit();
                    Auth::login($user);
                    return redirect("home")->with('success', "Welcome, $user->first_name.");
                }
                DB::rollback();
                return redirect()->route('login')->with('error', 'Unable to register.');
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('login')->with('error', 'Something went wrong.');
        }
    }

   
}
