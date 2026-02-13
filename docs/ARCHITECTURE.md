# Laravel E-Commerce — Architecture & Tech Stack

**Version 1.0** — Decisions made in Phase 1. All team members must follow these choices.

---

## 1. Tech Stack

| Layer | Choice | Notes |
|-------|--------|--------|
| **Framework** | Laravel 11.x (latest stable) | LTS-friendly, API-first support |
| **PHP** | 8.2+ | Required for Laravel 11 |
| **Database** | MySQL 8.0 / MariaDB 10.6+ | Primary store; same schema works on PostgreSQL if needed later |
| **Cache** | Redis 7.x | Sessions, cache, queues |
| **API** | REST (JSON) | All routes under `/api/v1/` |
| **Auth** | Laravel Sanctum (API tokens) or JWT (tymon/jwt-auth) | TBD in Phase 3; recommend Sanctum for simplicity |

---

## 2. Architecture: API-First Monolith

- **Approach:** **API-first monolith** (single Laravel application exposing REST API).
- **No microservices** for v1; single codebase, single deploy.
- **Future:** Frontend (Blade/Vue/React) can be added later; same repo or separate repo consuming this API.
- **REST conventions:** Resourceful routes, HTTP verbs, JSON request/response.

---

## 3. Database & Cache

- **Primary DB:** MySQL (default). Use migrations for all schema changes.
- **Redis:** Used for:
  - Cache (`CACHE_DRIVER=redis`)
  - Sessions (`SESSION_DRIVER=redis`) if needed
  - Queues (`QUEUE_CONNECTION=redis`) in production
- **Local dev:** SQLite allowed for quick runs; MySQL used in Docker/CI.

---

## 4. Development Environment

- **Local:** Docker Compose **or** Laravel Sail (Sail = Laravel’s official Docker setup).
- **Containers:** PHP 8.2+, Nginx, MySQL, Redis, Mailpit (for local mail).
- **One-command start:** `./vendor/bin/sail up` (Sail) or `docker-compose up -d` (custom compose).

---

## 5. Key Conventions (Summary)

- **API versioning:** All API routes under `Route::prefix('v1')` in `routes/api.php`.
- **Payment gateways:** Strategy pattern; one interface, multiple implementations (Stripe, PayPal, etc.).
- **Soft deletes:** Used for Users, Products, Categories. Hard delete only for transient data (e.g. cart items).
- **Atomic operations:** Use DB transactions and `lockForUpdate()` for order creation and stock updates.
- **Idempotency:** Payment endpoints must prevent duplicate payments (e.g. by order + status check).

These will be reflected in folder structure (Services, Repositories, DTOs), coding standards (Pint/PSR-12), and PR checklist.

---

*Document owned by Tech Lead. Update when stack or architecture changes.*
