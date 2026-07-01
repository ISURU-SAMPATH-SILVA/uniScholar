# UniScholar 🎓

UniScholar is a web platform built with PHP designed to connect students with educational scholarships. It simplifies the process of searching, applying, and tracking student funding in one centralized system.

## 🚀 Features
* **Scholarship Search:** Filter available listings by degree level, field, and country.
* **Student Dashboard:** Track application status (Pending, Approved, Rejected) in real-time.
* **Application System:** Easy form submission with document upload capabilities.
* **Admin Panel:** Manage scholarship listings, verify users, and review applications.

## 🛠️ Technologies Used
* **Backend:** PHP (Object-Oriented Programming / Procedural)
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript
* **Framework/Libraries:** Bootstrap (for responsive UI)

## 💻 Installation & Setup

Follow these steps to run the project locally on your machine:

### 1. Prerequisites
Install a local server environment like **XAMPP** or **WampServer**.

### 2. Clone the Repository
```bash
git clone https://github.com
```

### 3. Move to Web Root
Move the extracted `uniScholar` folder to your local server directory:
* For XAMPP: `C:/xampp/htdocs/`
* For WampServer: `C:/wamp64/www/`

### 4. Database Setup
1. Open your browser and go to `http://localhost/phpmyadmin`.
2. Create a new database named `unischolar_db`.
3. Click on the **Import** tab.
4. Choose the `.sql` database backup file from your project folder and click **Go**.

### 5. Configuration
Open `config.php` or your database connection file and update your credentials:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'unischolar_db');
```

### 6. Run the Application
Open your web browser and navigate to:
```text
http://localhost/uniScholar
```

## 🤝 Contributing
Contributions are welcome! Please fork this repository and open a pull request for any improvements or bug fixes.

## 📄 License
This project is open-source and licensed under the [MIT License](https://opensource.org).
