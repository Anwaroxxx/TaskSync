<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="220" alt="Laravel Logo">
</p>

<h1 align="center">TaskSync</h1>

<p align="center">
  <strong>Professional Task Management — Simplified.</strong><br>
  A high-performance, minimalist platform built for modern teams.<br>
  Pure black aesthetic. Clean workflows. Zero friction.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white" alt="SQLite">
  <img src="https://img.shields.io/badge/Blade-Templates-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Blade">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/status-active-brightgreen?style=flat-square" alt="Status">
  <img src="https://img.shields.io/badge/license-MIT-blue?style=flat-square" alt="License">
  <img src="https://img.shields.io/github/last-commit/Anwaroxxx/TaskSync?style=flat-square" alt="Last Commit">
</p>

---

## Overview

**TaskSync** is a task management web application built with Laravel 11 and styled with a premium pure black theme. It focuses on clean role-based workflows, real-time task tracking, and a distraction-free interface for teams.

---

## Features

| Feature | Description |
|---|---|
| **Premium Dark Mode** | Custom pure black theme engineered for maximum focus and reduced eye strain |
| **Role-Based Access** | Structured hierarchy separating Organizers from Participants |
| **Real-Time Tracking** | Full lifecycle management — create, assign, update, and close tasks |
| **Task Organization** | Intuitive dashboard with filtered views and status management |
| **Minimal UI** | No bloat — only what teams actually need |

---

## Tech Stack

<table>
  <tr>
    <td align="center" width="120">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-plain.svg" width="48" height="48" alt="PHP"/><br>
      <sub><b>PHP 8.2</b></sub>
    </td>
    <td align="center" width="120">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" width="48" height="48" alt="Laravel"/><br>
      <sub><b>Laravel 11</b></sub>
    </td>
    <td align="center" width="120">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg" width="48" height="48" alt="Tailwind CSS"/><br>
      <sub><b>Tailwind CSS</b></sub>
    </td>
    <td align="center" width="120">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sqlite/sqlite-original.svg" width="48" height="48" alt="SQLite"/><br>
      <sub><b>SQLite</b></sub>
    </td>
    <td align="center" width="120">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" width="48" height="48" alt="JavaScript"/><br>
      <sub><b>JavaScript</b></sub>
    </td>
    <td align="center" width="120">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" width="48" height="48" alt="Composer"/><br>
      <sub><b>Composer</b></sub>
    </td>
  </tr>
</table>

---

## Project Structure

```
TaskSync/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Request handling logic
│   │   └── Middleware/      # Role-based access guards
│   └── Models/              # Eloquent ORM models
├── database/
│   ├── migrations/          # Schema definitions
│   └── seeders/             # Demo data
├── resources/
│   └── views/               # Blade templates
├── routes/
│   └── web.php              # Application routes
└── public/                  # Entry point + compiled assets
```

---

## Installation & Setup

> **Requirements**: PHP >= 8.2, Composer, Node.js >= 18

### 1. Clone the repository

```bash
git clone https://github.com/Anwaroxxx/TaskSync.git
cd TaskSync
```

### 2. Install dependencies

```bash
composer install
npm install && npm run build
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set up the database

```bash
touch database/database.sqlite
php artisan migrate --seed
```

### 5. Launch the development server

```bash
php artisan serve
```

---

## Roles & Permissions

| Role | Capabilities |
|---|---|
| **Organizer** | Create tasks, assign members, update status, delete tasks |
| **Participant** | View assigned tasks, update task progress |

---

## Author

<p>
  <a href="https://github.com/Anwaroxxx">
    <img src="https://img.shields.io/badge/GitHub-Anwaroxxx-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
  </a>
</p>

Built with focus and precision.

---

## License

Distributed under the [MIT License](LICENSE).
