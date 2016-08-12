<?php


if (file_exists('InfiniaLegit.config.php')) {
  require 'InfiniaLegit.config.php';
  
} else {
  require 'inc/config.php';
}

// Pages that can be passed to index.php via GET
$parts = Array(
    "user-error",
    "user-unconfirmed",
	  "sys-error",
    "404",
    "500",
    "403",
    "bug",
		"user-denied-from-services"
);


if (isset($_GET['err']) && in_array($_GET['err'], $parts)) {
  
  require('epages/'.$_GET['err'].'.php');

} else if (isset($_GET['err'])) {
  echo "Hmm... you think there\'s a problem????";
} else if (isset($_GET)) {
  echo "What are you trying to do, run an SQL injection on our error handling system?";
} else {
  echo "Direct access is not permitted";
}