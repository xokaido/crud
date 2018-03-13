<?php

class Input {

  public static function post( $variable = false )
  {
      if( $variable )
      {
        if( isset( $_POST[ $variable ] ) && !empty( $_POST[ $variable ] ) )
          return $_POST[ $variable ];
        return false;
      }
    return $_POST;
  }
  public static function get( $variable = false )
  {
      if( $variable )
      {
        if( isset( $_GET[ $variable ] ) && !empty( $_GET[ $variable ] ) )
          return $_GET[ $variable ];
        return false;
      }
    return $_GET;
  }

}

