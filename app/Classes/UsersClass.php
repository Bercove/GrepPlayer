<?php

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersClass
{
    static function user() 
    {
		return !empty(Auth::user())?Auth::user():null;
	}
    static function userName() 
    {
		return !empty(Auth::user())?Auth::user()->name:null;
	}
    static function userEmail() 
    {
		return !empty(Auth::user())?Auth::user()->email:null;
	}

    /**
     * ! Using mhash was causing error 
     * ? call to undefined function mhash
     * $hash = mhash(MHASH_MD5, $variable1, $variable2);
     * $hash = bin2hex($hash);
     * That was an old logic
     */
	static function createHash($variable1, $variable2)
	{
		$hash = $variable1.$variable2;
		$hash = bcrypt($hash);
        $hash = PagesClass::cleanName($hash);

		return $hash;
	}

    /**
	 * ? Check if a user has confirmed email
	 *
	 * @return string
	 */
	static function checkConfirmation($userId)
	{
		$userCheck = User::where('id', $userId)->first();

		if (!empty($userCheck) && ($userCheck->is_verified == 1))
			return true;
		else
			return false;
	}
}