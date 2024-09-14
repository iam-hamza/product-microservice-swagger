Prerequisites
Make sure you have the following installed:

PHP (version 8.0 or higher)
Composer (for managing PHP dependencies)
MySQL or another supported database server
Git (optional, but useful for version control)
1. Clone the Repository
Clone the repository with: git clone https://github.com/iam-hamza/Product-Microservice

Navigate to the project directory: cd Product-Microservice

2. Install Dependencies
Install PHP dependencies using Composer: composer install

3. Configure Environment
Copy the example environment file to create your own .env file: cp .env.example .env

Edit the .env file to configure your environment variables, including your database settings.

4. Generate Application Key
Generate a new application key: php artisan key:generate

5. Set Up the Database
Update the .env file with your database connection details. Then, set up the database schema by running migrations: php artisan migrate

 run: php artisan db:seed

6. Run Unit Tests
Create a .env.testing file to configure your testing environment
Ensure the application is set up correctly before running tests. Execute the unit tests using: php artisan test



7. Serve the API Locally
Start the API server locally: php artisan serve

You can access the API at http://localhost:8000.

8. Access API Documentation
View the API documentation at: http://127.0.0.1:8000/api/documentation