<?php
$config = [];
$config['db']['database'] = "cevi_web_test";
$config['db']['username'] = "root";
$config['db']['password'] = "travis_passwd";
$config['db']['port'] = 3306;
$config['db']['host'] = 'localhost';
$config['db']['mysql_executable'] = 'mysql';
$config['db']['mysqldump_executable'] = 'mysqldump';
$config['db']['host'] = 'localhost';

$config['jwt']['active'] = true;
return $config;