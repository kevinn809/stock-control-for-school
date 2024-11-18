# Stock Control for School

## 🗂️ Project Overview
This project is a **simple inventory management system** designed for a school assignment in **Information Technology**. It allows users to:
- Register products with attributes like name, price, quantity, and critical stock.
- Consult and list all registered products.
- Generate reports for products with low stock.

### ⚠️ Current Status
The project works but requires some fixes between the code and server configuration to run seamlessly.

---

## 🔧 Features
- **Product Registration**: Add new products to the inventory.
- **Product Consultation**: View and search for products in the inventory.
- **Low Stock Reporting**: Generate critical stock reports (in progress).

---

## 🖥️ Setup Instructions

### 1. Requirements
Before running the project, ensure you have the following installed:
- A local server (e.g., XAMPP, WAMP, or MAMP).
- MySQL.
- A modern browser for viewing the interface.

### 2. Installation Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/kevinn809/stock-control-for-school.git
## 3. Import the inventario.sql file into your MySQL database to set up the required table.
## 4. Update the database connection settings in the PHP files (registrarProducto.php and consultarProducto.php) to match your local setup.

---

📂 File Structure
.
├── index.html          # Main interface for the inventory system
├── styles.css          # Stylesheet for the UI
├── script.js           # JavaScript for frontend functionality
├── registrarProducto.php # Backend script to handle product registration
├── consultarProducto.php # Backend script to fetch product data
├── inventario.sql      # SQL file for setting up the database
└── README.md           # Project documentation

---

🚀 How It Works

    Product Registration:
        Navigate to the "Register Product" section.
        Fill in the form with product details and click "Register".
    Consultation:
        Navigate to the "Consult Products" section to view all inventory data.
    Reporting:
        Use the "Generate Report" button to simulate report generation (under development).

---

🛠️ Technologies Used

    Frontend: HTML, CSS, JavaScript.
    Backend: PHP.
    Database: MySQL.
    Tools: Visual Studio Code, Markdown Preview Enhanced.

---

✍️ Author

Developed by Kevin V. as part of a technical high school assignment in Information Technology.

📌 GitHub Repository: kevinn809/stock-control-for-school
