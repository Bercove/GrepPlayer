<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

use UsersClass;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    
    protected $user;
    protected $userId, $userName, $userEmail, $userEmailVerifiedAt;
    
    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware(function (Request $request, $next) {
            if (Auth::check()) {
                $this->user = Auth::user();
                $this->userId = Auth::user()->id;
                $this->userName = Auth::user()->name;
                $this->userEmail = Auth::user()->email;
                $this->userEmailVerifiedAt = Auth::user()->email_verified_at;

                if($this->user)
                    return $next($request);
                else{
                    $this->guard()->logout();
                    return redirect()->route('login')
                        ->with('errors', [
                            'OOPS :: User not found'
                        ]);
                }
            } 
            else {
                $this->guard()->logout();
                return redirect()
                    ->route('login')
                    ->with('errors',  [
                        'Please login again',
                        'Enable cookies in browser to be logged in'
                    ]);
            }
        });
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.

        $PasswordBroker = new PasswordBroker();

        $response = $PasswordBroker->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return ($response == 'passwords.reset') ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'password_old' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'password_old.required' => 'Old Password is required',

            'password.min' => 'New password is minimum length is six (6)',
            'password.required' => 'New password is required',
            'password.confirmed' => 'New password is does not match',
        ];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'email',
            'password_old',
            'password',
            'password_confirmation',
            'remember_token'
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse($response)
    {
        return redirect()
            ->route('login')
            ->with('success', 'Password Changed Successfully');
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        if($response == 'passwords.old')
            return redirect()->back()
                ->with('errors', [
                    'Incorrect old password'
                ]);
        else
            return redirect()->back()
            ->with('errors', [
                trans($response)
            ]);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
