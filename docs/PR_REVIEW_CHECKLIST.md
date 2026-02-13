# PR Review Checklist

Use this list when reviewing pull requests. All items should be satisfied before approval.

---

## Code quality

- [ ] **PSR-12 / Pint** — Code passes `./vendor/bin/pint --test` (CI runs this).
- [ ] **No raw SQL** — Uses Eloquent or Query Builder only; any raw SQL is justified and parameterized.
- [ ] **Thin controllers** — Business logic lives in Services (or similar); controllers only handle HTTP and delegation.
- [ ] **Consistent structure** — New code follows [CODING_STANDARDS.md](CODING_STANDARDS.md) (Services, DTOs, Contracts where applicable).

---

## API & validation

- [ ] **Form Requests** — Every write endpoint has a Form Request with validation rules.
- [ ] **API Resources** — Responses use Laravel API Resources; no raw model serialization.
- [ ] **HTTP semantics** — Correct status codes (200, 201, 404, 422, 403, 500) and RESTful usage.
- [ ] **Versioning** — New/changed routes live under `/api/v1/`.

---

## Data & security

- [ ] **Migrations** — New migrations are reversible and safe for existing data; one logical change per file.
- [ ] **No secrets** — No `.env` values or credentials in code; new variables added to `.env.example`.
- [ ] **Authorization** — Endpoints are protected (auth + role where needed); no BOLA (e.g. users only access own orders).
- [ ] **Input** — User input is validated and (where relevant) escaped; no unchecked output.

---

## Testing

- [ ] **Tests** — New or changed behaviour has corresponding tests; existing tests still pass.
- [ ] **Coverage** — Critical paths (e.g. order creation, payment) are covered; aim for 80%+ on business logic.

---

## Documentation & deploy

- [ ] **README / docs** — Any new setup step or env var is documented.
- [ ] **Breaking changes** — Any breaking API or config change is clearly noted in the PR description.

---

*Quick link: [CONTRIBUTING.md](../CONTRIBUTING.md) — Git flow and PR process.*
