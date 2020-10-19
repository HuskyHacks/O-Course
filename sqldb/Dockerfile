FROM mysql
ENV MYSQL_DATABASE webDb
COPY ./sql-scripts/ /docker-entrypoint-initdb.d/
EXPOSE 3306