<?php
session_start();

define( 'SRC_PATH', dirname( __FILE__ ) );
define( 'APP_PATH', dirname( SRC_PATH ) );

require_once( SRC_PATH. '/Config.php' );

Config::init();

if( getenv( 'DEBUG' ) )
{
    error_reporting( E_ALL );
    ini_set( 'display_errors', 'on' );
}

require_once( SRC_PATH. '/Helpers.php' );
require_once( SRC_PATH. '/Loader.class.php' );
require_once( SRC_PATH .'/Input.class.php' );
require_once( SRC_PATH .'/DB.class.php' );
require_once( SRC_PATH .'/Auth.class.php' );

Loader::init();
