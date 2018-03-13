<?php

class Input {

  /**
   * Retreieve POST variables
   * @param  string $variable The $_POST array element
   * @return false|$_POST[$variable]
   */
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
  /**
   * Retreive GET variables
   * @param  string $variable The $_GET array element
   * @return false|$_GET[$variable] 
   */
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

