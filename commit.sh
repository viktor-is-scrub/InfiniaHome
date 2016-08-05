#!/bin/bash

echo -e "Welcome to the InfiniaPress Commit Tool!\n"

echo -e "This should make your life easier. You just simply have to type your commit message and it handles the rest\n"

echo -e "This cannot resolve conflicts. Fix the conflicts yourself\n"


if [ "$1" = "--push" ];
  then
    echo "Ok. I will push your changes as well"
  fi

echo "Adding all files to git"

git add -A

echo "Please enter your commit message: "

read commmsg

echo "Your commit message is ${commmsg}. Is this correct? [Y/n]:"

read yn
case $yn in
    [Yy]* ) echo -e "Ok, I am committing your files to git\n"; git commit -a -m "$commmsg"; break; exit;;
    [Nn]* ) echo -e "Please enter your commit message again: "; read commmsg;;
    * ) echo "Please answer yes or no.";;
esac

echo "Ok. I shall now commit your files to git"

git commit -a -m "$commmsg"

exit
