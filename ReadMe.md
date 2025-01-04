# Condominium Management System

The Condominium Management System is a web-based platform designed to streamline the management of rental properties, including condominiums. The system allows property owners to list their units for rent and facilitates seamless interactions between property owners and renters. It integrates Vue.js for the frontend and Laravel for the backend.

## Features

- **Rental Management**: Easily manage rental listings, including details such as location, number of bedrooms, floor, area, and price.
- **Image Uploads**: Upload and store images for each rental unit.
- **Dynamic Rental Listings**: Display rental listings dynamically on the frontend with data fetched from the backend.
- **Tenant Notifications**: Notify property owners when a customer applies for a rental unit.
- **Secure Payment Integration**: Facilitate payments through secure third-party payment gateways like Chapa.
- **User Authentication**: Protect endpoints and data with secure user authentication and authorization.

## Prerequisites

To run the system, ensure you have the following installed:

- PHP >= 8.0
- Composer
- Node.js and npm
- Laravel Framework 11.35.0
- Vue.js 3

## Installation

### Backend (Laravel)

1. Clone the repository and navigate to the backend directory:
   ```bash
   git clone <repository-url>
   cd server
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up the `.env` file:
   ```bash
   cp .env.example .env
   ```
   Update the following variables:
   ```env
   APP_URL=http://localhost
   DB_CONNECTION=sqlite
   FILESYSTEM_DISK=public
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Start the development server:
   ```bash
   php artisan serve
   ```

### Frontend (Vue.js)

1. Navigate to the frontend directory:
   ```bash
   cd client
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Set up environment variables by creating a `.env` file in the root directory:
   ```bash
   VITE_BASE_URL=http://127.0.0.1:8000
   ```

4. Start the development server:
   ```bash
   npm run dev
   ```

## Usage

1. **Property Owners**:
   - Log in to the system.
   - Add new rental properties, including details and images.
   - View and manage rental applications.

2. **Renters**:
   - Browse available rental listings.
   - Apply for a rental unit directly from the platform.

3. **Notifications**:
   - Property owners receive notifications when a rental application is submitted.

4. **Payments**:
   - Securely redirect renters to Chapa’s payment gateway for transactions.

## API Endpoints

### Backend

- `GET /api/rentals`: Fetch all rental listings.
- `POST /api/rentals`: Add a new rental property.
- `POST /api/rental_image`: Upload an image for a rental unit.
- `GET /api/rentals/{id}`: Fetch details of a specific rental.

### Frontend Integration

- Use the `VITE_BASE_URL` environment variable to set the base URL for API requests.
- Use the provided `useRentalStore` for Vuex-based state management.

## Example Configuration

### Laravel Configuration

```env
APP_NAME=Condominium Management
APP_ENV=local
APP_URL=http://localhost
FILESYSTEM_DISK=public
DB_CONNECTION=sqlite
SESSION_DRIVER=cookie
```

### Vite Configuration

```javascript
server: {
  proxy: {
    '/api': {
      target: 'http://127.0.0.1:8000',
      changeOrigin: true,
    },
  },
},
```

## Contributing

1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature description"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

## License

This project is licensed under the MIT License.

