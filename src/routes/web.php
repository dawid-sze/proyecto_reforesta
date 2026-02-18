<?php
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\UsuariosController;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [EventosController::class, 'index'])->name('inicio');

Route::resource('usuarios',UsuariosController::class);
Route::resource('especies',EspeciesController::class);
Route::resource('eventos',EventosController::class);
Route::get('login_form', [UsuariosController::class, 'loginForm'])->name('login_form');
Route::post('login', [UsuariosController::class, 'login'])->name('login');
Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');
Route::post('signUp', [UsuariosController::class , 'signUp']);
Route::post('signOff', [UsuariosController::class , 'signOff']);

Route::get('/auth/google', function() {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function(){
    try{
        $usuario_google = Socialite::driver('google')->user();
        $user = Usuarios::where('email', $usuario_google->getEmail())->first();

        if(!$user){
            $usuario = Usuarios::create([
            'nick' => $usuario_google->getNick(),
            'nombre' => $usuario_google->getName(),
            'apellidos' => $usuario_google->getLastName(),
            'password' => bcrypt(uniqid()),
            'email' => $usuario_google->getEmail(),
            'avatar' => $usuario_google->getAvatar()
        ]);
        }
        Auth::login($user);
        return redirect('/');
    }catch(Exception $e){
        return redirect('/login');
    }
});