#!/bin/sh
# ------------------------------------------------    
# reset & init database
# ------------------------------------------------    

echo "Rollback Database"
php spark migrate:rollback

echo "Migrate Database"
php spark migrate    

echo "Seeding Database"
php spark db:seed CoreSeeder