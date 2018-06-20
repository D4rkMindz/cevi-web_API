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

## Todos
- create setup script
- replace IDs with Hashes
- individualize permission handling