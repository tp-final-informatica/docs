#!/bin/bash

filenames=`ls ./src/*.php`
for eachfile in $filenames
do
  IN=$eachfile
  arrIN=(${IN//./ })
  arrIN2=(${arrIN[0]//\// })
  pageName=${arrIN2[1]}
  php $eachfile "$1" > docs/$pageName.html
done

filenames=`ls ./src/core/*.php`
for eachfile in $filenames
do
  IN=$eachfile
  arrIN=(${IN//./ })
  arrIN2=(${arrIN[0]//\// })
  pageName=${arrIN2[2]}
  php $eachfile "$1" > docs/core/$pageName.html
done