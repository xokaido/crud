<?php 
class Calls {

  public static function all() 
  {
      $db = DB::get();
      $sql = 'SELECT * FROM calls';
      $stm = $db->prepare( $sql );
      $stm->execute( );
    return $stm->fetch( PDO::FETCH_OBJ );
  }

  public static function add( array $row = [] )
  {
    return true;
  } 
  public static function edit( array $row = [] )
  {
    return true;
  } 
  public static function delete( array $row = [] )
  {
    return true;
  } 
         
}