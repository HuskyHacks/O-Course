FROM php:7.1.2-apache
RUN useradd flagDepartmentOfeXternalAffairs
RUN docker-php-ext-install mysqli

