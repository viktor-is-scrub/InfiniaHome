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
	
	if (isset($_GET['err'] == "user-denied-from-services") && isset($_GET['user'])) {
	  $db = new mysqli($conf['db']['host'], $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']);
		if ($db->connect_errno) {
			require('epages/sys-error.php');
			exit();
		}
		$deniedreason = "";
		
		$stmt = $db->prepare("SELECT bannedReason FROM `users` WHERE user = ?");
		$stmt->bind_param("s", $_GET['user']);
		if ($stmt->execute()) {
			$stmt->bind_result($deniedreason);
			require('epages/'.$_GET['err']);
		} else {
			require('epages/sys-error.php');
			exit()
		}
	}

} else if (isset($_GET['err'])) {
  echo "Hmm... you think there\'s a problem????";
} else if (isset($_GET)) {
  echo "What are you trying to do, run an SQL injection on our error handling system?";
} else {
  echo "Direct access is not permitted";
}