#!/usr/bin/bash

cd $(pwd)/uidgen_src
make
cd ../
cp $(pwd)/uidgen_src/uidgen $(pwd)/uidgen
rm $(pwd)/uidgen_src/uidgen
rm $(pwd)/uidgen_src/*.o
chmod 777 $(pwd)/uidgen
