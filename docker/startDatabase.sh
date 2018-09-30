#!/usr/bin/env bash

printf "Killing any databases already running.\n"
docker kill database
cd postgres
printf "Building postgres image.\n"
docker build --rm -t local/postgres .
printf "Running postgres image.\n"
docker run -d --rm --name database -p 5432:5432 local/postgres