#!/bin/bash

if [ $# != 2 ]; then
    echo "Syntax: match_files.sh <DIR1> <DIR2>"
    exit;
fi

DIR1=$1
DIR2=$2

echo "Comparing files under $DIR1 against $DIR2"

cd "$DIR1"

FILELIST=$(find -type f |grep -v '.svn')

cd ..

for filename in $FILELIST
do
    checkfile="$DIR2/$filename"
    if [[ ! -a $checkfile ]]; then
        echo "$checkfile does not exist"
    fi
done
