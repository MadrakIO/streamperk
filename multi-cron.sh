#!/bin/bash
CONFIGURATION_FILES="./app/config/multisite/*.yml"
for f in $CONFIGURATION_FILES
do
    filename=$(basename "$f")
    environment="${filename%.*}"

    echo "Running User Group Refresh for $environment"
    app/console streamperk:core:usergroupuser:refresh --env=$environment

    echo "Running Brane Bot Prestige Level Refresh for $environment"
    app/console streamperk:integration:branebot:prestige --env=$environment

    echo "Running Discord Group Assignment Refresh for $environment"
    app/console streamperk:integration:discord:groups --env=$environment

    echo "Running Discord Verification for $environment"
    app/console streamperk:integration:discord:verify --env=$environment

    echo "Running Tip Retrieval for $environment"
    app/console streamperk:tip:retrieve --env=$environment
done
