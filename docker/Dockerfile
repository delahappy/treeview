FROM ubuntu:16.04

ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install package containing add-apt-repository utility
RUN apt-get update && apt-get install -y software-properties-common python-software-properties

# Add PPA repository for PHP7.1
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 4F4EA0AAE5267A6C

RUN apt-get update && apt-get install -y \
    apache2 \
    libapache2-mod-shib2 \
    git \
    zip \
    unzip \
    php7.1 \
    libapache2-mod-php7.1 \
    php7.1-mcrypt \
    php7.1-gd \
    php7.1-mbstring \
    php7.1-pgsql \
    php7.1-xml \
    php7.1-dev \
    curl \
    php7.1-curl \
    php-xdebug \
    ntpdate \
    libaio1 \
    build-essential

RUN a2enmod rewrite
RUN a2enmod ssl
RUN openssl genrsa -des3 -passout pass:x -out /etc/apache2/server.pass.key 2048
RUN openssl rsa -passin pass:x -in /etc/apache2/server.pass.key -out /etc/apache2/server.key
RUN rm /etc/apache2/server.pass.key
RUN openssl req -new -key /etc/apache2/server.key -out /etc/apache2/server.csr -subj "/C=US/ST=NC/L=Charlotte/O=CCITSO/CN=cci-devvm-tj-app.uncc.edu"
RUN openssl x509 -req -sha256 -days 365 -in /etc/apache2/server.csr -signkey /etc/apache2/server.key -out /etc/apache2/server.crt


RUN echo "zend_extension=/usr/lib/php/20151012/xdebug.so" >> /etc/php/7.1/apache2/php.ini
RUN echo "xdebug.remote_enable=1" >> /etc/php/7.1/apache2/php.ini
RUN echo "xdebug.remote_host=192.168.1.11" >> /etc/php/7.1/apache2/php.ini
RUN echo "xdebug.remote_enable=on" >> /etc/php/7.1/apache2/php.ini
RUN echo "xdebug.remote_autostart=off" >> /etc/php/7.1/apache2/php.ini
RUN echo "xdebug.remote_port=9000" >> /etc/php/7.1/apache2/php.ini


COPY start.sh /start.sh
RUN chmod +x /start.sh

#COPY ./ /var/www/html
COPY ./config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./config/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf
RUN a2ensite default-ssl.conf



CMD ["bash", "/start.sh"]