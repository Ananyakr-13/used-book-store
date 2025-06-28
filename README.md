
# 📚 UBS – Used Book Store/ University Book System

A web-based **Library Management System** designed to simplify book issuance and catalog management for universities or educational institutions.
Built using **PHP**, **MySQL**, and **HTML/CSS**, with an intuitive interface for students and administrators.

---

## 🚀 Features

### 👨‍🎓 Student Panel
- 🔍 View all available books
- 📖 Request books for borrowing
- ✅ Track your book request status
- 🧾 View your borrowing history

### 🛠️ Admin Panel
- ➕ Add/Edit/Delete books, categories, departments
- 👥 Manage students
- 📥 Accept or reject book requests
- 📊 Monitor overall system usage

---

## 🗂️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Tools:** phpMyAdmin, XAMPP

---

## 🛠️ Setup Instructions (Localhost)

1. **Install XAMPP**  
   Download and install XAMPP from: [https://www.apachefriends.org/](https://www.apachefriends.org/)

2. **Move the Project Folder**
   - Copy the entire `ubs` folder into:  
     `C:\xampp\htdocs\`

3. **Start Apache & MySQL**
   - Open XAMPP Control Panel and click **Start** for Apache and MySQL

4. **Import the Database**
   - Go to `http://localhost/phpmyadmin`
   - Create a new database named `ubs`
   - Import the `ubs.sql` file from the `/DB` folder

5. **Run the Project**
   - Open your browser and go to:  
     `http://localhost/ubs/`

---

## 🔐 Login Credentials (Demo)

### Admin
- **Username:** `admin`
- **Password:** `admin123`

### Student
- Use the registration form or check existing entries in the database.

---

## 📁 Project Structure

```bash
ubs/
├── assets/             # CSS, JS, Images
├── DB/                 # SQL file
├── Admin*.php          # Admin pages
├── Student*.php        # Student pages
├── *.php               # Common and core logic
├── README.md           # This file
````

---

## 📄 License

This project is for educational purposes only. Feel free to use and modify.

---

## 🙋‍♀️ Author

Developed by **Ananya**
📫 For questions, reach out via GitHub or comments on this repository.

