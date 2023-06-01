<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Route::group([
//     'as' => 'passport.',
//     'prefix' => config('passport.path', 'oauth'),
//     'namespace' => 'Laravel\Passport\Http\Controllers',
// ], function () {
//     // Passport routes...
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/oauth/redirect', 'OAuthController@redirect');
Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => 'authentication_poc',
        'redirect_uri' => 'http://localhost:8000/callback',
        'response_type' => 'code id_token',
        'scope' => 'openid profile',
        'state' => 'af0ifjsldkj',
        'nonce' => 'n-0S6_WzA2Mj',
        // 'prompt' => '', // "none", "consent", or "login"
    ]);

    return redirect('https://prep-auth.fefundinfo.com/connect/authorize?' . $query);
});

Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    // throw_unless(
    //     strlen($state) > 0 && $state === $request->state,
    //     InvalidArgumentException::class
    // );

    $response = Http::asForm()->post('https://prep-auth.fefundinfo.com/connect/token', [
        'grant_type' => 'authorization_code',
        'client_id' => 'authentication_poc',
        'client_secret' => 'clientsecret1',
        'redirect_uri' => 'http://localhost:8000/callback',
        'code' => $request->code,
        
    ]);

    // $request->user()->token()->create([
    //     'access_token' => $response['access_token'],
    //     'expires_in' => $response['expires_in'],
    //     'refresh_token' => $response['refresh_token']
    // ]);

    // if (auth()->user()->token) {

    //     if (auth()->user()->token->hasExpired()) {
    //         return redirect('/oauth/refresh');
    //     }

    //     $responseuser = Http::withHeaders([
    //         'Accept' => 'application/json',
    //         'Authorization' => 'Bearer ' . auth()->user()->token->access_token
    //     ])->get('https://prep-auth.fefundinfo.com/connect/userinfo');

    //     if ($responseuser->status() === 200) {
    //         $posts = $responseuser->json();
    //         return $posts->json();
    //     }
    // }else{
    //     $test = string('joke');
    //     return test->json();
    // }

    //$test = string('joke');
    //return test->json();

    //Cache::add('access_token', $response['access_token'], 10);

    //return Cache::get('access_token');
    return $response->json();
});

// Route::get('/oauth/callback', 'OAuthController@callback');
// Route::get('/oauth/refresh', 'OAuthController@refresh');
