# Laravel Project Setup Guide

Complete guide to clone and setup this Laravel project in your local environment.

## Prerequisites

Make sure you have installed:
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

## Step-by-Step Installation

### 1. Clone Repository
```bash
git clone https://github.com/SIC-Unud/sic-tour-and-travel.git
cd sic-tour-and-travel
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install JavaScript Dependencies
```bash
npm install
```

### 4. Setup Environment File
```bash
cp .env.example .env
```

After copying the `.env` file, open it and configure your database settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sic-tour-and-travel
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Run Database Migration
```bash
php artisan migrate
```

### 7. Build Assets & Run Development Server

You have **2 options** to run the development server:

**Option 1 - Run Everything with Composer (Recommended):**
```bash
composer run dev
```
This command will run both the backend server and frontend asset compilation automatically.

**Option 2 - Run Backend and Frontend Separately:**

If you prefer to run them separately, open **2 terminals**:

**Terminal 1 - Backend Server:**
```bash
php artisan serve
```

**Terminal 2 - Frontend Assets (Vite/Mix):**
```bash
npm run dev
```

### 8. Access the Application
Open your browser and navigate to:
```
http://localhost:8000
```

## Troubleshooting

### Error: Database Connection
- Make sure MySQL/database service is running
- Double-check the configuration in `.env` file
- Ensure the database has been created

### Error: NPM Dependencies
If error occurs during `npm install`:
```bash
rm -rf node_modules package-lock.json
npm install
```

### Error: Composer Dependencies
If error occurs during `composer install`:
```bash
rm -rf vendor composer.lock
composer install
```

## Commands Reference

| Command | Description |
|---------|-------------|
| `composer install` | Install PHP dependencies |
| `npm install` | Install JavaScript dependencies |
| `composer run dev` | Run Laravel development server |
| `php artisan serve` | Alternative: Run Laravel server |
| `npm run dev` | Run Vite/Mix to compile assets |
| `npm run build` | Build assets for production |
| `php artisan migrate` | Run database migrations |
| `php artisan migrate:fresh` | Drop all tables & re-run migrations |
| `php artisan db:seed` | Run database seeders |

## Development Workflow

Every time you start development, you can choose:

**Simple way:**
```bash
composer run dev
```

**Or run separately:**
1. Backend server: `php artisan serve`
2. Frontend compiler: `npm run dev`

## Production Build

For production, compile assets with:
```bash
npm run build
```

---

**Happy Coding! 🚀**
