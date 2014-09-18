#!/bin/bash 
GIT_REPO=/home/ehsan/notebook4290
PUBLIC_WWW=/var/www/html/notebook
cd $PUBLIC_WWW
cp -r img/ $GIT_REPO
cd $GIT_REPO
git add --all
git commit -m "[Image Uploader] Added $0"
git push origin master
echo Copied Images!
exit
