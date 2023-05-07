<?php

session_start();

define('SITE_URL','http://localhost/top');

define('SITE_PATH', __DIR__ . DIRECTORY_SEPARATOR);

define('APP_TITLE','TOP MOVIE');

define('MYSQL_SERVER', 'localhost');

define('MYSQL_USERNAME', 'root');

define('MYSQL_DATABASE', 'topmovie');

define('MYSQL_PASSWORD', '');


foreach(glob('lib/*.php') as $lib_file)
{
include_once($lib_file);
}
