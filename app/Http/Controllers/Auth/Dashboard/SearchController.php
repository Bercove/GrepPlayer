<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
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
     * Display the specified resource.
     * 
     * Search for
     * Album
     * Artist
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $searchQuery = $request->input("q");

        if($searchQuery != '' && !empty($searchQuery)){

            $albumData = $this->album($searchQuery);
            $artistData = $this->artist($searchQuery);

            // dd(json_decode(json_encode($albumData->results->albummatches->album[0]->image[0]), true));
            // dd(json_decode(json_encode($artistData->results->artistmatches->artist[0]->image[0]), true));

            return view('dashboard.searches.show', [
                'title' => 'Search :: '.$searchQuery.config('setup._SITE_TITLE'),
                'albums' => $albumData?->results?->albummatches?->album,
                'artists' => $artistData?->results?->artistmatches?->artist,
            ]);
        }

        return back()
        ->with('errors', [
            'Search error',
            'Submit something please'
        ]);
    }

    private function album(string $searchQuery){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.audioscrobbler.com/2.0/?method=album.search&album=' . urlencode($searchQuery) . '&api_key=' . env('LASTFM_API_KEY') . '&format=json',
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

    private function artist(string $searchQuery){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.audioscrobbler.com/2.0/?method=artist.search&artist=' . urlencode($searchQuery) . '&api_key=' . env('LASTFM_API_KEY') . '&format=json',
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
}
