<?php 
class Messages {

  public static function all() 
  {
      $db  = DB::get();
      $sql = 'SELECT * FROM messages';
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
      $row        = (object) $row;
      $msg_template = $row->message;
      $templates  = self::extractTemplates( $msg_template );
      $db         = DB::get();
      $sql        = 'SELECT * FROM operators WHERE id = ? LIMIT 1';
      $stm        = $db->prepare( $sql );
      $stm->execute([ $row->id ]);
      $operator   = $stm->fetch( PDO::FETCH_OBJ );

      if( !empty( $templates ) )
      {
        $searches = [];
        $replaces = [];
        foreach( $templates as $template )
        {
          foreach( $template['search'] as $k => $v ) 
          {
            $searches[] = $v;
            $replaces[] = $operator->{$template[ 'replace' ][ $k ]};
          }
        }
        $msg_parsed = str_replace($searches, $replaces, $msg_template );
        $sql = 'INSERT INTO messages (operator_id, msg_template, msg_parsed )
                     VALUES ( :operator_id, :msg_template, :msg_parsed )
                     ON DUPLICATE KEY
                     UPDATE msg_template = :msg_template2 , msg_parsed = :msg_parsed2';
        $stm = $db->prepare( $sql );
        $stm->bindParam( ':operator_id',  $operator->id );
        $stm->bindParam( ':msg_template', $msg_template );
        $stm->bindParam( ':msg_parsed',   $msg_parsed   );

        $stm->bindParam( ':msg_template2', $msg_template );
        $stm->bindParam( ':msg_parsed2',   $msg_parsed   );
        $stm->execute( );
      }
    return $msg_parsed;
  } 
  public static function delete( array $row = [] )
  {
    return true;
  } 
  protected static function extractTemplates( $text )
  {
      $bracy = '!\[([#|\$])?([a-zA-Z_]*)\]!';
      $curly = '!{([#|\$])?([a-zA-Z_]*)}!';
      $final = [];
      preg_match_all( $curly, $text, $curlies );
      preg_match_all( $bracy, $text, $braces );

      if( isset( $curlies[ 2 ] ) && !empty( $curlies[ 2 ] ) )
        $final[ 'curly' ] = [ 'search' => $curlies[ 0 ], 'replace' => $curlies[ 2 ] ] ;

      if( isset( $braces[ 2 ] ) && !empty( $braces[ 2 ] ) )
        $final[ 'bracy' ] = [ 'search' => $braces[ 0 ], 'replace' => $braces[ 2 ] ] ;

    return $final;
  }

}