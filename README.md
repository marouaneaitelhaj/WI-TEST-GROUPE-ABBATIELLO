# README.md

Salamaykouum,

## Human Resource Management System

This project is a human resource management system with three modules: Users, Authentication, and Employees. It uses the following technologies:

- **Frontend:** AdminLTE 2, HTML5, jQuery, Bootstrap.
- **Backend:** PHP 7 with CodeIgniter 3.
- **Database:** MySQL (managed via PhpMyAdmin).
- **Server:** Local server via XAMPP.

## Modules

### 1. Users Module
- **Database Table:** `users` table with fields: `id`, `name`, `surname`, `login`, `password`, `role` (values: Admin or User).
- **Functionality:**
  - Only Admins can create, edit, and delete users.
  - Users with the role "User" cannot access this module.
  - Controller for managing users with methods for CRUD operations.
  - Role-based access control in the controller.

### 2. Authentication Module
- **Login:** Only registered users can log in using a valid login and password.
- **Session Management:**
  - On successful login, session variables are set for `user_id`, `role`, and `logged_in`.
  - Access to protected modules (Users and Employees) is restricted without authentication.
  - Logout functionality is implemented.
  - Secure password hashing mechanism using `password_hash` and `password_verify`.

### 3. Employees Module
- **Database Table:** `employees` table with fields: `id`, `name`, `position`, `department`, `created_by` (links to the `users` table).
- **Functionality:**
  - Admin: Full CRUD (Create, Read, Update, Delete).
  - User: Read-only access (can view employees but cannot add, edit, or delete).
  - Role-based access control in the controller.
  - `created_by` is used to track the creator of each record.

### 4. Frontend
- **Template:** AdminLTE 2 template for all interfaces.
- **Role-based UI:**
  - Admins see buttons for Create, Edit, and Delete in the Employees Module.
  - Users see only the list of employees (no buttons for Create, Edit, or Delete).
- **Responsive Design:** Ensures proper form validations and responsive design.

## Database
- **Schema and Sample Data:** Included in the `database.sql` file.
- **Tables:** `users` and `employees`.

## Project Delivery
- **Packaging:** The project is packaged in a `.rar` file with:
  - Source code in a structured folder format.
  - Database `.sql` file.
  - Clear documentation for setting up and running the project.

## Migrations
- **Migration Script:** The project includes a migration script to manage database schema changes.
- **Usage:** The migration script can be found in `application/controllers/Migrate.php`.

```php
// filepath: /application/controllers/Migrate.php
public function latest()
{
    if ($this->migration->latest() === FALSE)
    {
        show_error($this->migration->error_string());
    }
}