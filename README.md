# CryptoTracker // Fanwave

## Getting Started
### Requirements
- This app requires Docker Desktop to run
- You will need the `docker-compose` command line utility

### Booting the App
- Clone the git repository into your local system
- Navigate to the root folder (the folder where this README is located)
- Run `docker-compose up --detach` to build the images and launch the development environment
- (optional) if docker compose is unavailable, this MonoRepo consists of two separate sets of code, one for a nuxt application and another for a Laravel application. These can alternatively be booted individually per their respective documentation.

## Usage


## TODO:
- Probably don't actually need a copy of the backend vendor folder on host machine.... modify `docker-compose.yml` volumes
- Implement caching
- CORS?
- Xdebug
- PHPUnit
- PHPStan

## Interesting
- No Artisan on host machine due to PHP not being installed
- Develop the API endpoints using postman? Depends if the responses are routed in Laravel based on `accepts` header (probably yes?)

## Supporting Documentation
### CoinGecko Docs
https://docs.coingecko.com/reference/introduction
