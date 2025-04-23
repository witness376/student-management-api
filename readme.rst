🎓 Student Management API

## 📖 Overview

The **Student Management System** is a web-based application built using **CodeIgniter 3** and **MySQL**. It provides two RESTful API endpoints:

- `/api/students` – Returns a JSON response with at least 10 students, each with a name and enrolled program.
- `/api/subjects` – Returns a JSON response listing all subjects in the Software Engineering program, categorized by academic year (Year 1 to Year 4).

---

## ✨ Features

- ✅ View a list of students and their enrolled programs
- ✅ View subjects categorized by academic year for the Software Engineering program
- ✅ Lightweight and fast, powered by CodeIgniter 3

---

## 🧪 Technologies Used

- **Backend:** PHP (CodeIgniter 3)
- **Database:** MySQL
- **Deployment:** AWS EC2 (Ubuntu Server)
- **Version Control:** Git + GitHub
- **Web Server:** Apache2

---

## 🛠 Installation & Setup

### ⚙️ Prerequisites

- PHP >= 7.4
- MySQL
- Apache2
- Git

---

### 🔽 Step 1: Clone the Repository

```bash
$ git clone https://github.com/witness376/student-management-api.git
$ cd student-management-api
💾 Step 2: Configure Database
Create a new MySQL database named student_db (or your preferred name), and update your database credentials in:

application/config/database.php:

php
Copy
Edit
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'student_db',
'dbdriver' => 'mysqli',
Then import the provided SQL file or manually insert student and subject data.

🔧 Step 3: Configure Base URL
Open application/config/config.php and update:

php
Copy
Edit
$config['base_url'] = 'http://your-server-ip/student-management-api/';
🚀 Step 4: Start Apache Server
Ensure Apache is running:

bash
Copy
Edit
$ sudo service apache2 start
Then visit:

arduino
Copy
Edit
http://your-server-ip/student-management-api/api/students
http://your-server-ip/student-management-api/api/subjects
🌐 Deployment on AWS
🔒 Security Group Configuration
Allow traffic on:

Port 22 – SSH access

Port 80 – HTTP for Apache

📦 Production Setup
Clone the project on your AWS EC2 instance.

Place the project under /var/www/html/.

Ensure Apache and MySQL are running.

Access it via your public IP address.

🧪 API Endpoints
/api/students
Returns a list of students and their enrolled programs.

json
Copy
Edit
[
  {
    "name": "Alice Johnson",
    "program": "BSc in Software Engineering"
  },
  ...
]
/api/subjects
Returns subjects grouped by academic year.

json
Copy
Edit
{
  "year_1": ["Intro to Programming", "Mathematics I"],
  "year_2": ["Data Structures", "Databases"],
  "year_3": ["Software Engineering", "Web Dev"],
  "year_4": ["Capstone Project", "Cloud Computing"]
}
🤝 Contribution
Contributions are welcome! Feel free to fork the repository and submit a pull request.

📄 License
This project is licensed under the MIT License.

👨‍💻 Developed By
Witness Masamaki

Email: masamakiwitness@gmail.com
Course: CS 421 – Application Deployment and Management
Instructor: Dr. Goodiel C. Moshi
Institution: The University of Dodoma

yaml
Copy
Edit

---

Let me know if you want me to generate a `requirements.txt` equivalent (maybe listing PHP extensio
