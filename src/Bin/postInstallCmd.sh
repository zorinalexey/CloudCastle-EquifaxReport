#!/usr/bin/bash

dir=$(pwd)/src/Bin//uidgen_src
cd $dir
make
cd ../
cp $(pwd)/uidgen_src/uidgen $(pwd)/uidgen
rm $(pwd)/uidgen_src/uidgen
rm $(pwd)/uidgen_src/*.o
chmod 777 $(pwd)/uidgen
