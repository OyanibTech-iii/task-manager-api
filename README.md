# Task Manager API

A RESTful API built with Symfony and API Platform for managing tasks.

## Getting Started

### Prerequisites
* PHP 8.3 or higher
* Composer
* MySQL
* Symfony CLI

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/OyanibTech-iii/task-manager-api.git
   cd task-manager-api

2. Install dependencies:
   ```bash
   composer install

3. Configure Database:
   Edit the .env file and update your DATABASE_URL string.

4. Setup Database Schema:
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate

5. Start the Server:
   ```bash
   symfony serve

## Testing the API
1. Interactive Documentation (Swagger)
   Access the built-in UI at: http://127.0.0.1:8000/api

2. Testing via cURL
   Use the following command to test the POST endpoint. Note: Ensure the field names match the Entity properties (taskTitle and taskDescription).
   ```bash
   curl -X 'POST' \
     'http://127.0.0.1:8000/api/tasks' \
     -H 'accept: application/ld+json' \
     -H 'Content-Type: application/ld+json' \
     -d '{
     "taskTitle": "Submit Web Development Project",
     "taskDescription": "Submit the Growfico project to the instructor at NORSU.",
     "isCompleted": false,
     "createdAt": "2026-02-05T09:00:00+00:00"
   }'

3. Data Schema
   | Field        | Type     | Description                                         |
   |--------------|----------|-----------------------------------------------------|
   | taskTitle    | string   | The title of the task (Required)                    |
   | taskDescription | string | Detailed information about the task                  |
   | isCompleted  | boolean  | Status of the task                                   |
   | createdAt    | string (ISO8601) | Creation timestamp                             |

## API Endpoints
| Method | Endpoint          | Function                     |
|--------|-------------------|------------------------------|
| GET    | /api/tasks        | List all tasks               |
| POST   | /api/tasks        | Create a new task            |
| GET    | /api/tasks/{id}   | View task details            |
| PUT    | /api/tasks/{id}   | Update task                  |
| DELETE | /api/tasks/{id}   | Delete task                  |

## Troubleshooting
If you receive a 500 Internal Server Error:
- Verify that your JSON keys match the Entity property names exactly.
- Check that the Serialization Groups #[Groups(['category:write'])] are uncommented in the Task.php entity.
- Ensure the database connection is active.