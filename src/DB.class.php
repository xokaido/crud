<?php

class DB  {
  public static function get()
  {
      $dsn = Config::db( 'driver' ) .':host='. Config::db( 'host' ) .';dbname='. Config::db( 'name' );
      $db  = new PDO( $dsn,
                      Config::db( 'user' ),
                      Config::db( 'pass' ),
                      [
                          \PDO::ATTR_PERSISTENT       => true,
                          \PDO::ERRMODE_WARNING       => PDO::ERRMODE_EXCEPTION,
                          \PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                          \PDO::ATTR_EMULATE_PREPARES => false
                      ]
                   );
    return $db;
  }

}

