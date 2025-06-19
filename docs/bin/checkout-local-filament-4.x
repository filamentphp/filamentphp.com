#!/bin/bash

DOCS_VERSIONS=(
    1.x
    2.x
    3.x
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ ! -d "filament/$v" ]; then
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" git@github.com:filamentphp/filament.git "filament/$v"
    fi;
done

rm -rf filament/4.x
ln -sf ../../../filament filament/4.x
