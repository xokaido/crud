<?php
class Config {

  public static function init()
  {
      if( !file_exists( APP_PATH .'/.env' ) )
        die( 'The .env file was not found!' );
      $lines = file( APP_PATH .'/.env' );
      foreach( $lines as $v )
      {
          if( empty( $v ) || preg_match( '/^#/', $v ) )
            continue;
          putenv( trim( $v ) );
      }
  }

  public static function db( $variable )
  {
      $entry = 'DB_'. strtoupper( $variable );
    return getenv( $entry );
  }
  
}

