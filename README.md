# Jafer Books

Jafer Books is an online book management system designed to simplify the process of managing book inventories, authors, and categories. This project is developed to provide efficient book record management with detailed information on each book, including titles, authors, categories, prices, and more.

## Features

- **Book Management**: Add, update, and delete book records.
- **Author Management**: Manage author details, including names and associated books.
- **Category Management**: Organize books into various categories.
- **Search Functionality**: Search books by title, author, or category.
- **Responsive Design**: User-friendly interface adaptable to various devices.

## Technologies Used

- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL

## Installation and Setup

Follow the steps below to set up the project locally:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/AbiyuNigussie/jafer_books.git
   ```

2. **Navigate to the Project Directory**:
   ```bash
   cd jafer_books
   ```
3. **Import the Database Schema**:

   - Import the SQL file provided in the repository (`src/migration/db_init.sql`) into your MySQL database.

4. **Set Up the Database**:

   - Create a MySQL database.
   - Update the database configuration in the `src/connection/db_connection.php` file located in the project.

5. **Run the Application**:

   - Start your local PHP server or use tools like XAMPP/WAMP.
   - Place the project files in the server's root directory (e.g., `htdocs` for XAMPP).

6. **Access the Application**:
   Open your web browser and navigate to:
   ```
   http://localhost/jafer_books/src/index.php
   ```

## Usage

- Use the application to manage books, authors, and categories efficiently.
- Perform CRUD (Create, Read, Update, Delete) operations on book records.
- Search for books using keywords.

## Contributing

Contributions are welcome! Follow the steps below to contribute:

1. Fork the repository.
2. Create a new branch for your feature:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add your message here"
   ```
4. Push the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

If you have any questions or suggestions, feel free to contact:

- **Developers**: Abiyu Nigussie & Michael Solomon
- **GitHub**: [AbiyuNigussie](https://github.com/AbiyuNigussie), [mckienzie](https://github.com/mckienzie7)

---

Thank you for using Jafer Books!
