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
//
//$env['displayErrorDetails'] = true;
//$env['isProduction'] = false;
//
//$env['jwt'] = [
//    'active' => false,
//    'secret' => 'superheavysecret',
//];
//
//$env['db'] = [
//    'database' => 'cevi_web_test',
//    'host' => 'localhost',
//    'port' => 3306,
//    'username' => 'root',
//    'password' => 'travis_passwd',
//];
//
//$env['mailgun'] = [
//    'from' => '',
//    'apikey' => '',
//    'domain' => '',
//];
return $config;