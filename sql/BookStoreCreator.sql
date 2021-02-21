create database bookstore;

CREATE TABLE Books(
bookId INT PRIMARY KEY AUTO_INCREMENT,
bookName VARCHAR(100) UNIQUE NOT NULL,
bookAuthor VARCHAR(50) NOT NULL,
bookDescription VARCHAR(500) NOT NULL,
bookImage VARCHAR(100) NOT NULL,
bookLanguage VARCHAR(50) NOT NULL,
bookPrice DECIMAL(18,2) NOT NULL
);


CREATE TABLE BooksInventory(  
booksInventoryId INT PRIMARY KEY AUTO_INCREMENT,
bookId INT NOT NULL,
invDate date NOT NULL,
totalInvCount INT NOT NULL,
availInvCount INT NOT NULL,
FOREIGN KEY(bookId) REFERENCES books(bookId)
);
