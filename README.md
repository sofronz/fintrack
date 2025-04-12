# 💰 FinTrack

FinTrack is a simple web application built with Laravel for tracking **income** and **expenses**. It's designed as a personal finance tracker and portfolio project.

## ✨ Features

- ✅ Record income and expense transactions
- 📊 Visualize data with **category-based charts**
- 🔍 Filter by transaction type (income / expense)
- 🔄 Form validation and interactive UI feedback (toastr, loading spinners)
- 🎨 Clean and responsive interface

## 📸 Screenshot

![FinTrack Screenshot](https://github.com/user-attachments/assets/cfb3a8e4-13d2-4bbc-bec5-5f720546cf14)

## 🚀 Built With

- Laravel 10+
- Blade Template
- jQuery & AJAX
- ApexCharts.js
- Bootstrap 5
- Inputmask.js
- Toastr.js

## 🛠️ Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/sofronz/fintrack.git
   cd fintrack
   ```

2. Install PHP:
   ```bash
   composer install
   ```

3. Set up your environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Migrate and seed the database:
   ```bash
   php artisan migrate --seed
   ```

5. Run the local server:
   ```bash
   php artisan serve
   ```

## 🧠 Feature Summary

| Feature            | Description                                          |
|-------------------|------------------------------------------------------|
| Income/Expense     | Add, view, and delete transactions                   |
| Category Tracking  | Categorize transactions (e.g., Salary, Food, etc.)   |
| Chart by Category  | Pie chart visualization of income and expense data  |

## 🙋‍♂️ Contributing

Pull requests are welcome! Feel free to fork and improve the project. Don't forget to star ⭐ the repo if you find it helpful!

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).