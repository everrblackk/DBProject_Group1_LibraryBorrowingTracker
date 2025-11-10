CREATE DATABASE libraryBorrowingTracker;

USE libraryBorrowingTracker;

-- tabel buku:
CREATE TABLE books(
    bookID VARCHAR(100) PRIMARY KEY,
    tittle VARCHAR(255),
    borrowStatus ENUM('available', 'borrowed'),
    author VARCHAR(100)
)ENGINE=INNODB;

CREATE TABLE genre(
    genreID INT AUTO_INCREMENT PRIMARY KEY,
    genreName VARCHAR(100) NOT NULL UNIQUE
)ENGINE=INNODB;

CREATE TABLE booksGenre(
    bookID VARCHAR(100),
    genreID INT,
    PRIMARY KEY (bookID, genreID),
    FOREIGN KEY (bookID) REFERENCES books(bookID),
    FOREIGN KEY (genreID) REFERENCES genre(genreID)
)ENGINE=INNODB;

-- contoh isi tabel buku:
INSERT INTO books (bookID, tittle, borrowStatus, author) VALUES
('999-999-0001', 'Laskar Pelangi', 'available', 'Andrea Hirata'),
('999-999-0002', 'Bumi', 'borrowed', 'Tere Liye');

INSERT INTO genre (genreName) VALUES
('Fiksi'),
('Fantasi'),
('petualangan');

INSERT INTO booksGenre (bookID, genreID) VALUES
('999-999-0001', 1),
('999-999-0002', 2),
('999-999-0002', 3);

SELECT b.bookID, b.tittle, b.author, b.borrowStatus, GROUP_CONCAT(g.genreName SEPARATOR ',') AS genre
FROM books b
INNER JOIN booksGenre bg ON b.bookID = bg.bookID
INNER JOIN genre g ON bg.genreID = g.genreID
GROUP BY b.bookID, b.tittle, b.author, b.borrowStatus;

USE libraryBorrowingTracker;
-- tabel readers:
CREATE TABLE readers(
    readerID INT AUTO_INCREMENT PRIMARY KEY,
    readerName VARCHAR(100),
    email VARCHAR(255),
    address VARCHAR(255),
    phoneNumber VARCHAR(50)
)ENGINE=INNODB;

-- contoh isi tabel readers:
INSERT INTO readers(readerName, email, address, phoneNumber) VALUES
('Anto', 'anto123@gmail.com', 'Bandung', '088845556666'),
('Andi', 'andi666@gmail.com', 'Jakarta', '088845553335');

SELECT * FROM readers;


-- tabel staff:
CREATE TABLE staff(
    staffID INT AUTO_INCREMENT PRIMARY KEY,
    staffName VARCHAR(100),
    phoneNumber VARCHAR(50)
)ENGINE=INNODB;

-- contoh isi tabel staff
INSERT INTO staff(staffName, phoneNumber) VALUES
('aisyah', '087754321111'),
('Ana', '085677745678');

SELECT * FROM staff;


-- tabel loans:
CREATE TABLE loans(
    loanID INT AUTO_INCREMENT PRIMARY KEY,
    bookID VARCHAR(100),
    readerID INT,
    staffID INT,
    loanDate DATE,
    returnDate DATE,
    FOREIGN KEY (bookID) REFERENCES books(bookID),
    FOREIGN KEY (readerID) REFERENCES readers(readerID),
    FOREIGN KEY (staffID) REFERENCES staff(staffID)
)ENGINE=INNODB;

-- contoh isi tabel loans
INSERT INTO loans(bookID, readerID, staffID, loanDate, returnDate) VALUES
('999-999-0001', 1, 2, '2025-10-25', '2025-11-1'),
('999-999-0002', 2, 1, '2025-11-8', '2025-11-14');

SELECT * FROM loans;

