#!/bin/sh

# Sync
cp ./README.md ./public/README.md
cd public
wget http://update.cz88.net/ip/copywrite.rar
axel -n8 http://update.cz88.net/ip/qqwry.rar
cd ..

# Deploy

mkdir ./public-git
cd ./public-git
git init
git config --global push.default matching
git config --global user.email "${GITHUB_EMAIL}"
git config --global user.name "${GITHUB_USER}"
git remote add origin https://${GITHUB_TOKEN}@github.com/SukkaW/qqwry-mirror.git
git pull origin gh-pages
rm -rf ./*
cp -rf ../public/* ./
git add --all .
DATE="$(echo $(date --rfc-2822))"
git commit -m "Sync success: $DATE"
git push --quiet --force origin HEAD:gh-pages