# CryptoTracker // Fanwave

## Getting Started
### Requirements
- This app requires Docker Desktop to run
- You will need the `docker-compose` command line utility
- You will need a CoinGecko API key available from https://www.coingecko.com/en/developers/dashboard

### Booting the App
- Clone the git repository into your local system
- Navigate to the root folder (the folder where this README is located)
- Copy the `/backend/.example.env` file to `/backend/.env` and add your API key to `COIN_GECKO_API_KEY` variable.
- Run `docker-compose up --detach` to build the images and launch the development environment
  - Note: The first launch will take a few minutes while the images are built from scratch
- (optional / alternative) if docker compose is unavailable, this MonoRepo consists of two separate sets of code, one for a nuxt application and another for a Laravel application. These can alternatively be booted individually per their respective documentation.
  - Note: You will need to provide the `.env` variables to the frameworks

## Usage


## TODO:
- Probably don't actually need a copy of the backend vendor folder on host machine.... modify `docker-compose.yml` volumes
- Implement caching
- CORS?
- Xdebug
- PHPUnit
- PHPStan
- Swagger Documentation
- Vitest
- Take another look at the permissions issue related to docker volumes overwriting `www-data` in the containers
- PSR-12
- Implement currency search feature
- Separate vue components for table cells and header cells for DRY

## AI Usage
### ChatGPT
Used for 'consultancy' - where I know what I am trying to achieve but not the syntax required to get me there. E.G: Initial Dockerfile outlines, how to do various things in Laravel etc etc. 

## Interesting
- No Artisan on host machine due to PHP not being installed
- Develop the API endpoints using postman? Depends if the responses are routed in Laravel based on `accepts` header (probably yes?)

## Supporting Documentation
### CoinGecko Docs
https://docs.coingecko.com/reference/introduction

### Technical Task Brief
The brief for this task can be found as a PDF in the `/docs` folder in the route of this project
