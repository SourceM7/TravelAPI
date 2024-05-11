# API Documentation

============================================================

# You can import storage/app/2024_05_11_203514_TravelAPI_api.json in postman to load the endpoints.

## API Endpoints

### Authentication

- **POST /api/v1/login**
  - Description: Authenticate a user.
  - Request Body: JSON object with email and password fields.
  - Response: Token upon successful authentication.

### User Management

- **GET /api/v1/user**
  - Description: Retrieve authenticated user's details.
  - Response: User details in JSON format.

### Travel Management

- **GET /api/v1/travels**
  - Description: Retrieve a list of travels.
  - Response: List of travels in JSON format.

- **GET /api/v1/travels/{travel}/tours**
  - Description: Retrieve tours associated with a specific travel.
  - Parameters: travel (UUID)
  - Response: List of tours associated with the specified travel in JSON format.

- **POST /api/v1/admin/travels**
  - Description: Create a new travel.
  - Request Body: JSON object with travel details.
  - Response: Created travel details in JSON format.

- **POST /api/v1/admin/travels/{travel}/tours**
  - Description: Create a new tour for a specific travel.
  - Parameters: travel (UUID)
  - Request Body: JSON object with tour details.
  - Response: Created tour details in JSON format.

- **PUT /api/v1/admin/travels/{travel}**
  - Description: Update details of a specific travel.
  - Parameters: travel (UUID)
  - Request Body: JSON object with updated travel details.
  - Response: Updated travel details in JSON format.