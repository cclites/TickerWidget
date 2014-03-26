<?php
    require_once("/var/www/TickerWidget/Controllers/Ticker.php");

    $func = "";
    if (isset($_GET["func"])) $func = $_GET["func"];
    if($func != "") dispatch($func);

function dispatch($func)
{
    switch($func)
    {
      case "getTicker":

      //echo "getting content\n";

      echo getTicker($_GET);
      break;

    default:
	  writeLog("No function selected.");
    }
}
?>