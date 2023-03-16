# Laravel Task Management Application
A simple Laravel application for task management that allows users to create, edit, and delete tasks, as well as reorder tasks with a drag and drop feature in the browser. The tasks are saved to a MySQL database, and the application allows for project functionality, allowing users to select a project from a dropdown and view only the tasks associated with that project. The application uses Vue.js (v3) and Axios to handle the dynamic front-end functionality, and is built with Laravel v9 and uses Vite for front-end build and dev server.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
- Laravel 9+
- PHP 8.0+
- MySQL database
- Composer
- NPM

### Installing
Follow the steps below to set up the project:

1. Clone the repository to your local machine:
```
git clone https://github.com/utf26/task-management-system.git
```

2. Navigate to the project directory:
```
cd task-management-system
```

3. Install the required dependencies:
```
composer install

npm install
```

4. Create a copy of the .env.example file and name it .env:
```
cp .env.example .env
```

5. Update the .env file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

6. Generate an application key:
```
php artisan key:generate
```

7. Run the migrations to create the tables in the database:
```
php artisan migrate
```

8. Compile the front-end assets using npm:
```
npm run dev
```

9. Serve the application:
```
npm run serve
```

The application should now be running at http://localhost:3000

## Built With
- Laravel - The PHP framework for web artisans
- Vue.js - The progressive JavaScript framework for building user interfaces
- Axios - A Promise-based HTTP client for the browser and Node.js
- Vite - A JavaScript build tool for rapid development.

## File Structure
```
task-management-app/
├── app/
│ └── Http/
│ └── Controllers/
│   └── ProjectController.php
│   └── TaskController.php
├── database/
│ └── migrations/
│ └── 2023_02_14_080537_create_projects_table.php
│ └── 2023_02_14_080550_create_tasks_table.php
├── resources/
│ └── views/
│ ├── layouts/
│ │ └── app.blade.php
│ ├── projects/
│ │ ├── create.blade.php
│ │ ├── edit.blade.php
│ │ ├── index.blade.php
│ │ └── show.blade.php
│ ├── tasks/
│ │ ├── create.blade.php
│ │ ├── edit.blade.php
│ │ ├── index.blade.php
│ │ └── show.blade.php
│ └── welcome.blade.php
├── routes/
│ └── web.php
├── public/
│ ├── css/
│ │ └── app.css
│ └── js/
│ └── app.js
├── .env
├── .env.example
└── README.md
```
