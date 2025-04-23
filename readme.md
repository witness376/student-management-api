# Student Management

## Overview
The Student Management System is a web-based application developed using **CodeIgniter 3** and **PostgreSQL**. The application provides API endpoints:
- **api/students** – returns a JSON response containing a minimum of 10 students with each student's name and enrolled program clearly listed.
- **api/subjects** – returns a JSON response listing all subjects associated with the Software Engineering program from Year 1 through 4.

## Features
- API endpoint to view all students.
- API endpoint to view subjects related to the Software Engineering program.

## Technologies Used
- **Backend**: CodeIgniter 3 (PHP framework)
- **Database**: PostgreSQL
- **Authentication**: CodeIgniter’s built-in authentication (or Shield if using modular auth)
- **Deployment**: Ubuntu Server on AWS

## Installation & Setup

### Prerequisites
- PHP 8.1+
- PostgreSQL
- Composer
- Git

### Step 1: Clone the Repository
```bash
git clone https://github.com/witness376/student-management-api.git
cd student-management
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Environment Configuration
Rename `.env.example` to `.env` and configure your database credentials:
```dotenv
database.default.hostname = localhost
database.default.database = sma
database.default.username = postgres
database.default.password = Test@123
database.default.DBDriver = Postgre
```

### Step 4: Run Migrations (if using migrations)
```bash
php spark migrate
```

### Step 5: Serve the Application Locally
```bash
php spark serve
```

Visit: `http://localhost:8080/`

## Deployment on AWS
### Security Group Configuration
Allow traffic on:
- **Port 22** (SSH)
- **Port 80/443** (HTTP/HTTPS for web access)

### Running the App in Production
- Use Apache or Nginx as the web server.
- Point the web server to the `public` directory.

Example Nginx config:
```nginx
server {
    listen 80;
    server_name http://13.61.73.230/;
    root /var/www/html/student-management-api;

    index index.php index.html;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

## Contribution
Contributions are welcome! Feel free to submit a pull request.

## License
This project is licensed under the MIT License.


# Backup Strategies

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

