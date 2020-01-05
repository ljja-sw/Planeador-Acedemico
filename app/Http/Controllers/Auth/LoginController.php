<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $logged_guard;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    public function guard()
    {
        return Auth::guard($this->logged_guard);
    }

    public function attemptLogin(Request $request)
    {

        if ($this->guard()->attempt(
            $this->credentials($request), $request->filled('remember'))) {
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember'));
        } else {
            $this->logged_guard = "admin";
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember'));
        }
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole("Admin")) {
            return $this->sendFailedLoginResponse($request);
        }
        $user->update([
            'last_login' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
