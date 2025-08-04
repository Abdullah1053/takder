# Takder (تقدير)

An effortless, intuitive SaaS for Project Management.

![Laravel Badge](https://img.shields.io/badge/Built%20with-Laravel-FF2D20.svg?style=for-the-badge&logo=laravel)
![Vue Badge](https://img.shields.io/badge/Frontend-Vue.js-4FC08D.svg?style=for-the-badge&logo=vue.js)
![TailwindCSS Badge](https://img.shields.io/badge/Styled%20with-TailwindCSS-06B6D4.svg?style=for-the-badge&logo=tailwindcss)

---

## 📑 Table of Contents

- [About The Project](#about-the-project)  
- [Core Features](#core-features)  
- [Tech Stack](#tech-stack)  
- [Local Development Setup](#local-development-setup)  
- [License](#license)

---

## 📌 About The Project

**Takder** (تقدير - Arabic for "estimation" or "appreciation") is a clean, fast, and intuitive project management SaaS platform.

**Vision**: To empower small teams, freelancers, and startups to manage their work effectively without the clutter or complexity of enterprise tools.

Takder aims to hit the balance between overly simplistic task managers and feature-bloated platforms like Jira or Asana — offering just what’s needed for productive teamwork and nothing more.

**Target Audience:**

- Freelancers managing multiple client projects  
- Startups and small teams (2–20 people)  
- Agile development teams  
- Marketing and creative agencies  

---

## 🚀 Core Features

### 🏢 Organization & Team Management
- Invite team members with expiring email links  
- Define roles:  
  - **Owner**: Full access  
  - **Member**: Limited to their projects  
- Update organization name/logo  

### 📋 Project Management
- Create and manage projects and tasks  
- Tasks include title, description, assignee, due date, and status  
- Visual **Kanban board** for managing workflows  

### 👤 User Authentication & Profile
- Register, log in, and reset password securely  
- Update user profile, password, and picture  

### 💳 Subscription & Billing
- Free, Pro, and Business plans with usage limits  
- Seamless integration with **Stripe**  
- Billing portal for managing payments and invoices  

---

## 🧰 Tech Stack

- **Backend**: Laravel 12.x  
- **Frontend**: Vue 3 (Composition API)  
- **Bundler**: Vite.js  
- **Authentication**: Laravel Breeze (Vue + Inertia)  
- **Database**: PostgreSQL  
- **Multi-Tenancy**: `spatie/laravel-multitenancy`  
- **Billing**: Laravel Cashier  
- **UI Styling**: Tailwind CSS  

---

## 🧑‍💻 Local Development Setup

To set up the project on your local machine:

### 1. Clone the Repository
```bash
git clone https://github.com/Abdullah1053/takder.git
cd takder
```

### 2. Create Your Environment File
```bash
cp .env.example .env
```

### 3. Install PHP & Composer Dependencies
```bash
composer install
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Install Node Dependencies & Compile Assets
```bash
npm install
npm run dev
```

Your application should now be running at:  
[http://localhost](http://localhost)

---

## 📄 License

This project is licensed under the **MIT License**. See the `LICENSE.md` file for full details.
