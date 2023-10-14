FROM php:8.2-fpm 

# Install environment dependencies
RUN apt-get update \
	# gd
	&& apt-get install -y build-essential openssl libfreetype6-dev libjpeg-dev libpng-dev libwebp-dev zlib1g-dev libzip-dev gcc g++ make unzip curl jpegoptim optipng pngquant gifsicle locales libonig-dev 
RUN docker-php-ext-configure gd  \
	&& docker-php-ext-install gd 
# gmp
RUN apt-get install -y --no-install-recommends libgmp-dev \
	&& docker-php-ext-install gmp 
# pdo
RUN docker-php-ext-install pdo 
# pdo_mysql
RUN docker-php-ext-install pdo_mysql 
#redis
RUN apt-get install -y \
    && pecl install redis \
    && docker-php-ext-enable redis
#mbstring
RUN docker-php-ext-install mbstring  
# opcache
RUN docker-php-ext-enable opcache 
# exif
RUN docker-php-ext-install exif \
    && docker-php-ext-install sockets \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install bcmath 
# zip
RUN docker-php-ext-install zip \
	&& apt-get autoclean -y \
	&& rm -rf /var/lib/apt/lists/* \
	&& rm -rf /tmp/pear/

EXPOSE 9000
CMD ["php-fpm"]