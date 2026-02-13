# Coding Standards & Conventions

All backend code must follow these standards. CI enforces style; reviewers enforce structure.

---

## 1. PHP Style (PSR-12)

- **Tool:** Laravel Pint (included). Run before every commit:
  ```bash
  ./vendor/bin/pint
  ```
- **CI:** `pint --test` runs on every push/PR; failures block merge.
- PSR-12 covers: braces, indentation (4 spaces), line length (soft 120), naming (StudlyCaps for classes, camelCase for methods/variables).

---

## 2. Project Folder Structure

Use this layout so the codebase stays consistent:

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/V1/          # API versioned controllers
│   ├── Middleware/
│   └── Requests/
├── Services/                 # Business logic (e.g. OrderService, PaymentService)
├── Repositories/             # Optional: data access abstraction
├── DTOs/                     # Data transfer objects (e.g. PaymentResult)
├── Contracts/                # Interfaces (e.g. PaymentGatewayInterface)
├── Models/
├── Policies/
└── ...
```

- **Controllers:** Thin; delegate to Services. Return JSON via API Resources.
- **Services:** Contain use cases (create order, process payment). Use Repositories/Models for data.
- **Contracts:** Define interfaces (payment gateway, etc.) so implementations are swappable.
- **DTOs:** Use for structured data in/out of services (e.g. payment result, order summary).

---

## 3. API Conventions

- **Base path:** All API routes under `/api/v1/` (see `routes/api.php`).
- **HTTP verbs:** GET (read), POST (create), PUT/PATCH (update), DELETE (delete).
- **Responses:** Use Laravel API Resources; never return raw Eloquent models.
- **Validation:** Use Form Request classes for every write endpoint; return 422 with field errors on failure.
- **Auth:** Protect routes with `auth:sanctum` (or JWT middleware when added); admin routes also check role.

---

## 4. Database & Eloquent

- **Migrations:** One logical change per migration. No editing migrations that have run in shared environments.
- **Queries:** Use Eloquent or Query Builder only; no raw SQL unless justified and safe (parameterized).
- **Transactions:** Wrap multi-step writes (e.g. order creation, stock update) in `DB::transaction()`.
- **Locks:** Use `lockForUpdate()` when decrementing stock or updating critical rows under concurrency.
- **Soft deletes:** Use for User, Product, Category; hard delete only for transient data.

---

## 5. Security

- Never log or return passwords, tokens, or payment credentials.
- Validate and authorize every request (Form Requests + Policies/Gates).
- Use parameter binding; avoid concatenating user input into queries or commands.

---

## 6. PR Review Checklist

Reviewers must confirm (see also CONTRIBUTING.md):

- [ ] PSR-12 / Pint passes.
- [ ] No raw SQL (or justified and safe).
- [ ] New/updated endpoints use Form Requests and API Resources.
- [ ] Tests added or updated and passing.
- [ ] No secrets in code; new env vars documented in `.env.example`.
- [ ] Migrations are reversible and safe for existing data.

---

*For architecture and tech stack see [ARCHITECTURE.md](ARCHITECTURE.md).*
