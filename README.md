mxit-sample-app-php
===================
  
This is a Sample Mxit application developed in PHP using the Laravel Framework - http://www.laravel.com/  
  
This application assumes you're using a MySQL database.  

This application demonstrates examples of the following features of the MXit API:  

+ Retrieving User Status
+ Updating User Status
+ Retrieving User Profile

You can view an example of this application in action by adding the following contact on Mxit: **sampleapp**
  
Database Preparation
====================
  
Log in to your MySQL client as an admin user and excute the following commands:  
  
<pre>
CREATE DATABASE sampleapp;
GRANT ALL PRIVILEGES ON sampleapp.* TO sampleapp@'localhost' IDENTIFIED BY 'sampleapp';
</pre>  
  
You can change the database name, username and password to whatever you like, but ensure that the database configuration file matches.  
  
application/config/database.php - contains the database configuration  
  
Running the Database Migration
==============================
  
Change directory to the mxit-sample-app-php root.  
  
<pre>
php artisan migrate:install
php artisan migrate
</pre>
