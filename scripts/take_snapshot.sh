#!/bin/sh

. ./config.sh

FNAME="snapshot_$(date +%s).sql"

echo "Snapshotting Wordpress DB to $FNAME"

MYSQLDUMP=`which mysqldump`
if [ -z "$MYSQLDUMP" ]; then
  MYSQLDUMP="/Applications/MAMP/Library/bin/mysqldump"
fi
if [ -z "$MYSQLDUMP" ]; then
  echo "mysqldump not found!";
  exit;
fi

$MYSQLDUMP -h $DBHOST -u $DBUSER -p$DBPASS $DBNAME > $DBFOLDER/$FNAME

if [ -f "$DBFOLDER/snapshot.sql" ]; then
  rm $DBFOLDER/snapshot.sql
fi

ln -s $FNAME $DBFOLDER/snapshot.sql
