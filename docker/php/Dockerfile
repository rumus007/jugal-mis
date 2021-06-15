FROM php:8.0-fpm

ENV APP_HOME /home/jugal/web/current
ARG USER_ID=1040
ARG GROUP_ID=1041

# reset www-data uuid for matching host user uuid

RUN userdel -f www-data &&\
    if getent group www-data ; then groupdel www-data; fi &&\
    groupadd -g ${GROUP_ID} www-data &&\
    useradd -l -u ${USER_ID} -g www-data www-data

# install all the dependencies and enable PHP modules
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN rm -rf /var/lib/apt/lists/partial && apt-get update -o Acquire::CompressionTypes::Order::=gz \
    && apt-get update && apt-get upgrade -y && apt-get install -y \
      procps \
      nano \
      git \
      unzip \
      zip \
      libicu-dev \
      zlib1g-dev \
      libxml2 \
      libxml2-dev \
      libreadline-dev \
      libzip-dev \
      libpq-dev \
      libpng-dev \
      pear-channels \
      libjpeg-dev \
      iputils-ping \
      supervisor \
      cron \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
      libgd-dev \
    && pecl channel-update pecl.php.net \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include \
    && docker-php-ext-install gd \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      bcmath \
      intl \
      pcntl \
      soap \
      zip && \
      rm -fr /tmp/* && \
      rm -rf /var/list/apt/* && \
      rm -r /var/lib/apt/lists/* && \
      apt-get clean

RUN pecl channel-update https://pecl.php.net/channel.xml \
    && pecl install swoole

# create document root
RUN mkdir -p $APP_HOME

# change owner
RUN chown -R www-data:www-data $APP_HOME

# put php config dir for Laravel
RUN mkdir -p /usr/local/etc/php-fpm.d/

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer


# set working directory
WORKDIR $APP_HOME

# create composer folder for user www-data
RUN mkdir -p /var/www/.composer 
RUN chmod -R 777 /var/www/.composer

USER www-data
