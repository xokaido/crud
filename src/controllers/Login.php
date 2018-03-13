<?php 

class Login {

 public function index()
 {
    Loader::view( 'auth.login' );
 }
 public function logout()
 {
    session_destroy();
  return redirect( '/login?status=success' );
 }
 public function register()
 {
    Loader::view( 'auth.register' );
 }
 public function post()
 {
    $user = [ 'username' => Input::post( 'username' ),
              'password' => Input::post( 'password' ) 
            ];
    if( !Auth::login( $user ) )
      return redirect( '/login?status=failed' );
  return redirect( '/home' );
 }

}