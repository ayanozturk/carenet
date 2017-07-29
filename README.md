# CareNet - Care Home Management

[![Unit Tests](https://travis-ci.org/ayanozturk/carenet.svg?branch=master)](https://travis-ci.org/ayanozturk/carenet)
[![Coverage](https://coveralls.io/repos/github/ayanozturk/carenet/badge.svg)](https://coveralls.io/github/ayanozturk/carenet)

## Install and run

    docker-compose up -d
    docker-compose exec carenet composer install -o
    
Visit http://localhost:9001/

## Tests

### Behat
Configure browserstack credentials:

    export BROWSERSTACK_USERNAME=YOUR_USERNAME
    export BROWSERSTACK_ACCESS_KEY=YOUR_ACCESS_KEY
    
Run tests using Browserstack and development environment

    docker-compose exec carenet vendor/bin/behat -p development
    
Run tests using selenium and docker environment

    docker-compose exec carenet vendor/bin/behat -p docker
