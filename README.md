# Laravel Project

This repository contains a Laravel project using Vite for asset compilation.

## Prerequisites

Before you begin, ensure you have the following installed on your system:
- PHP >= 8.1
- Composer
- Node.js & NPM
- Git

## Installation Steps

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-directory>
```

### 2. Install Dependencies

Install PHP dependencies using Composer:
```bash
composer install
```

Install Node.js dependencies:
```bash
npm install
```

### 3. Environment Setup

Copy the example environment file:
```bash
cp .env.example .env
```

Generate application key:
```bash
php artisan key:generate
```

### 4. Build Assets

Compile and build frontend assets using Vite:
```bash
npm run build
```

### 5. Start Development Server

Start the Laravel development server:
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Development

For active development, you can use:
```bash
npm run dev
```

This will start Vite's development server with hot module replacement.

## Additional Commands

- Run migrations: `php artisan migrate`
- Clear cache: `php artisan cache:clear`
- Clear config: `php artisan config:clear`

## Contributing

[Describe your contribution guidelines here]

## License

[Specify your license here]