# Graffiti's messages service
A simple post message REST API for the Graffiti project

# Run locally
1. `chmod +x ops/build.sh`;
2. `./ops/build.sh`;

## Development
To persist changes in the Entities models in the database run
```sh
php bin/console make:migration
```