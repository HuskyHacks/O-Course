FROM mysql
ENV MYSQL_DATABASE website
COPY ./sql-scripts/ /docker-entrypoint-initdb.d/
EXPOSE 3306