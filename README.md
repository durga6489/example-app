

This project is built using Laravel 11 and requires the following minimum installation requirements:



## Minimum Installation Requirements

1. **PHP**: 8.2 or higher
2. **Composer**: 2 or higher

## Installation Guide

Follow these steps to get your Laravel 11 project up and running:

1. **Unzip the Project Files**
   - Extract the contents of the provided zip file to your desired directory.

2. **Install Dependencies**
   - Navigate to the project directory in your terminal.
   - Run the following command to install the necessary PHP dependencies:
     ```bash
     composer install
     ```

3. **Set Up Environment Configuration**
   - Copy the example environment file to create your own `.env` file:
     ```bash
     cp .env.example .env
     ```
   - Edit the `.env` file to configure your database connection. Set the following MySQL settings:
     ```ini
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_username
     DB_PASSWORD=your_database_password
     ```
   

4. **Run Migrations**
   - Apply the database migrations to set up your database schema:
     ```bash
     php artisan migrate
     ```


5. **Start the Development Server**
   - To run the application locally, use:
     ```bash
     php artisan serve
     ```
   - Your application will be available at `http://localhost:8000`.

## Additional Information

- **Configuration**: Ensure that your `.env` file is properly configured with your database credentials and other environment settings.
- **Testing**: To run tests, use:
  ```bash
  php artisan test
