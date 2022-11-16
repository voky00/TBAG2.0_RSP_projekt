<?php

// read db config
$config = parse_ini_file('config.ini');

// create connection to mysql db
$connection = mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['db']);