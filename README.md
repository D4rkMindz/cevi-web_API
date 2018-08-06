# CEVI Web API

[![Build Status](https://travis-ci.org/D4rkMindz/cevi-web_API.svg?branch=master)](https://travis-ci.org/D4rkMindz/cevi-web_API)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/D4rkMindz/cevi-web_API/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/D4rkMindz/cevi-web_API/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/D4rkMindz/cevi-web_API/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/D4rkMindz/cevi-web_API/?branch=master)

## Description

CEVI Web is hosted on [cevi-web.com](https://cevi-web.com).
This Project is the backend of CEVI Web.
To report any issues, please use the [GitHub Issue Tracker](https://github.com/D4rkMindz/cevi-web_API/issues)
If you encounter any security related issues, please don't hesitate to contact me [contact@cevi-web.com](mailto:contact@cevi-web.com?subject=Security%20related%20issue)

## Installation

An application MVC template with Slim and CakePHP QueryBuilder.

`config/` configuration files
`public/` web server files (with index.php and .htaccess)
`templates/` template files
`resources/` other resource files
`src/` PHP source code (The App namespace)
`tests/` test code
`tmp/` - temporary files (logfiles, cache)

Run composer install to setup the Project. Afterwards you have to rename the `config/env.example.php` file to 
`config/env.php` and  fill in your data.

You also have to insert a database named like the $config['dbconfig']['database'] value in `config/defaults.php`. You can 
rename this value to any name you like.

To setup the database, there is a script (TODO) in the `bin/` directory.

Afterwards you can start your local Apache Server with [XAMPP](https://www.apachefriends.org/index.html).
To visit your Website you have to open http://localhost/<project_directory>/.

## Deployment

To deploy the application, you need a ant.<environment>.properties file in the config folder. The environment is either test, staging or production.
For each environment, you MUST define (in the ant.<environment>.properties file) 
 - The host (as IP-address)
 - The FTP user that has read, write and execute access for the directory
 - The password for the FTP user
 - The directory of your webserver where the application should be installed

```
build.ftp.host=127.0.0.1
build.ftp.username=root
build.ftp.password=mysupersecurepasswordthatisshouldnotcommit
build.ftp.dir=/var/www/the/directory/to/install
```

After adding the properties correctly, you can now execute the deployment command. It takes the master branch and prepares it in a zip-file for the deployment.

```bash
d4rkmindz@linux: $ ant deploy
```
After executing this command you will see a prompt to enter the environment to deploy to.
Either enter test, staging or prod. Entering test will use the config/ant.test.properties file for the FTP credentials.
```
deploy:
    [input] Which config should be used? (test, staging, prod)
    <type here the required environment to deploy to>
```

After that, the automated deployment is finished.

## Todos
- create setup script
- replace IDs with Hashes
- Return hashes after create !IMPORTANT
- individualize permission handling