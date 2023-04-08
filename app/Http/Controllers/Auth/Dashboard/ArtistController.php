<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\User;
use App\Models\Artist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
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
     */
    public function index()
    {
        //
    }

    public function getArtist(Request $request)
    {
        $artist = urlencode($request->input("artist"));
        $mbid = $request->input("mbid");

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.audioscrobbler.com/2.0/?method=artist.getInfo&artist=' .  $artist .'&mbid='. $mbid . '&api_key=' . env('LASTFM_API_KEY') . '&format=json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * Favorite
     * Artist
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        if(!is_null($this->user))
            return view('dashboard.favorites.artist', [
                'title' => 'Favorites :: Artist'.config('setup._SITE_TITLE'),
                'artists' => '$artistData->results->artistmatches->artist',
            ]);
        else
            return back()
                ->with('errors', [
                    'OOPS :: User not found'
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
