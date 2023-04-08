<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $user;
    protected $userId, $userName, $userEmail, $userEmailVerifiedAt;

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
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!is_null($this->user))
            return view('dashboard.index', [
                'title' => "Dashboard".config('setup.SITE_TITLE'),
                'user' => $this->user,
            ]);
        else
            return redirect()->route('login')
                ->with('errors', [
                    'OOPS :: User not found'
                ]);
    }
}
