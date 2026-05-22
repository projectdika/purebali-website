# PureBali 🌺

A web-based educational platform dedicated to Balinese culture, featuring articles and interactive quizzes. Built for everyone who wants to learn and help preserve the rich heritage of Bali.

---

## 🖥️ Screenshots

<img width="1151" height="918" alt="mockup_fix (1)" src="https://github.com/user-attachments/assets/89c0bc2d-8ee6-4a8f-912a-5cca9d3ba2ff" />


---

## ✨ Features

- **Cultural Articles** — Read in-depth content about Balinese culture including traditional dances, scripts, customs, and art objects
- **Interactive Quizzes** — Test your knowledge with multiple-choice quizzes after reading each article
- **Authentication** — Secure user registration and login system
- **Admin Dashboard** — Manage articles, quiz questions, categories, and content status through a dedicated admin panel

---

## 🛠️ Tech Stack

- **Backend** — [Laravel 11](https://laravel.com/)
- **Frontend** — [Tailwind CSS](https://tailwindcss.com/) + [Alpine.js](https://alpinejs.dev/)
- **Database** — MySQL
- **Build Tool** — Vite

---

## ⚙️ Installation

### Requirements

Make sure the following are installed on your machine:
- PHP >= 8.2
- Composer
- Node.js >= 18 & NPM
- MySQL

### Steps

**1. Clone the repository**

```bash
git clone https://github.com/projekdika/purebali.git
cd purebali
```

**2. Install PHP dependencies**

```bash
composer install
```

**3. Install Node dependencies**

```bash
npm install
```

**4. Copy the environment file**

```bash
cp .env.example .env
```

**5. Generate application key**

```bash
php artisan key:generate
```

**6. Configure the database**

Open the `.env` file and update the following:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=purebali
DB_USERNAME=root
DB_PASSWORD=
```

**7. Run migrations and seeders**

```bash
php artisan migrate --seed
```

**8. Create storage symbolic link**

```bash
php artisan storage:link
```

**9. Build assets**

```bash
npm run build
```

Or for development mode:

```bash
npm run dev
```

**10. Start the development server**

```bash
php artisan serve
```

The application will be running at `http://localhost:8000`

---

## 👤 Default Accounts (Seeder)

| Role  | Email                  | Password  |
|-------|------------------------|-----------|
| Admin | admin@purebali.com     | password  |
| User  | user@purebali.com      | password  |

> Make sure the seeder has been run before attempting to log in.

---

## 📁 Project Structure

```
purebali/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin dashboard controllers
│   │   └── ...             # Public page controllers
│   └── Models/
├── resources/
│   └── views/
│       ├── components/
│       │   └── layouts/    # Main layouts (app, guest, admin)
│       ├── admin/          # Admin dashboard pages
│       ├── pages/          # Public-facing pages
│       └── auth/           # Authentication pages
├── routes/
│   └── web.php
└── ...
```

---

## 🤝 Contributing

Contributions are welcome! Feel free to fork this repository, create a new branch, and submit a pull request.

```bash
git checkout -b feature/your-feature-name
git commit -m "feat: add your feature"
git push origin feature/your-feature-name
```

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

<p align="center">Made with ❤️ to preserve the beauty of Balinese Culture</p>
