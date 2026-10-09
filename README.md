# Cookies POS System

A simple Point-of-Sale system for managing cookie products, customers, staff accounts, inventory, and sales transactions. This project was built using CodeIgniter 4.

## Features

- Cookie product listing
- Add, edit, and delete cookie products
- Product price and stock quantity management
- Cookie product image upload
- JPG, JPEG, and PNG image validation
- Maximum product image size of 2 MB
- Customer account listing
- Add and edit customer records
- Customer form validation
- Required full name and valid email
- Unique customer email validation
- Staff/user account listing
- Add and edit staff accounts
- Unique username validation
- Required username, full name, and password
- Hashed password storage using `password_hash()`
- Password verification using `password_verify()`
- Staff avatar upload
- Avatar resizing to 300 × 300 pixels
- Session-based authentication
- Protected management pages
- Record cookie sales
- Optional customer selection for sales
- Automatic stock deduction after a sale
- Prevents sales that exceed available stock
- Sales history with product, customer, staff member, quantity, total price, and date
- Pink gradient and coquette-inspired design
- CodeIgniter 4 MVC structure
- Database-backed records

## Pages and Routes

| Page | Route | Access |
|---|---|---|
| Home | `/` | Public |
| About | `/about` | Public |
| Login | `/login` | Public |
| Logout | `/logout` | Authenticated users |
| Products | `/products` | Authenticated users |
| Add Product | `/products/new` | Authenticated users |
| Edit Product | `/products/edit/{id}` | Authenticated users |
| Delete Product | `/products/delete/{id}` | Authenticated users |
| Customer Accounts | `/customers` | Authenticated users |
| Add Customer | `/customers/new` | Authenticated users |
| Edit Customer | `/customers/edit/{id}` | Authenticated users |
| Staff Accounts | `/users` | Authenticated users |
| Add Staff | `/users/new` | Authenticated users |
| Edit Staff | `/users/edit/{id}` | Authenticated users |
| Record Sale | `/sales/new` | Authenticated users |
| Sales History | `/sales` | Authenticated users |

## Technologies Used

- CodeIgniter 4
- PHP 8.2
- MariaDB or MySQL
- XAMPP
- HTML and CSS
- CodeIgniter Validation
- CodeIgniter Image Services
- PHP GD Extension
- CodeIgniter Sessions and Filters

## Database Setup

1. Create a database named:

```text
pos_system

Use the following credentials for testing:
username: admin 
password: admin123