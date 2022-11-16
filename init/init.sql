CREATE TABLE user (
    `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(32),
    `lastname` VARCHAR(32),
    `profilePicture` TEXT,
    `address` VARCHAR(155),
    `phoneNumber` VARCHAR(16),
    `trigram` VARCHAR(3)
);
CREATE TABLE course (
    `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `userId` int NOT NULL,
    `code` VARCHAR(15) NOT NULL,
    `courseName` VARCHAR(255),
    `profilePicture` TEXT,
    `description` TEXT,
    FOREIGN KEY (`userId`) REFERENCES user (`id`)
);