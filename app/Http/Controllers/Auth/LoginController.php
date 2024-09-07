<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_ip' => ip(),
            'last_seen_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($user->role == 2)
            return redirect('/admin/home');
        else
            return redirect('/dashboard');
    }


    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if (env('RECAPTCHA_ENABLED')) {
            if (!$this->authReCaptcha($request))
                return false;
        }


        $user = User::where('username', $request->username)->first();
        if (isset($user)) {
            if ($user->password == md5($request->password)) {
                $user->password = Hash::make($request->password);
                $user->save();

                if (!$this->authIP($user, ip()))
                    return false;

                $this->guard()->login($user, $request->has('remember'));
                return true;
            } else {
                return $this->guard()->attempt(
                    $this->credentials($request), $request->boolean('remember')
                );
            }
        }
        return false;
    }

    public function authIP($user, $ip): bool
    {
        if ($user->registered_ip == $ip)
            return true;

        return false;
    }

    public function authReCaptcha($request): bool
    {
        $response = Http::get('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response')
        ]);

        return $response->successful() && $response->json()['success'];
    }
}
