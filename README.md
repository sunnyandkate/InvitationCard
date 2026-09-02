
# Halloween Wishlist Invitation Card

This project is a full-stack PHP web application built to handle a digital party invitation card and an interactive guest wishlist manager. This specific wishlist app focuses on a Halloween-themed birthday invitation. 

The application operates as an open sandbox environment, keeping all functional logic safely on the server side using a centralized validation setup. To make testing completely frictionless, the login form comes pre-filled with guest and admin details. This means any visitor can easily test both sides of the system instantly without needing a special link:

* **The Guest View (`wishlist.php`):** Log in using the guest details to view the invitation, browse the available wishlist items.
* **The Private Admin Dashboard (`choosenitems.php`):** Log in using the admin details to unlock a hidden tracking dashboard. This panel lets the host see exactly which items have been selected by guests, while automatically blocking unauthenticated users from viewing the list.

## Pre-Filled Testing Credentials

Because the login form is pre-filled for everyone right on the landing page, you can try out both roles seamlessly:

* **Administrative Role:**
  * **Username:** `if_level_is_halloween`
  * **Password:** `else_hide_the_pumpkins`
  * **System Action:** Logs you in as the manager, revealing the hidden "Chosen Presents" tab in the navigation menu.

* **Standard Guest Role:**
  * **Username:** `halloween_birthday_guest` 
  * **Password:** `pumpkin_and_ghosts`
  * **System Action:** Logs you in as a typical invitee, keeping the administrative tools hidden while allowing you to select gifts.

## Behind the Scenes

The codebase is built to be secure, fast, and completely self-contained:

* **Security:** Uses PDO parameterized queries to block SQL injection and native PHP password hashing for authentication.
* **Database Stability:** Uses database transactions to safely move items from the public pool to the private list without risk of data corruption or double-booking.
* **Session Management:** Uses native security sessions that cleanly delete all browser and server footprints upon logging out.


### 📋 Database Architecture
To set up the database for this blog, import the `schema.sql` file or run the following query:

## Database Schema Blueprint

To initialize the backend environment relational grid structures on your local machine or live cPanel web server infrastructure, run the following error-free SQL script inside your database manager (like phpMyAdmin):

```sql
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(20) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `choosenpresents` (
  `id` INT NOT NULL PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) DEFAULT NULL,
  `original_item_id` INT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```
