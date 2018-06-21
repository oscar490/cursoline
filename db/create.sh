#!/bin/sh

if [ "$1" = "travis" ]
then
    psql -U postgres -c "CREATE DATABASE cursoline_test;"
    psql -U postgres -c "CREATE USER cursoline PASSWORD 'cursoline' SUPERUSER;"
else
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists cursoline
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists cursoline_test
    [ "$1" != "test" ] && sudo -u postgres dropuser --if-exists cursoline
    sudo -u postgres psql -c "CREATE USER cursoline PASSWORD 'cursoline' SUPERUSER;"
    [ "$1" != "test" ] && sudo -u postgres createdb -O cursoline cursoline
    sudo -u postgres createdb -O cursoline cursoline_test
    LINE="localhost:5432:*:cursoline:cursoline"
    FILE=~/.pgpass
    if [ ! -f $FILE ]
    then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE
    then
        echo "$LINE" >> $FILE
    fi
fi
