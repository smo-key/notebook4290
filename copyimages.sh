#!/bin/bash 
GIT_REPO=/home/ehsan/notebook4290
PUBLIC_WWW=/var/www/html/notebook
cd $PUBLIC_WWW
cp -r img/ $GIT_REPO/img
cd $GIT_REPO
git add --all
git commit -m "[Script] Added images"
git push origin master
echo Copied Images!
exit
