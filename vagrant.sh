#! /bin/bash

if [[ !$1 || !$2 ]]; then
  echo 'Missing argument/s'
  echo 'Usage: sh vagrants.sh vagrantBoxAlias vagrantCommand'
  exit
fi

if [[ $1 == 't64' ]]; then
  cd ~/vagrants/trusty64nameeeeeeeeeeeeeeeee
elif [[ $1 == 't32' ]]; then
  cd ~/vagrants/trusty32nameeeee
elif [[ $1 == 'homestead' ]]; then
  cd ~/Homestead
else 
  echo 'Error: Vagrant box not found.'
  exit;
fi

if [[ $2 == 'u' ]]; then
  echo "vagrant up ($1)" 
  vagrant up
elif [[ $2 == 'h' ]]; then
  echo "vagrant halt ($1)"
  vagrant halt
elif [[ $2 == 's' ]]; then
  echo "vagrant ssh ($1)"
  vagrant ssh
else
  echo "Error: Command ($2) does not exist."
  exit
fi
  
