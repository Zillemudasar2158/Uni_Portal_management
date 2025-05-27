# University Portal Management System

A Laravel-based web application for managing a university's core operations including faculty, departments, student interactions, and image sliders.

---

## Features

* 🔐 Admin login & access control
* 📋 Faculty management (Activate/Deactivate)
* 🏢 Department listings
* 🖼️ Image slider with dynamic ordering
* 📄 Announcements & content pages
* 📚 Course-related data handling
* ✅ Secure routing and validations

---

## 🛠️ Tech Stack

* **Backend:** Laravel 8+
* **Frontend:** Blade, HTML5, CSS3, Bootstrap
* **Database:** MySQL
* **Others:** Laravel, Composer, Artisan CLI

---

## ⚙️ Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/Zillemudasar2158/University_Portal_Management.git
   cd University_Portal_Management
   ```

2. **Install dependencies**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Setup `.env`**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   * Update `.env` with your DB credentials

4. **Run migrations**

   ```bash
   php artisan migrate --seed
   ```

5. **Serve the application**

   ```bash
   php artisan serve
   ```

   Visit: [http://localhost:8000]

---

## 👤 Admin Credentials (if seeded)

* Email: `zillemudasar@gmail.com`
* Password: `12345`

---

## 📂 Folder Structure Highlights

* `app/Http/Controllers` – All your logic separated cleanly by model
* `resources/views/admin` – Admin blade views
* `routes/web.php` – Clearly organized route definitions
* `database/migrations` – All schema definitions
* `public/uploads` – For uploaded images

---

## 🔐 Security Best Practices

* Uses Laravel’s CSRF protection
* Validates user inputs
* Auth middleware for admin routes
* Avoids SQL injections using Eloquent ORM

---

## 📈 Future Enhancements

* Student registration and profiles
* Email notifications
* Role-based access
* PDF/Excel export for reports

---

## 🙌 Contributing

1. Fork the repo
2. Create your feature branch (`git checkout -b feature-name`)
3. Commit your changes (`git commit -m 'Add feature'`)
4. Push to the branch (`git push origin feature-name`)
5. Open a Pull Request

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
