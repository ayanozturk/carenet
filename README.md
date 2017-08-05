# Expert - A hobby project

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0627b924-19fc-4a12-a23c-33271e47475b/big.png)](https://insight.sensiolabs.com/projects/0627b924-19fc-4a12-a23c-33271e47475b)

[![Unit Tests](https://travis-ci.org/ayanozturk/expert.svg?branch=master)](https://travis-ci.org/ayanozturk/expert)
[![Coverage](https://coveralls.io/repos/github/ayanozturk/expert/badge.svg)](https://coveralls.io/github/ayanozturk/expert)
[![Dependency Status](https://www.versioneye.com/user/projects/597cf8e40fb24f003ad078b3/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/597cf8e40fb24f003ad078b3)

## Install and run

    docker-compose up -d
    docker-compose exec expert composer install -o
    
Visit http://localhost:9001/

## Tests

### Behat
Configure browserstack credentials:

    export BROWSERSTACK_USERNAME=YOUR_USERNAME
    export BROWSERSTACK_ACCESS_KEY=YOUR_ACCESS_KEY
    
Run tests using Browserstack and development environment

    docker-compose exec expert vendor/bin/behat -p development
    
Run tests using selenium and docker environment

    docker-compose exec expert vendor/bin/behat -p docker
