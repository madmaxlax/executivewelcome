#!/bin/bash
set -o verbose
git add ./*
git commit -m "$0"
./git push -u origin master 
chocmilk
