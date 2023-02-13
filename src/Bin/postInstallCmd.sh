#! /usr/bin/bash

cd src/Bin/uidgen_src
make
cp src/Bin/uidgen_src/uidgen src/Bin/uidgen
rm src/Bin/uidgen_src/*.o
rm src/Bin/uidgen_src/uidgen
