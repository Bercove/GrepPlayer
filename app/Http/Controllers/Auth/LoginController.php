<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use PagesClass;
use UsersClass;

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
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {        
        return [
            'email' => $request->{$this->username()}, 
            'password' => $request->password,
        ];
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $userId = $this->userId($request);

        if($userId == false){
            return redirect()
            ->back()
            ->with('errors', [
                'Invalid E-Mail '.'<b><q>'.$request->email.'</q></b>',
                'E-Mail not found'
            ]);
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // This section is the only change
        if($this->guard()->validate($this->credentials($request))){
            $user = $this->guard()->getLastAttempted();

            // Make sure the user has confirmed email
            if(UsersClass::checkConfirmation($userId) == true && $this->attemptLogin($request)){

                // send the normal successful login response
                return $this->sendLoginResponse($request);
            }
            else{

                // Increment the failed login attempts and redirect back to the 
                // login form with an error message
                $this->incrementLoginAttempts($request);
                return redirect()
                ->back()
                ->with('errors', [
                    'The selected email '.'<b><q>'.$request->email.'</q></b>'.' is not confirmed.',
                    'You need to confirm your email before login.'
                ]);
            }
        }
        else{
            return redirect()
            ->back()
            ->with('errors', [
                'Invalid password or E-Mail'
            ]);  
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {    

        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);       
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Get the login userId to be used by the controller.
     *
     * @return string
     */
    public function userId(Request $request)
    {
        $userId = User::where('email', '=', $request->email, 'AND', 'password', '=', $request->password)->first();
        if(!empty($userId))
            return $userId->id;
        else
            return false;
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        PagesClass::setCookies(config('setup.userId'), $user->id, 60);
        $defaultPassword = config('setup.defaultPassword');


        $notification = array(
            'notification' => 'notification',
            'type' => 'success',
            'notificationTitle' => PagesClass::db2Display(UsersClass::userName($user->id) . config('setup.SITE_TITLE')),
            'notificationMessage' => "Welcome to your Dashboard",
        );

        if(Hash::check($defaultPassword, $user->password))
            return redirect()
                ->route('dashboard.profile.edit')
                ->with('success', 'Please reset your password from default :: <b>'.$defaultPassword.'</b>, we recommend you to use strong password');
        else
            return redirect()
                ->route('dashboard.index')
                ->with($notification);
    }   
}
