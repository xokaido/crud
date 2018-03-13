<?php
class Loader {

  public static function init()
  {
      $uri        = trim( $_SERVER[ 'REQUEST_URI' ], '/' );
      if( stristr( $uri, '?' ) )
        list( $uri, $query ) = explode( '?', $uri );
      $uri_parts  = explode( '/', $uri );
      $class      = ucfirst( ( isset( $uri_parts[ 0 ] ) && !empty( $uri_parts[ 0 ] ) ) ? $uri_parts[ 0 ] : 'home' );
      array_shift($uri_parts);
      $method     = ( ( isset( $uri_parts[ 0 ] )        && !empty( $uri_parts[ 0 ] ) ) ? $uri_parts[ 0 ] : 'index' );
      array_shift($uri_parts);
      $class_file = SRC_PATH .'/controllers/'. $class .'.php';

      if( file_exists( $class_file ) )
        require_once( $class_file );
      else
        die( 'The Object Does Not Exist!' );

      if( method_exists( ( new $class ), $method ) )
        call_user_func_array( [ ( new $class ), $method ], $uri_parts );
      else
        die( 'The Method Does Not Exist!' );
  }
  public static function model( $name )
  {
      $name = str_replace( '.', '/', $name ); 
      $class_file = SRC_PATH .'/models/'. ucfirst( strtolower( $name ) ) .'.php';
      if( file_exists( $class_file ) )
        require_once( $class_file );
      else
        die( 'The Model Does Not Exist!' );
  }

  public static function view( $name, $data = [] )
  {
      $name = str_replace( '.', '/', $name );
      $view_file = SRC_PATH .'/views/'. strtolower( $name ) .'.php';
      extract( $data );
      if( file_exists( $view_file ) )
        require_once( $view_file );
      else
        die( 'The View Does Not Exist!' );
  }
  public static function library( $name )
  {
      $name = str_replace( '.', '/', $name ); 
      $class_file = SRC_PATH .'/library/'. ucfirst( strtolower( $name ) ) .'.php';
      if( file_exists( $class_file ) )
        require_once( $class_file );
      else
        die( 'The Library Does Not Exist!' );
  }

}

