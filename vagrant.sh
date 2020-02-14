#!/bin/bash

# Vagrant up, halt, ssh from any directory
# Vagrant halt all boxes with one command

if [[ -z ${1+x} || -z ${2+x} ]]; then
  echo 'Missing argument/s'
  echo 'Usage: bash vagrants.sh vagrantCommand vagrantBoxAlias | example: v l55 up '
  exit
fi

COMMAND='vagrant '$2

echo '-----------------------------------------'
echo ' Running...' $COMMAND $1   
echo '-----------------------------------------'

if [ $1 == 'all' ]; then
   if [[ $COMMAND == 'vagrant halt' ]]; then
       cd ~/vagrants/lemp559 && vagrant halt
       cd ~/vagrants/lemp56 && vagrant halt
       cd ~/vagrants/lamp53 && vagrant halt
       cd ~/Homestead && vagrant halt	
   fi 
   exit;
elif [ $1 == 'l55' ]; then		
  cd ~/vagrants/lemp559 && $COMMAND
elif [ $1 == 'x' ]; then
  cd ~/vagrants/xenial && $COMMAND
elif [ $1 == 'h' ]; then
  cd ~/Homestead && $COMMAND
elif [ $1 == 'lamp53' ]; then
  cd ~/vagrants/lamp53 && $COMMAND
else 
  echo 'Error: Vagrant box not found.'
  exit;
fi
