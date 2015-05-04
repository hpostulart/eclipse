#!/bin/sh

. ./config.sh

SNAPSHOT_FILE=${1:-'snapshot.sql'}

MYSQL=`which mysql`
if [ -z "$MYSQL" ]; then
  MYSQL="/Applications/MAMP/Library/bin/mysql"
fi
if [ -z "$MYSQL" ]; then
  echo "mysql not found!";
  exit;
fi

if [ -f "$DBFOLDER/$SNAPSHOT_FILE" ]; then
  echo "Restoring Wordpress SQL database snapshot"
  read -p "Are you sure you want to do this? This will overwrite your existing DB! [yN] " yn
  case $yn in
    [Yy]* ) $MYSQL -h $DBHOST -u $DBUSER -p$DBPASS $DBNAME < $DBFOLDER/$SNAPSHOT_FILE; echo "Done!"; break;;
    * ) echo "Aborting"; exit;;
  esac
else
  echo "ERROR: No $SNAPSHOT_FILE file found."
fi

