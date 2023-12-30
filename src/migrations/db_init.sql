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
	BookID INT PRIMARY KEY AUTO_INCREMENT,
    Title varchar(255),
    AuthorID INT,
    CategoryID INT,
    PublicationDate DATE,
    Publisher VARCHAR(255),
    Edition VARCHAR(50),
    Language VARCHAR(50),
    Pages INT,
    Description TEXT,
    Price Decimal(10, 2),
    QuantityAvailable INT,
    CoverImageURL VARCHAR(255),
    FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);




CREATE TABLE Customers (
    CustomerID INT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255),
    Password VARCHAR(255),
    Address TEXT,
    PhoneNumber VARCHAR(20),
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    CustomerID INT,
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TotalAmount DECIMAL(10, 2),
    Status VARCHAR(50),
    PaymentMethod VARCHAR(50),
    PaymentStatus VARCHAR(50),
    ShippingAddress TEXT,
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

CREATE TABLE OrderDetails (
    OrderDetailID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    BookID INT,
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
    
INSERT INTO admin (Username, Password, Email) values ('admin', '$2y$10$BCS9Teugp/tU6ZHapqznn.plIxzB.sKFBsL4H6eYpQSDWHv96UByy','testadmin@jafer.com');