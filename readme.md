## Student Management System

### Overview

The Student Management System is a web-based application developed using **CodeIgniter 3** and **PostgreSQL**. It provides API endpoints to manage student data, including enrolled programs and related subjects. The system is lightweight, container-ready (via Docker), and deployable on an Ubuntu server.

---

### API Endpoints

* `api/students` – Returns a JSON list of **at least 10 students** with their names and enrolled programs.
* `api/subjects` – Returns a JSON list of **all subjects** under the Software Engineering program from **Year 1 to Year 4**.

---

### Features

* View all students.
* View subjects for the Software Engineering program.

---

### Technologies Used

* **Backend**: PHP (CodeIgniter 3)
* **Database**: PostgreSQL
* **Authentication**: CodeIgniter’s built-in auth
* **Deployment**: Ubuntu (optionally using Docker)
* **Containerization**: Docker (optional)

---

### Installation & Setup

#### Prerequisites

Ensure these are installed:

* PHP 8.1+
* PostgreSQL
* Git
* Composer *(optional for library management)*
* Docker *(optional)*

#### Step 1: Clone the Repository

```bash
git clone https://github.com/witness376/student-management-api.git
cd student-management-api
```

#### Step 2: Database Configuration

Edit `application/config/database.php`:

```php
$db['default'] = array(
    'hostname' => 'localhost', // or 'db' if using Docker
    'username' => 'postgres',
    'password' => '6438',
    'database' => 'student_record_db',
    'dbdriver' => 'postgre',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'pconnect' => FALSE,
    'db_debug' => TRUE
);
```

#### Step 3: Run the App

Use Apache or PHP built-in server:

```bash
php -S localhost -t public
```

Access it via [http://localhost](http://localhost)

---

### 🐳 Docker Setup (Optional)

**docker-compose.yml**

```yaml
version: '3.8'

services:
  web:
    build: .
    container_name: student_api
    ports:
      - "80:80"
    volumes:
      - .:/var/www/html
    depends_on:
      - db
    environment:
      - DB_HOST=db
      - DB_NAME=student_record_db
      - DB_USER=postgres
      - DB_PASS=6838
    networks:
      - student-net

  db:
    image: postgres:13
    container_name: student_db
    restart: always
    environment:
      POSTGRES_DB: student_record_db
      POSTGRES_USER: postgres
      POSTGRES_PASSWORD: 6438
    volumes:
      - postgres-data:/var/libpostgresql/data
    networks:
      - student-net

volumes:
  postgres-data:

networks:
  student-net:
```

To start:

```bash
docker-compose up -d
```

---

### 🚀 Deployment (AWS)

**Security Group Settings**

* Port 22 (SSH)
* Port 80 / 443 (HTTP/HTTPS)

**Apache Virtual Host Example**

```apache
<VirtualHost *:80>
    DocumentRoot /var/www/html/student-management-api/public
    ServerName your-aws-instance-ip

    <Directory /var/www/html/student-management-api/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

---

### 💾 Backup Strategies

| Type         | Description                                 | Pros                            | Cons                               |
| ------------ | ------------------------------------------- | ------------------------------- | ---------------------------------- |
| Full         | Backs up **everything** each time           | Easy to restore                 | Slowest, most storage needed       |
| Incremental  | Backs up **changes since last backup**      | Fast & efficient                | Complex to restore                 |
| Differential | Backs up **changes since last full backup** | Faster restore than incremental | Uses more storage than incremental |

---

**Author**: Witness
**Date**: April 2025

---

