<?php 
class User {
  
  public static function get( $username )
  {
      $db       = DB::get();
      $stm      = $db->prepare( 'SELECT * FROM users WHERE username = ? LIMIT 1' );
      $stm->execute([ $username ]);
    return $stm->fetch( PDO::FETCH_OBJ );
  }
  public static function create( array $user )
  {
      $db       = DB::get();
      $user     = (object) $user;
      $username = $user->username;
      $password = password_hash( $user->password , PASSWORD_DEFAULT );
      $hash     = crypt( $password, 'securedsalt' );
      $sql      = 'INSERT INTO users SET username = ?, password = ?, hash = ?';
      $stm      = $db->prepare( $sql );
    return $stm->execute([ $username, $password, $hash ]);
  }
  public static function check( $username, $hash )
  {
      $db   = DB::get();
      $sql  = 'SELECT * FROM users WHERE username = ? AND hash = ? LIMIT 1';
      $stm  = $db->prepare( $sql );
      $stm->execute([ $username, $hash ]);

    return $stm->fetch( PDO::FETCH_OBJ );
  }
  public static function update( array $user = [] )
  {
      $db   = DB::get();
      $sql  = 'UPDATE users SET ';
      foreach( $user as $k => $v )
          $sql .= sprintf( "%s = ?, ", $k );
      $sql = trim( $sql, ', ' ); 
      $sql .= ' WHERE username = ?';
      $stm  = $db->prepare( $sql );

  }
}

