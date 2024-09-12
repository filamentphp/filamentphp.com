#!/bin/bash

set -e

base=$(pwd)
doctum=${base}/build/doctum

if [ ! -f ${base}/composer.json ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

cd $doctum
composer install

# Cleanup Before
rm -rf ${doctum}/build
rm -rf ${doctum}/cache
rm -rf ${doctum}/filament

# Run API Docs
git clone git@github.com:filamentphp/filament.git ${doctum}/filament

${doctum}/vendor/bin/doctum.php update ${doctum}/doctum.php -v --ignore-parse-errors

# Delete old directory before copying new one
rm -rf ${base}/public/api

# Copy new docs to public path
cp -R ${doctum}/build ${base}/public/api

# Cleanup After
rm -rf ${doctum}/build
rm -rf ${doctum}/cache
rm -rf ${doctum}/filament