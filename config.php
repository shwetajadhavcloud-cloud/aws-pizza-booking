CREATE DATABASE pizza;
USE pizza;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    booking_date DATE,
    guests INT
);
