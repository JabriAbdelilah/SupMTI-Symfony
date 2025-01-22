# SupMTI Symfony Project

This is a Symfony-based project for managing Teams and Players, built for SupMTI. Follow the steps below to set up and run the project locally.

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP (>= 8.2 recommended)
- Composer
- Symfony CLI
- A database management system (XAMPP)

## Setup Instructions

1. **Clone the Repository**

   ```bash
   git clone https://github.com/JabriAbdelilah/SupMTI-Symfony.git
   cd SupMTI-Symfony
   ```

2. **Install Dependencies**

   Run the following command to install the required dependencies:

   ```bash
   composer install
   ```

3. **Configure the Database**

   Open the `.env` file in the root of the project and update the `DATABASE_URL` variable to match your database configuration. For example:

   ```env
   DATABASE_URL="mysql://username:password@127.0.0.1:3306/your_database_name?serverVersion=8.0.40&charset=utf8mb4"
   ```

4. **Create the Database**

   Use Doctrine to create the database:

   ```bash
   php bin/console doctrine:database:create
   ```

5. **Run Migrations**

   Execute the Doctrine migrations to set up the database schema:

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

6. **Start the Development Server**

   Launch the Symfony development server:

   ```bash
   symfony serve
   ```

   By default, the server will be available at `http://127.0.0.1:8000`.

