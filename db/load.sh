#!/bin/sh

BASE_DIR=$(dirname $(readlink -f "$0"))
if [ "$1" != "test" ]
then
    psql -h localhost -U cursoline -d cursoline < $BASE_DIR/cursoline.sql
fi
psql -h localhost -U cursoline -d cursoline_test < $BASE_DIR/cursoline.sql
