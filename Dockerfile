FROM php:7.1.2-apache
RUN useradd flag{DepartmentOfeXternalAffairs}
RUN docker-php-ext-install mysqli

