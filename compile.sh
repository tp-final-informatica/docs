#!/bin/bash

filenames=`ls ./src/*.php`
for eachfile in $filenames
do
  IN=$eachfile
  arrIN=(${IN//./ })
  arrIN2=(${arrIN[0]//\// })
  pageName=${arrIN2[1]}
  php $eachfile > docs/$pageName.html
done