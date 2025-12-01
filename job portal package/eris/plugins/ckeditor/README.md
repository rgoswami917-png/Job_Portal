# Job Portal

A web application that connects job seekers with employers. The platform supports two user roles:
- Admin — manages the platform (users, jobs, approvals, analytics)
- Job User — browses, applies and tracks job applications

## Features

Admin
- Manage users and job listings
- Approve or reject job postings
- View reports and analytics

Job User
- Register and update profile
- Browse and search job listings
- Apply for jobs and track application status

## Technologies
- Frontend: HTML, CSS, JavaScript, React (optional)
- Backend: Node.js / Django / Flask / Laravel
- Database: MySQL / MongoDB / PostgreSQL
- Authentication: JWT / Session-based

## Quickstart

1. Clone the repository
   git clone :gh repo clone rgoswami917-png/Job_Portal
   cd job-portal

2. Install dependencies
   - PHP project (plain PHP or framework):
     - Install PHP 7.4+ (or PHP 8.x) and Composer: https://getcomposer.org/
     - Install project PHP dependencies:
       composer install
     - If the project uses a framework (example: Laravel):
       - copy environment file and set app key:
         cp .env.example .env
         composer install
         php artisan key:generate
       - run migrations (if applicable):
         php artisan migrate --seed
     - For a simple dev server (plain PHP):
       php -S localhost:8000 -t public
   - Database (MySQL):
     - Install MySQL / MariaDB or run via Docker:
       docker run --name job-portal-db -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_DATABASE=job_portal -p 3306:3306 -d mysql:8
     - Create database and update database credentials in `.env` or config file

3. Environment
   - Copy `.env.example` to `.env` and fill in values (DB, SECRET_KEY, SMTP, etc.)

4. Database
   - Node (example with Sequelize / TypeORM): run migrations / seeders
   - Django:
     python manage.py migrate
     python manage.py loaddata initial_data.json

5. Run
   - Node:
     npm start
   - Django:
     python manage.py runserver

Open http://localhost:3000 (or backend port shown)

## Testing
- Node: npm test
- Django: python manage.py test

## Project Structure (example)
```
job-portal/
├── backend/       # Backend code
├── frontend/      # Frontend code
├── database/      # DB scripts
├── README.md
└── .env.example
```

## Contribution
1. Fork the repo
2. Create a branch: git checkout -b feature/your-feature
3. Commit: git commit -m "Add feature"
4. Push: git push origin feature/your-feature
5. Open a pull request

## Notes & Best Practices
- Keep secrets out of the repo; use .env and environment-specific config.
- Add unit/integration tests for new features.
- Use CI for linting and tests.

## License
Specify a license (e.g., MIT) in LICENSE file.

## Contact
Maintainer: your-email@example.com

## Developed by
- Harsh
- Rishi
- Satish

## Useful links
- Repository: https://github.com/rgoswami917-png/Job_Portal
- Issues & Bug tracker: https://github.com/rgoswami917-png/Job_Portal/issues
- Composer (PHP dependency manager): https://getcomposer.org/
- PHP documentation: https://www.php.net/docs.php
- Laravel documentation: https://laravel.com/docs
- MySQL documentation: https://dev.mysql.com/doc/
- Docker documentation: https://docs.docker.com/
- dotenv (manage .env files): https://github.com/motdotla/dotenv
- GitHub Actions (CI): https://docs.github.com/actions
- License help & templates: https://choosealicense.com/