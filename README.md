# UniScholar - Student Resource Hub 🎓📚

A database-driven web application where students can upload, browse, and download academic resources (lecture notes, past papers, tutorial sheets, etc.) organized by subject code and category. This platform also helps students seamlessly search, apply, and track educational scholarship opportunities in one centralized system.

---

## 🏛️ Academic Context
* **University:** Rajarata University of Sri Lanka (RUSL)
* **Department:** Department of ICT
* **Batch:** 2024
* **Module:** ICT 1209 – Web Technologies
* **Phase:** All three phases completed (Proposal → Frontend → Backend)

---

## 🚀 Features
* **Resource Sharing:** Upload, browse, and download academic materials categorized by subject code.
* **Scholarship Search:** Filter available listings by degree level, field, and country.
* **Student Dashboard:** Track scholarship application statuses (Pending, Approved, Rejected) and manage uploads.
* **Secure Authentication:** User registration and secure login system for students and administrators.
* **Admin Panel:** Manage scholarship listings, verify users, and review resource uploads.

---

## 🛠️ Tech Stack
* **Frontend:** HTML5, CSS3, Bootstrap 5, Bootstrap Icons
* **Fonts:** Google Fonts
* **Client-side Scripting:** JavaScript
* **Backend:** PHP 8 (Object-Oriented Programming / Procedural)
* **Database:** MySQL (via XAMPP)
* **Version Control:** Git & GitHub

---

## 📂 Folder Structure

```text
uniScholar/
│
├── auth/                    # Login, Registration, and Logout scripts
├── css/                     # Custom stylesheets and Bootstrap styles
├── images/                  # Logos, banners, and user-uploaded media
├── includes/                # Reusable code layouts (header, footer, db.php)
├── js/                      # JavaScript files for client-side validations
│
├── contact.php              # Contact and support page
├── dashboard.php            # Main user/student dashboard panel
├── database.sql             # SQL schema export file for database setup
├── index.php                # Main landing page (Homepage)
└── README.md                # Project documentation layout
```

---

## 💻 Installation & Setup Instructions

Follow these steps to run the project locally on your machine:

### 1. Prerequisites
Ensure you have a local server environment installed, such as **XAMPP** or **WampServer** running **PHP 8+**.

### 2. Clone the Repository
Clone this repository into your local web root directory:
* For XAMPP (Windows): `C:\xampp\htdocs\`
* For XAMPP (Linux): `/opt/lampp/htdocs/`
* For WampServer: `C:\wamp64\www\`

```bash
git clone https://github.com/ISURU-SAMPATH-SILVA/uniScholar.git
```
*(Make sure the project folder is named `uniScholar` inside htdocs)*

### 3. Start Local Server
Open your XAMPP Control Panel and start both **Apache** and **MySQL** modules.

### 4. Database Setup
1. Open your web browser and navigate to `http://localhost/phpmyadmin`.
2. Create a new database named `unischolar_db`.
3. Go to the **Import** tab.
4. Click **Choose File** and select the `database.sql` file located in the root of your project folder.
5. Click **Go** to import all tables and sample data.

### 5. Configuration
Open `includes/db.php` to verify your database connection credentials. Default XAMPP settings are pre-configured:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'unischolar_db');
```

### 6. Run the Application
Open your web browser and navigate to the project URL:
```text
http://localhost/uniScholar/
```

### 🔑 Demo Account Credentials
You can log in using this pre-configured testing account or register a new one:
* **Email:** `demo@example.com`
* **Password:** `Demo@1234`

---

## 🤝 Contributing
Contributions are welcome! Please fork this repository and open a pull request for any improvements, UI enhancements, or bug fixes.

## 📄 License
This project is open-source and licensed under the [MIT License](https://opensource.org).
