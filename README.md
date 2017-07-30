# CareNet - Care Home Management

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0627b924-19fc-4a12-a23c-33271e47475b/big.png)](https://insight.sensiolabs.com/projects/0627b924-19fc-4a12-a23c-33271e47475b)

[![Unit Tests](https://travis-ci.org/ayanozturk/carenet.svg?branch=master)](https://travis-ci.org/ayanozturk/carenet)
[![Coverage](https://coveralls.io/repos/github/ayanozturk/carenet/badge.svg)](https://coveralls.io/github/ayanozturk/carenet)
[![Dependency Status](https://www.versioneye.com/user/projects/597cf8e40fb24f003ad078b3/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/597cf8e40fb24f003ad078b3)

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
