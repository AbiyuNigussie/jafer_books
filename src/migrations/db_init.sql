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
	BookID INT PRIMARY KEY,
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
    OrderDetailID INT PRIMARY KEY,
    OrderID INT,
    BookID INT,
    Quantity INT,
    Subtotal DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (BookID) REFERENCES Books(BookID)
);
