#!/usr/bin/env bash

printf "Running startDatabase.sh\n"
bash startDatabase.sh

printf "Waiting 5 seconds to give database time to initialize.\n"
sleep 5

printf "Running startAppserver.sh\n"
bash startAppserver.sh