<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',

    // uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=localhost;dbname=yii1tutorial',
	'emulatePrepare' => true,
    'enableProfiling' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
);