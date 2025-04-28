# Student Management System

## Overview

The **Student Management System** is a web-based application developed using **CodeIgniter 3** and **PostgreSQL**. This application provides API endpoints to manage and view student data, including their enrolled program and associated subjects. The system is designed for ease of use and can be deployed on an Ubuntu server, with Docker support for easier containerized deployment.

### API Endpoints:
- **api/students** – Returns a JSON response containing a minimum of 10 students with each student's name and enrolled program clearly listed.
- **api/subjects** – Returns a JSON response listing all subjects associated with the Software Engineering program from Year 1 through 4.

## Features
- **API endpoint to view all students**.
- **API endpoint to view subjects related to the Software Engineering program**.

## Technologies Used
- **Backend**: CodeIgniter 3 (PHP framework)
- **Database**: PostgreSQL
- **Authentication**: CodeIgniter’s built-in authentication
- **Deployment**: Ubuntu Server on AWS, Docker (optional)
- **Containerization**: Docker (optional for ease of deployment)

## Installation & Setup

### Prerequisites
Before setting up the project, ensure you have the following installed:

- PHP 8.1+
- PostgreSQL
- Composer
- Git
- Docker (optional for containerized setup)

### Step 1: Clone the Repository
```bash
git clone https://github.com/witness376/student-management-api.git
cd student-management
Step 2: Install Dependencies
CodeIgniter 3 doesn't use Composer for installation, but you may use it for managing libraries. For now, ensure that your CodeIgniter 3 project is ready with the necessary dependencies. You may need to manually set up your composer.json if required.

Step 3: Environment Configuration
Copy the .env.example file to .env (if you don't have .env, create one).

Configure your database settings:

In application/config/database.php:

php
Copy code
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',  // Or use 'db' if you're using Docker
    'username' => 'postgres',
    'password' => 'Test@123',
    'database' => 'sma',
    'dbdriver' => 'postgre',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'autoinit' => TRUE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
For Docker deployment, use the following docker-compose.yml file to manage the PostgreSQL and PHP containers.

Step 4: Run Migrations (if using migrations)
If your application requires migrations, you can run them with the following command:

bash
Copy code
php index.php migrate
Note: In CodeIgniter 3, you may need to use an additional migration library to handle database migrations, as CodeIgniter does not natively support migrations in the same way as newer versions.

Step 5: Serve the Application Locally
To serve the application locally, simply run Apache or PHP's built-in server:

bash
Copy code
php -S localhost:8080 -t public
Visit: http://localhost:8080/

Docker Setup (Optional)
To run the application in Docker, follow these steps:

Step 1: Build Docker Containers
Ensure you have a Dockerfile and docker-compose.yml file in your project root directory. Here's an example docker-compose.yml file for the project:

yaml
Copy code
version: '3.7'

services:
  web:
    image: php:8.1-apache
    container_name: student_management_web
    volumes:
      - ./public:/var/www/html
    ports:
      - "8080:80"
    depends_on:
      - db
    environment:
      - DB_HOST=db
      - DB_PORT=5432
      - DB_DATABASE=sma
      - DB_USERNAME=postgres
      - DB_PASSWORD=Test@123

  db:
    image: postgres:latest
    container_name: student_management_db
    environment:
      POSTGRES_USER: postgres
      POSTGRES_PASSWORD: Test@123
      POSTGRES_DB: sma
    volumes:
      - ./data:/var/lib/postgresql/data
    ports:
      - "5432:5432"
Step 2: Build and Start the Containers
bash
Copy code
docker-compose up -d
Step 3: Access the Application
After Docker containers are up and running, you can access the application at http://localhost:8080/.

Deployment on AWS
Security Group Configuration
Ensure the following ports are open in your AWS security group:

Port 22 (SSH)

Port 80/443 (HTTP/HTTPS for web access)

Running the App in Production
Install Apache on your server.

Configure Apache to point to the public directory of your project.

Example Apache configuration:

apache
Copy code
<VirtualHost *:80>
    DocumentRoot /var/www/html/student-management-api/public
    ServerName your-aws-instance-ip

    <Directory /var/www/html/student-management-api/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
### Backup Strategies

## Full Backup
**How it works:**  
> Copies **all data** every time a backup is made.

- ✅ Advantages:  
  Easy and straightforward to restore.

- ❌ Disadvantages:  
  Requires the **most time** and **largest storage** capacity.

---

## Incremental Backup
**How it works:**  
> Backs up **only the data changed** since the **last backup** (whether full or incremental).

- ✅ **Advantages:**  
  Efficient in terms of **time** and **storage**.

- ❌ **Disadvantages:**  
  Restoring is **complex**—you need the last full backup and **all incremental backups** made since.

---

## Differential Backup
**How it works:**  
> Backs up **all changes** made since the **last full backup**.

- ✅ **Advantages:**  
  **Faster restore** process compared to incremental backups.

- ❌ **Disadvantages:**  
  Requires **more storage** than incremental, but less than full backups.

---
Developed by Witness

License
This project is licensed under the MIT License.

Author: Witness
Date: April 2025
