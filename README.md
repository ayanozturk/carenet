# CareNet - Care Home Management

## Tests

### Behat
Configure browserstack credentials:

    export BROWSERSTACK_USERNAME=YOUR_USERNAME
    export BROWSERSTACK_ACCESS_KEY=YOUR_ACCESS_KEY
    
Run tests using Browserstack and development environment

    docker-compose exec carenet vendor/bin/behat -p development
    
Run tests using selenium and docker environment

    docker-compose exec carenet vendor/bin/behat -p docker
