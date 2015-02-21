<?php
ob_start();
//set timezone
date_default_timezone_set('Europe/London');

//site address - chnage it to your site domain 
define('DIR','YOUR.URL.com/billitmate');
define('DOCROOT', dirname(__FILE__));

//database details ONLY NEEDED IF USING A DATABASE
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','billitmate');
define('DB_USER','root');
define('DB_PASS','FFSbork909');
define('PREFIX','');






//blar



//set prefix for sessions
define('SESSION_PREFIX','bim_');

//optionall create a constant for the name of the site
define('SITETITLE','Bill It Mate');

//include password helper
require('helpers/password.php');

function autoloadsystem($class) {

   $filename = DOCROOT . "/core/" . strtolower($class) . ".php";
   if(file_exists($filename)){
      require $filename;
   }

   $filename = DOCROOT . "/helpers/" . strtolower($class) . ".php";
   if(file_exists($filename)){
      require $filename;
   }

}
spl_autoload_register("autoloadsystem");

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

$app = new Bootstrap();
$app->setController('welcome');
$app->setTemplate('default');
$app->init();

ob_flush();

?>
