#!/bin/sh

. ./config.sh

IMPORT_FILE=${1:-'latest.sql'}

MYSQL=`which mysql`
if [ -z "$MYSQL" ]; then
  MYSQL="/Applications/MAMP/Library/bin/mysql"
fi
if [ -z "$MYSQL" ]; then
  echo "mysql not found!";
  exit;
fi

if [ -f "$DBFOLDER/$IMPORT_FILE" ]; then
  echo "Importing latest Wordpress SQL database"
  read -p "Are you sure you want to do this? This will overwrite your existing DB! [yN] " yn
  case $yn in
    [Yy]* ) $MYSQL -h $DBHOST -u $DBUSER -p$DBPASS $DBNAME < $DBFOLDER/$IMPORT_FILE; echo "Done!"; break;;
    * ) echo "Aborting"; exit;;
  esac
else
  echo "ERROR: No $IMPORT_FILE file found."
fi
