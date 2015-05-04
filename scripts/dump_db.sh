#!/bin/sh

. ./config.sh

echo "Dumping latest Wordpress DB"

FNAME="$DBNAME-$(date +%s).sql"

MYSQLDUMP=`which mysqldump`
if [ -z "$MYSQLDUMP" ]; then
  MYSQLDUMP="/Applications/MAMP/Library/bin/mysqldump"
fi
if [ -z "$MYSQLDUMP" ]; then
  echo "mysqldump not found!";
  exit;
fi

$MYSQLDUMP -h $DBHOST -u $DBUSER -p$DBPASS $DBNAME > $DBFOLDER/$FNAME

if [ -f "$DBFOLDER/latest.sql" ]; then
  rm $DBFOLDER/latest.sql
fi

ln -s $FNAME $DBFOLDER/latest.sql