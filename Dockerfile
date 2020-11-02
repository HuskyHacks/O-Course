FROM php:7.1.2-apache
RUN useradd flagDepartmentOfeXternalAffairs
RUN useradd -m bashful
RUN touch /home/bashful/flag{web_shellz_best_shellz}
RUN docker-php-ext-install mysqli
