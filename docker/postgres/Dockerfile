FROM postgres:9.6.1
ENV POSTGRES_DB treeview
ENV POSTGRES_PASSWORD postgres

RUN mkdir -p /tmp/psql_data/

#COPY ./structure.sql /tmp/psql_data/structure.sql

COPY ./init_docker_postgres.sh /docker-entrypoint-initdb.d/
