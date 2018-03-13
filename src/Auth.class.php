<?php
class Auth {

  public static function login( array $user = [] )
  {
      $user = $user ? $user : Input::post( );
      if( !$user )
        return false;
      $username = $user['username'];
      $password = $user['password'];

      Loader::model( 'user' );

      $db_user  = User::get( $username );

      if( !password_verify( $password,  $db_user->password ) )
        return false;

      $_SESSION['user'] = $username .':'. $db_user->hash;
      setcookie( 'user',  $username .':'. $db_user->hash , strtotime( "+1 day" ) );
    return true;
  }
  public static function logout()
  {
      session_destroy();
      setcookie( 'user',  'blank' , strtotime( "-1 day" ) );
    return redirect( '/' );
  }
  public static function register( array $user = [] )
  {
      $user = $user ? $user : Input::post( );
      if( !$user )
        return false;
      Loader::model( 'user' );
    return User::create( $user );
  }
  public static function check( array $user = [] )
  {
      Loader::model( 'user' );
      if( !$user )
      {
          if( !isset( $_SESSION['user'] ) || empty( $_SESSION[ 'user' ] ) )
            return false;
          if( !isset( $_COOKIE[ 'PHPSESSID' ] ) || ( $_COOKIE[ 'PHPSESSID' ] !== session_id() ) )
            return false;

          list( $user, $hash ) = explode( ':', $_SESSION[ 'user' ] );
        return User::check( $user, $hash );
      }
    return User::check( $user['username'], $user['hash'] );
  }
  public static function user()
  {
      if( !isset( $_SESSION['user'] ) || empty( $_SESSION[ 'user' ] ) )
        return false;
      if( !isset( $_COOKIE[ 'PHPSESSID' ] ) || ( $_COOKIE[ 'PHPSESSID' ] !== session_id() ) )
        return false;

      list( $user, $hash ) = explode( ':', $_SESSION[ 'user' ] );
    return User::get( $user );
  }

}