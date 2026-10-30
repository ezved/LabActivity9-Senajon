# Bakuna Tracker – Purok Senajon

Lab Activity 9 (Blade, Tailwind & Vite) for Full-Stack Web Development, Ateneo de Davao University.
A Laravel 12 rebuild of the Barangay Matina Crossing Health Center vaccination dashboard, using Blade views styled with Tailwind v3 through Vite and a seeded SQLite database.

## Login (seeded)

- Email: `nurse.senajon@bakuna.test`
- Password: `bakuna2026`

## How to run

```bash
composer install
copy .env.example .env      # skip if you already have a .env
php artisan key:generate
npm install
php artisan migrate:fresh --seed
npm run dev                 # terminal 1
php artisan serve           # terminal 2
```

Then open http://127.0.0.1:8000 and sign in. For a production build, run `npm run build`.

## Pages

- `/login` – sign in (guests only)
- `/dashboard` – alert banner, stat cards, overdue list
- `/schedule` – full vaccination schedule table

Both `/dashboard` and `/schedule` need a login. The schedule includes a Pentavalent dose dated October 15, 2026, my birthday.
