-- Create the database
CREATE DATABASE IF NOT EXISTS blood_donation;

-- Use the database
USE blood_donation;

-- Create the donors table
CREATE TABLE IF NOT EXISTS donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    blood_type VARCHAR(10) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    donation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
