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


INSERT INTO books(bookId,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(1,"To Kill a Mockingbird","Harper Lee","Voted America's Best-Loved Novel in PBS's The Great American Read
Harper Lee's Pulitzer Prize-winning masterwork of honor and injustice in the deep South—and the heroism of one man in the face of blind and violent hatred","images/book1.jpg","English",0.00);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(1,"2010-10-15",100,100);

INSERT INTO books(bookId,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(2,"Nineteen Eighty-Four [1984]","George Orwell","Nineteen Eighty-Four [1984] by George Orwell is a renowned dystopian novel of the life in a future totalitarian state under the watchful eyes of Big Brother.","images/book2.jpg","English",16.27);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(2,"2012-03-17",50,0);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(3,"Harry Potter and the Philosopher's Stone","J.K. Rowling","Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter 'H'.","images/book3.jpg","English",19.72);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(3,"2014-04-15",200,200);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(4,"The Lord of the Rings: One Volume","J.R.R. Tolkien","A PBS Great American Read Top 100 Pick \n
One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them","book4.jpg","English",17.29);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(4,"2004-02-25",50,50);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(5,"The Great Gatsby","F. Scott Fitzgerald","This critical edition of The Great Gatsby draws on the manuscript and surviving proofs of the novel, together with Fitzgerald's subsequent revisions to key passages to provide the first authoritative text of one of the classic works of the twentieth century.","book5.jpg","English",11.97);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(5,"2013-08-02",20,20);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(6,"Pride and Prejudice","Jane Austen","One of the most universally loved and admired English novels, Pride and Prejudice was penned as a popular entertainment. But the consummate artistry of Jane Austen (1775–1817) transformed this effervescent tale of rural romance into a witty, shrewdly observed satire of English country life that is now regarded as one of the principal treasures of English language.","book6.png","English",11.91);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(6,"2011-109-09",50,50);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(7,"The Diary Of A Young Girl","Anne Frank","Discovered in the attic in which she spent the last years of her life, Anne Frank’s remarkable diary has since become a world classic—a powerful reminder of the horrors of war and an eloquent testament to the human spirit.","book7.jpg","English",8.49);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(7,"2014-05-23",50,50);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(8,"The Book Thief","Markus Zusak","The extraordinary #1 New York Times bestseller about the ability of books to feed the soul even in the darkest of times. \n 
Nominated as one of America's best-loved novels by PBS’s The Great American Read. \n
When Death has a story to tell, you listen. \n
It is 1939. Nazi Germany. The country is holding its breath. Death has never been busier, and will become busier still.","book8.jpg","English",16.44);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(8,"2005-10-04",25,25);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(9,"The Hobbit","J.R.R. Tolkien","This is the story of how a Baggins had an adventure, and found himself doing and saying things altogether unexpected… \n
‘A flawless masterpiece’ The Times","book9.png","English",12.49);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(9,"2013-11-05",45,45);

INSERT INTO books(bookid,bookName,bookAuthor,bookDescription,bookImage,bookLanguage,bookPrice)
VALUES(10,"Little Women","Louisa May Alcott","Little Women is the story of the four March girls and their approach towards womanhood.
Little Women is the heartwarming story of the March family that has thrilled generations of readers. It is the story of four sisters—Jo, Meg, Amy and Beth—and of the courage, humor and ingenuity they display to survive poverty and the absence of their father during the Civil War.","book10.jpg","English",9.09);

Insert INTO booksInventory(bookId,invDate,totalInvCount,availInvCount)
VALUES(10,"2006-01-09",50,5);
