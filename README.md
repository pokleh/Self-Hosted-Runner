# Task Management App (CodeIgniter 4 + Tailwind CSS)

Server-rendered fullstack task management app built with CodeIgniter 4 and Tailwind CSS.

## Stack

- Backend: CodeIgniter 4 (PHP)
- Frontend: Blade-like CI views + Tailwind CSS
- Database: SQLite (`writable/database/task_app.sqlite`)
- Styling pipeline: `@tailwindcss/cli`

## Project Structure

- `app/Controllers/TaskController.php` task CRUD endpoints
- `app/Models/*Model.php` task, project, user, and comment models
- `app/Database/Migrations` schema for users/projects/tasks/task_comments
- `app/Database/Seeds` demo data seeder
- `app/Views/layouts` page layout shell
- `app/Views/components` reusable UI primitives (button/input/select/card/badge/table/toast/modal)
- `app/Views/tasks` list/create/edit/show task pages
- `resources/css/app.css` Tailwind source entry
- `public/assets/css/app.css` compiled CSS output

## Prerequisites

- PHP 8.2+
- Composer
- Node.js + npm
- PHP extensions: `intl`, `mbstring`, `sqlite3`

## Installation

```bash
composer install
npm install
cp env .env
```

`.env` is preconfigured for local SQLite and `http://localhost:8080/`.

## Database Setup

```bash
php spark migrate
php spark db:seed DatabaseSeeder
```

## Authentication

The app now requires login for all `/tasks` routes.

Default seeded accounts:

- `demo@example.com` / `password123` (role: `admin`)
- `lead@example.com` / `password123` (role: `member`)

## Tailwind Build

```bash
npm run build:css
```

Watch mode during development:

```bash
npm run watch:css
```

## Run Locally

```bash
php spark serve
```

Then open [http://localhost:8080/tasks](http://localhost:8080/tasks).

## Notes About shadcn/ui

`shadcn/ui` is React-based and cannot be installed directly into pure server-rendered CodeIgniter views.
This project provides reusable Tailwind component partials in `app/Views/components` as a compatible alternative.
