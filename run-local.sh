#!/bin/sh
rm -rf app/var/cache
rm -rf app/var/log
cp .env.default .env
cp .env.default app/.env
docker-compose up