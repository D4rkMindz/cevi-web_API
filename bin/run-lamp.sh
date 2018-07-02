#!/bin/bash

# enable php short tags:
/bin/sed -i "s/short_open_tag\ \=\ Off/short_open_tag\ \=\ On/g" /etc/php/7.2/apache2/php.ini

# Set PHP timezone
/bin/sed -i "s/\;date\.timezone\ \=/date\.timezone\ \=\ ${DATE_TIMEZONE}/" /etc/php/7.0/apache2/php.ini

# Uncomment to quieten logging
# /bin/sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.2/apache2/php.ini


# Run Apache
if [ $LOG_LEVEL == 'debug' ]; then
    /usr/sbin/apachectl -DFOREGROUND -k start -e debug
else
    &>/dev/null /usr/sbin/apachectl -DFOREGROUND -k start
fi