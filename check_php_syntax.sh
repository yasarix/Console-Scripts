#!/bin/bash

if [ $# != 1 ]; then
    echo "Syntax: check_php_syntax.sh <PROJECTDIR>"
    exit;
fi

PROJECTDIR=$1

for i in $(find $PROJECTDIR -type f -name *.php)
do
    php -l "$i"
done
