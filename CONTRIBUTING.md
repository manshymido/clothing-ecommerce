# Contributing to Laravel E-Commerce API

Thank you for contributing. Follow these steps so your work fits the project and passes review.

---

## Git Flow & Branches

- **`main`** — Production-ready code. Protected; only merge from `develop` or hotfixes.
- **`develop`** — Integration branch. Feature branches merge here.
- **Feature branches:** `feature/<ticket-or-short-name>` (e.g. `feature/order-crud`, `feature/PAY-12-stripe-gateway`).
- **Hotfixes:** `hotfix/<description>` (e.g. `hotfix/fix-payment-amount`). Merge to `main` and `develop`.
- **Releases:** `release/<version>` when preparing a version (e.g. `release/1.0.0`). Merge to `main` and `develop` when done.

**Never push directly to `main` or `develop`.** Always use a branch and open a Pull Request (PR).

---

## Before You Start

1. Pull latest `develop`: `git checkout develop && git pull`
2. Create your branch: `git checkout -b feature/your-feature-name`
3. Ensure you can run the app (e.g. Sail: `./vendor/bin/sail up`) and tests: `./vendor/bin/sail test` or `php artisan test`

---

## Making Changes

1. **Code style:** Follow PSR-12. Run Laravel Pint before committing:
   ```bash
   ./vendor/bin/pint
   ```
2. **Tests:** Add or update tests for new or changed behaviour. Run the test suite before pushing.
3. **API:** Follow existing patterns (API Resources, Form Requests, service layer). See `docs/ARCHITECTURE.md`.
4. **Migrations:** One logical change per migration. Never edit migrations that have already run in shared environments.
5. **Env:** Do not commit `.env`. Use `.env.example` for required keys and document new variables there.

---

## Submitting a Pull Request

1. Push your branch and open a PR **into `develop`** (or into `main` only for hotfixes).
2. Fill in the PR template: what changed, why, and how to test.
3. Ensure CI passes (lint, tests, PHPStan if configured).
4. Request review from at least one senior dev or Tech Lead.
5. Address review comments; squash or tidy commits if the team prefers.

---

## PR Review Checklist (for reviewers)

- [ ] Code follows PSR-12 and project structure (Services, Repositories, DTOs where applicable).
- [ ] No raw SQL unless justified; use Eloquent or Query Builder.
- [ ] New endpoints have validation (Form Requests) and use API Resources for responses.
- [ ] Tests added/updated and passing.
- [ ] No secrets or `.env` values in code; new env keys documented in `.env.example`.
- [ ] Migrations are reversible and safe (no data loss for existing data).

---

*For architecture and tech stack, see [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md).*
