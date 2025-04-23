#!/bin/bash

TIMESTAMP=$(date +%F)
BACKUP_DIR="/home/ubuntu/backups"
LOG_FILE="/var/log/backup.log"

mkdir -p $BACKUP_DIR

# API backup
tar -czf $BACKUP_DIR/api_backup_$TIMESTAMP.tar.gz /var/www/html/student-management-api
# PostgreSQL DB backup
PGPASSWORD='Test@123' pg_dump -U postgres -h localhost sma > $BACKUP_DIR/db_backup_$TIMESTAMP.sql

# Delete backups older than 7 days
find $BACKUP_DIR -type f -mtime +7 -exec rm {} \;

# Logging
if [ $? -eq 0 ]; then
  echo "[$(date)] Backup successful" >> $LOG_FILE
else
  echo "[$(date)] Backup failed" >> $LOG_FILE
fi
