#!/bin/bash

# this script is run when the docker container is built
# it imports the base database structure and create the database for the tests

DATABASE_NAME="treeview"
#DB_DUMP_LOCATION="/tmp/psql_data/structure.sql"

echo "*** CREATING DATABASE ***"

#psql -U postgres "$DATABASE_NAME" < "$DB_DUMP_LOCATION";

echo "*** DATABASE CREATED! ***"
