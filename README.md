Task Management App
This is a simple web application built using Laravel for managing tasks. It allows users to create, edit, prioritize, and delete tasks, along with functionalities like drag-and-drop reordering.

Features
Create Task: Users can add new tasks with a name, description, and due date.
Edit Task: Ability to modify task details such as name, description, and due date.
Delete Task: Users can remove tasks they no longer need.
Task Reordering: Drag-and-drop functionality to reorder tasks by priority.
Automatic Priority Update: Priorities are updated automatically based on task order.

Installation
Clone Repository: git clone https://github.com/krixfega/task-management-app.git
Install Dependencies: composer install
Setup Environment Variables: Create a .env file and set up your environment variables like database connection details.
Run Migrations: php artisan migrate
Start Development Server: php artisan serve

Usage
Access the application in your browser at http://localhost:8000.
Register or login to manage tasks.
Create, edit, prioritize, and delete tasks using the provided interfaces.
Technologies Used
Laravel: PHP framework for building the backend.
MySQL: Database management system.
Bootstrap: Frontend styling and UI components.
Contributing
Contributions are welcome! If you find any issues or have suggestions for improvement, feel free to create a pull request or open an issue.

License
This project is licensed under the MIT License.
