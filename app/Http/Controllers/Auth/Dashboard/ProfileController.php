<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\User;
use App\Models\UserData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
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
     */
    public function profile()
    {
        //
        if(!is_null($this->user)){
            $userData = UserData::where('user', $this->userId)->first();
            return view('dashboard.profile.profile', [
                'title' => 'My :: Profile'.config('setup._SITE_TITLE'),
                'userData' => $userData,
            ]);
        }
        else
            return back()
                ->with('errors', [
                    'OOPS :: User not found'
                ]);
    }

    /**
     * Display the specified resource.
     * 
     * Favorite
     * Album
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        if(!is_null($this->user)){
            $userData = UserData::where('user', $this->userId)->first();

            return view('dashboard.profile.edit', [
                'title' => 'Profile :: Edit'.config('setup._SITE_TITLE'),
                'userData' => $userData,
            ]);
        }
        else
            return back()
                ->with('errors', [
                    'OOPS :: User not found'
                ]);
    }

    /**
     * Information the specified resource in storage.
     */
    public function information(Request $request)
    {
        if(!is_null($this->user)){
            $fname = $request->input('fname');
            $mname = $request->input('mname');
            $lname = $request->input('lname');
            $tel = $request->input('tel');
            $country = $request->input('country');
            $gender = $request->input('gender');
            $dob = $request->input('dob');
            $age = $request->input('age');
            $about = $request->input('about');

            $findUser = UserData::where('user', $this->userId)->first();

            if($findUser)
                $userData = UserData::where([
                    ['id', $findUser->id],
                    ['user', $this->userId]
                ])->update([
                    'firstname' => $fname,
                    'middlename' => $mname,
                    'lastname' => $lname,
                    'bd' => $dob,
                    'gender' => $gender,
                    'age' => $age,
                    'tel' => $tel,
                    'country' => $country,
                    'about' => $about,
                ]);
            else
                $userData = UserData::create([
                    'user' => $this->userId,
                    'firstname' => $fname,
                    'middlename' => $mname,
                    'lastname' => $lname,
                    'bd' => $dob,
                    'gender' => $gender,
                    'age' => $age,
                    'tel' => $tel,
                    'country' => $country,
                    'about' => $about,
                ]);

                if($userData)
                    return redirect()
                        ->route('dashboard.profile.index')
                        ->with('success', 
                            "Your personal Information Updated successfully");
                else
                    return redirect()
                        ->route('dashboard.profile.edit')
                        ->with('success', [
                            "We are unable to updated your personal information",
                            "Sorry we are unable to determine error"
                        ]);
        }   
        else
            return back()
                ->with('errors', [
                    'OOPS :: User not found'
                ]);
    }
}
