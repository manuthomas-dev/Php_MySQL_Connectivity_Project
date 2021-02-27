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

CREATE TABLE Orders (
OrderId INT PRIMARY KEY AUTO_INCREMENT,
firstName  VARCHAR(50) NOT NULL,
lastName  VARCHAR(50) NOT NULL,
addressLine1  VARCHAR(50) NOT NULL,
addressLine2  VARCHAR(50),
cardName  VARCHAR(50) NOT NULL,
cardNumber VARCHAR(20) NOT NULL
);

CREATE TABLE OrderInventory (
OrderInventory INT PRIMARY KEY AUTO_INCREMENT,
OrderId INT,
bookId INT,
quantity INT NOT NULL,
billAmount DECIMAL(18,2)  NOT NULL,
dateOfPurchase DATETIME  NOT NULL,
FOREIGN KEY (bookId) REFERENCES books(bookId),
FOREIGN KEY (OrderId) REFERENCES orders(OrderId)
);