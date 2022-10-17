#!/bin/bash
APP_USERNAME=${1}
PMA_PORT=${2}
APP_PORT=${3}
rm -rf docker-compose.yml
cat docker-compose.sample | sed -e 's/${APP_USERNAME}/'${APP_USERNAME}'/' | sed -e 's/${HOST_PORT}/'${APP_PORT}'/' | sed -e 's/${PMA_PORT}/'${PMA_PORT}'/' >> docker-compose.yml
run="docker-compose up -d --build"
echo $run
$run
