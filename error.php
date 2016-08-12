<?php

// Pages that can be passed to index.php via GET
$parts = Array (
    "user-error",
    "user-unconfirmed",
	  "sys-error",
    "404",
    "500",
    "403",
    "bug"
);


if (isset($_GET['err']) && in_array($_GET['err'], $parts)) {
  
  include('epages'.$_GET['err'].'.php');

}