<?php 
class Operators {
  
  public static function all() 
  {
      $db = DB::get();
      $sql = 'SELECT * FROM operators';
      $stm = $db->prepare( $sql );
      $stm->execute( );
    return $stm->fetchAll( PDO::FETCH_OBJ );
  }
  public static function add( array $row = [] )
  {
      if( !$row )
        return false;
      if( isset( $row[ 'lastdate' ] ) && empty( $row[ 'lastdate' ] ) )
        unset( $row[ 'lastdate' ] );
      if( isset( $row[ 'id' ] ) )
        unset( $row[ 'id' ] );

      $db    = DB::get( );
      $sql   = 'INSERT INTO operators SET ';
      $final = [];

      foreach( $row as $k => $v ) 
      {
          $sql .= sprintf( '%s = ?, ', $k );
          $final[] = $v;
      }

      $sql   = trim( $sql, ', ' );
      $stm   = $db->prepare( $sql );

    return $stm->execute( $final );
  }
  public static function edit( array $row = [] )
  {
      if( !$row )
        return false;

      $db    = DB::get( );
      $sql   = 'UPDATE operators SET ';
      $final = [];
      foreach( $row as $k => $v ) 
      {
          $sql .= sprintf( '%s = ?, ', $k );
          $final[] = $v;
      }
      $sql    = trim( $sql, ', ' );
      $sql   .= ' WHERE id = ?';
      $stm    = $db->prepare( $sql );
      $final[] = $final[0];

    return $stm->execute( $final );
  }
  public static function delete( $id = false )
  {
      if( !$id )
        return false;

      $db    = DB::get( );
      $sql   = 'DELETE FROM operators WHERE id = ?';
      $stm    = $db->prepare( $sql );

    return $stm->execute([ $id ]);
  }
  
}