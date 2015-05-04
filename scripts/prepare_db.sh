#!/bin/sh

. ./config.sh

TARGET=${1:-'staging'}
SOURCE=${2:-'dev'}

OUTPUT_FILE="$DBFOLDER/$DBNAME-$TARGET.sql"

case $SOURCE in
  "staging")
    INPUT_FILE="$DBFOLDER/$DBNAME-staging.sql"
    ENGLISH_SOURCE_URL="https://$STAGINGHOST"
    ;;
  "production")
    INPUT_FILE="$DBFOLDER/$DBNAME-production.sql"
    ENGLISH_SOURCE_URL="https://$PRODUCTIONHOST"
    ;;
  "dev")
    INPUT_FILE="$DBFOLDER/latest.sql"
    ENGLISH_SOURCE_URL="http://$DBHOST"
    ;;
esac

case $TARGET in
  "staging")
    ENGLISH_URL="https://$STAGINGHOST"
    ;;
  "dev")
    ENGLISH_URL="http://$DBHOST"
    ;;
  "production")
    ENGLISH_URL="https://$PRODUCTIONHOST"
    ;;
esac

if [ -f "$INPUT_FILE" ]; then
  echo "Translating latest Wordpress $SOURCE SQL to $TARGET"
  read -p "Are you sure you want to do this? This will overwrite any existing $TARGET DB! [yN] " yn
  case $yn in
    [Yy]*)
        cat $INPUT_FILE | sed s/$ENGLISH_SOURCE_URL/$ENGLISH_URL/g > $OUTPUT_FILE
        echo "Done!"
        break;;
    *)
      echo "Aborting"
      exit;;
  esac

else
  echo "ERROR: $INPUT_FILE input file not found."
fi

