## Getting Started
To get started with this project, follow these steps:

1. Clone the repository using the following command: ```git clone https://github.com/Rostislav901/test-task```
2. Navigate to the master branch of the repository: ```git checkout master```
3. Up containers:  ```docker-compose up```
4. Install project dependencies using Compose: ```composer install```
5. Configure the `.env` file(DATABASE_URL)
6. Migrate: ```php bin/console doctrine:migrations:migrate```

## Modules Overview

### Shared Module
The `Shared` module contains common code used across the application.

### AnalyticData Module
The `AnalyticData` module holds the core logic for data interactions, meaning it contains the main code of the program. 

Located at `App\AnalyticData\Infrastructure\Http\Controller\DataController`, the `DataController` has two primary routes:
- Adding data
- Retrieving data sorted by `firstName`
