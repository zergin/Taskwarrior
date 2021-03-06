#!/bin/bash

TASKWARRIOR=$1

[ -d build ] || mkdir build

if [ -f build/taskwarrior-$TASKWARRIOR ]
  then
    exit;
fi

cd build
wget http://taskwarrior.org/download/task-$TASKWARRIOR.tar.gz || exit
gunzip task-$TASKWARRIOR.tar.gz
tar xf task-$TASKWARRIOR.tar
cd task-$TASKWARRIOR
cmake -DCMAKE_BUILD_TYPE=release .
make
cd ..
cp task-$TASKWARRIOR/src/task ./taskwarrior-$TASKWARRIOR
sudo rm -Rf task-$TASKWARRIOR*
cd ..