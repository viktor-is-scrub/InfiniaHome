-- ------------------------------------------------------------------
-- This file contains the information to build a table named 'users'
-- for login and signup purposes
-- [!]
-- Note that hacking this SQL file and adding injection code WON'T WORK!!
-- We are ALWAYS checking this SQL file. No, seriously.
-- ------------------------------------------------------------------

-- This script assumes that the database and user for creation exists
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, -- Set a safe value for the int
  `username` VARCHAR(100) NOT NULL,
  `fullname` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL, -- This will be a hashed salted value for the password
  `email` VARCHAR(100) NOT NULL,
  `registered` enum('Y', 'N') NOT NULL DEFAULT 'N',
  `tokencode` VARCHAR(100) NOT NULL -- If code valid, will change the user status

) ENGINE = InnoDB;

