CREATE DATABASE jaferbooksDB;

CREATE TABLE Categories(
	CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(255) NOT NULL,
    Description TEXT

);

CREATE TABLE Authors (
	AuthorID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255)
);





CREATE TABLE Books(
	BookID varchar(10) PRIMARY KEY,
    Title varchar(255),
    AuthorID INT,
    CategoryID INT,
    PublicationDate DATE,
    Pages INT,
    Description TEXT,
    Price Decimal(10, 2),
    QuantityAvailable INT,
    CoverImageURL VARCHAR(255),
    FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);



CREATE TABLE Customers (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Address VARCHAR(255),
    PhoneNumber VARCHAR(20),
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES UserAccount(UserID)
);


CREATE TABLE Orders (
    OrderID INT PRIMARY KEY AUTO_INCREMENT,
    CustomerID INT,
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TotalAmount DECIMAL(10, 2) DEFAULT 0.00,
    Status ENUM('pending', 'processing', 'shipped', 'completed') DEFAULT 'pending',
    ShippingAddress VARCHAR(255) NOT NULL,
    PaymentMethod VARCHAR(50) NOT NULL,
    PaymentStatus ENUM('unpaid', 'paid', 'processing') DEFAULT 'unpaid',
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

CREATE TABLE OrderDetails (
    OrderDetailID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    BookID VARCHAR(10),
    Quantity INT,
    Subtotal DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (BookID) REFERENCES Books(BookID)
);

CREATE TABLE admin (
    Admin_id INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(100) NOT NULL
);

CREATE TABLE UserAccount (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Role ENUM('customer', 'employee', 'admin') NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    LastLoginAt TIMESTAMP NULL DEFAULT NULL,
);

CREATE TABLE events (
    event_id VARCHAR(10) PRIMARY KEY,
    event_title VARCHAR(255) NOT NULL,
    description TEXT,
    event_image VARCHAR(255),
    schedule DATETIME NOT NULL
);

INSERT INTO Categories (CategoryName, Description)
VALUES
    ('Fiction', 'Books that tell imaginative stories'),
    ('Non-Fiction', 'Books based on real events and facts'),
    ('Science Fiction', 'Books that explore futuristic concepts and technology'),
    ('Mystery', 'Books centered around solving a mystery or crime'),
    ('Biography', 'Books detailing the life of a real person'),
    ('Self-Help', 'Books providing advice and strategies for personal development'),
    ('History', 'Books that narrate historical events and periods'),
    ('Romance', 'Books focused on romantic relationships'),
    ('Fantasy', 'Books set in fantastical worlds with magical elements'),
    ('Thriller', 'Books designed to keep readers on the edge of their seats');


INSERT INTO Books (BookID, Title, AuthorID, CategoryID, PublicationDate, Pages, Description, Price, QuantityAvailable, CoverImageURL) 
VALUES 
('BK001', 'The Great Gatsby', 1, 1, '1925-04-10', 180, 'A novel by F. Scott Fitzgerald', 12.99, 50, 'great_gatsby_cover.jpg'),
('BK002', 'To Kill a Mockingbird', 2, 2, '1960-07-11', 281, 'A novel by Harper Lee', 14.99, 75, 'mockingbird_cover.jpg'),
('BK003', 'One Hundred Years of Solitude', 3, 3, '1967-05-30', 417, 'A novel by Gabriel Garcia Marquez', 18.99, 40, 'solitude_cover.jpg'),
('BK004', '1984', 1, 2, '1949-06-08', 328, 'A novel by George Orwell', 15.99, 60, '1984_cover.jpg'),
('BK005', 'The Catcher in the Rye', 1, 1, '1951-07-16', 224, 'A novel by J.D. Salinger', 16.99, 55, 'catcher_cover.jpg'),
('BK006', 'Pride and Prejudice', 2, 3, '1813-01-28', 279, 'A novel by Jane Austen', 13.99, 80, 'pride_prejudice_cover.jpg'),
('BK007', 'The Hobbit', 1, 1, '1937-09-21', 310, 'A novel by J.R.R. Tolkien', 19.99, 70, 'hobbit_cover.jpg'),
('BK008', 'The Da Vinci Code', 2, 2, '2003-03-18', 454, 'A novel by Dan Brown', 21.99, 50, 'da_vinci_code_cover.jpg'),
('BK009', 'The Alchemist', 3, 3, '1988-01-01', 197, 'A novel by Paulo Coelho', 17.99, 45, 'alchemist_cover.jpg'),
('BK010', 'The Lord of the Rings', 1, 2, '1954-07-29', 1178, 'A novel by J.R.R. Tolkien', 29.99, 90, 'lotr_cover.jpg');


-- admin login cridentials -> email: testadmin@jafer.com  password: admin123
    
INSERT INTO admin (Username, Password, Email) values ('admin', '$2y$10$BCS9Teugp/tU6ZHapqznn.plIxzB.sKFBsL4H6eYpQSDWHv96UByy','testadmin@jafer.com');