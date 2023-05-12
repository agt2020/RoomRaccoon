-- Shopping table definition
CREATE TABLE shopping (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    is_checked BOOLEAN NOT NULL DEFAULT FALSE
);