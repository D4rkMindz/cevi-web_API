FROM php:7.2-apache
MAINTAINER Björn Pfoster

# Set frontend as noninteractive
ENV DEBIAN_FRONTEND=noninteractive
ENV DATE_TIMEZONE=Europe/Zurich
ENV APACHE_DOCUMENT_ROOT=/var/www/htdocs

# Install requirements
RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y apache2
RUN apt-get install -y zip unzip

# Install PHP requirements
#RUN apt-get install -y php7.2 libapache2-mod-php7.2 php7.2-mysql php7.2-curl php7.2-gd php7.2-intl php7.2-mbstring php-gettext
#RUN apt-get install -y nodejs npm composer vim curl ftp
#RUN apt-get update


# Enable php short tags
RUN sed -i "s/short_open_tag\ \=\ Off/short_open_tag\ \=\ On/g" /usr/local/etc/php/php.ini

## Set PHP timezone
#RUN /bin/sed -e "s/\;date\.timezone\ \=/date\.timezone\ \=\ ${DATE_TIMEZONE}/" /etc/php/7.0/apache2/php.ini

# Enable PHP
RUN a2enmod php7.2
RUN a2enmod rewrite

# Add apache configuration
ADD config/apache/apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# Start apache
RUN  /usr/sbin/apachectl -DFOREGROUND -k start &>/dev/null

# Start mysql
#RUN /usr/bin/mysqld_safe -h 127.0.0.1 -u root --timezone=$DATE_TIMEZONE&

# Create required database
#RUN mysql -u root -e "CREATE DATABASE cevi_web;exit;"

#RUN cd config && ../vendor/bin/phinx migrate

# Copy repo into correct place
RUN mkdir /var/www/htdocs
COPY . /var/www/htdocs
WORKDIR /var/www/htdocs

# Copy configuration file
RUN cp /var/www/htdocs/config/env.example.php /var/www/env.php

# Expose http & mysql server
EXPOSE 80
EXPOSE 3306

VOLUME /var/www/htdocs
VOLUME /var/log/httpd
VOLUME /var/lib/mysql
VOLUME /var/log/mysql
VOLUME /etc/apache2