<?php
class Config {

  /**
   * Initialize the configurations and load it from .env file
   * @return void
   */
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

  /**
   * Get configurations specific to DB
   * @param  string $variable The name of the config variable
   * @return string          The config value of the variable
   */
  public static function db( $variable )
  {
      $entry = 'DB_'. strtoupper( $variable );
    return getenv( $entry );
  }
  
}

