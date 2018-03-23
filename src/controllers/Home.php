<?php
class Home {

  public function __construct() 
  {
      if( !Auth::check( ) )
        return redirect( '/login' );
  }

  /**
   * The /home page index method
   * @return void
   */
  public function index()
  {
      $user = Auth::user( );
      $page = 'home';

      Loader::view( 'parts.header' );
      Loader::view( 'home', compact( 'user', 'page' ) );
      Loader::view( 'parts.footer' );

  } 
  public function calls()
  {
      $user = Auth::user( );
      $page = 'calls';

      Loader::view( 'parts.header' );
      Loader::view( 'calls', compact( 'user', 'page' ) );
      Loader::view( 'parts.footer' );

  } 
  public function messages()
  {
      $user = Auth::user( );
      $page = 'messages';
      Loader::view( 'parts.header' );
      Loader::view( 'messages', compact( 'user', 'page' ) );
      Loader::view( 'parts.footer' );

  } 
  public function processmessage()
  {
      Loader::model( 'messages' );
      $response = Messages::edit( Input::post( 'data' ) );
    return $this->notify( $response );
  }
  public function json( $param = false )
  {
      if( !$param )
        die( 'Which one?' );

      Loader::model( $param );
      $class = ucfirst( $param );
      $json  = $class::all( );
      Loader::view( 'parts.json', compact( 'json' ) );

  }
  public function add( $param = false )
  {
      if( !$param )
        die( 'Add what?' );

      Loader::model( $param );
      $class = ucfirst( $param );

      if( $class::add( Input::post( 'data' ) ) )
        return $this->notify( 'Success! The record has been created.' );

    return $this->notify( 'Error! Could not create the new record!!!', 503 );
  }
  public function edit( $param = false )
  {
      if( !$param )
        die( 'Edit what?' );

      Loader::model( $param );
      $class    = ucfirst( $param );

      if( $class::edit( Input::post( 'data' ) ) )
        return $this->notify( 'Success! The record has been created.' );

    return $this->notify( 'Error! Could not create the new record!!!', 503 );
  }
  public function delete( $param = false )
  {
      if( !$param )
        die( 'Delete what?' );

      Loader::model( $param );
      $class = ucfirst( $param );

      $id = Input::post( 'data' )[0];

      if( $class::delete( $id ) )
        return $this->notify( 'Success! The record has been created.' );

    return $this->notify( 'Error! Could not create the new record!!!', 503 );
  }
  private function notify( $message, $status = 200 )
  {
      http_response_code( $status );
    return Loader::view( 'parts.message', compact( 'message' ) );
  }

}