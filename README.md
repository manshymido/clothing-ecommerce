# Laravel E-Commerce API

REST API for a full e-commerce platform: products, categories, orders, payments (Stripe, PayPal), auth, and admin operations.

---

## Tech Stack

- **Laravel** 12.x, **PHP** 8.2+
- **MySQL** 8.x, **Redis** 7.x
- **Docker** / **Laravel Sail** for local development
- **API-first** monolith; all endpoints under `/api/v1/`

See [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md) for full architecture and conventions.

---

## Prerequisites

- PHP 8.2+, Composer 2.x
- Docker & Docker Compose (for Sail)
- Git

---

## Quick Start (local)

```bash
# Clone and enter project
git clone <repo-url> clothing && cd clothing

# Install dependencies
composer install

# Copy environment and generate key
cp .env.example .env
php artisan key:generate

# With Laravel Sail (recommended)
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate --seed

# Without Sail: configure .env for local MySQL/Redis, then
php artisan migrate --seed
php artisan serve
```

- **API base (local):** `http://localhost/api/v1` or `http://localhost:80` (Sail) / `http://127.0.0.1:8000` (serve)
- **Mail:** Mailpit (Sail) at `http://localhost:8025` or as configured

---

## Testing

```bash
./vendor/bin/sail test
# or
php artisan test
```

---

## Task Plan & Contributing

- **Task plan:** [TASKS.md](TASKS.md) — all phases and tasks.
- **Contributing:** [CONTRIBUTING.md](CONTRIBUTING.md) — Git flow, branches, PR process.

---

*Laravel E-Commerce Platform — Zero to Live*
