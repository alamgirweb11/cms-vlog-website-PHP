<?php 
// this method user for more secure database connection
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {
	  define(strtoupper($key), $value);
	 // echo $key;
	// echo strtoupper($key);
}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if ($connection) {
	  // echo "Connection Success";
}else{
	  echo "Connection Failed";
}