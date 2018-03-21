<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=conkev_lists',
//	'connectionString' => 'mysql:host=192.168.8.120;dbname=conkev_lists',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
//	'password' => 'root.conkev',
//	'password' => 'r00t@am1',
	'charset' => 'utf8',
	
);