# Online Examination System

## Introduction

The Online Examination System is a Laravel-based web application that allows educational institutions to conduct exams digitally. This system includes an admin dashboard, user management, exam scheduling, and result evaluation.

---

## **Technologies Used**

- **Backend:** Laravel (PHP Framework)
- **Frontend:** HTML, CSS
- **Database:** MySQL
- **Authentication:** Laravel built-in authentication system

---

## **Installation and Setup**

### **1. Clone the Repository**

```bash
git clone https://github.com/your-repository.git
cd online-exam-system
```

### **2. Install Dependencies**

```bash
composer install
npm install
```

### **3. Configure Environment**

Copy the `.env.example` file and update your database details:

```bash
cp .env.example .env
php artisan key:generate
```

Update the `.env` file with your database credentials:

```
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### **4. Run Database Migrations**

```bash
php artisan migrate --seed
```

### **5. Serve the Application**

```bash
php artisan serve
```

Access the system at `http://127.0.0.1:8000`

---

## **Features**

### **Admin Dashboard**

- Manage Subjects
- Create and schedule exams
- Define marks distribution
- Add and manage questions
- Manage student registrations
- Review exams and publish results

### **User Features**

- Register and login
- View available exams
- Take exams with a countdown timer
- Submit exams
- View exam results

---

## **Exam Flow**

1. Admin creates an exam and adds questions.
2. Students log in and attempt the exam within the allocated time.
3. Objective answers are auto-graded, while subjective ones await admin review.
4. Admin publishes the final results.

---

## **Result Evaluation**

- Auto-grading for objective questions.
- Manual review for subjective answers.
- Results are displayed after admin approval.

---

## **Important Routes**

### **Authentication Routes**

- `/register` - User registration
- `/login` - User login
- `/logout` - User logout
- `/forget-password` - Request password reset
- `/reset-password` - Reset user password

### **Admin Routes**

- `/admin/dashboard` - Admin dashboard
- `/add-subject` - Add new subject
- `/edit-subject` - Edit subject details
- `/delete-subject` - Delete a subject
- `/admin/exam` - Exam dashboard
- `/add-exam` - Add new exam
- `/update-exam` - Update exam details
- `/delete-exam` - Delete an exam
- `/admin/qna-ans` - Manage Questions and Answers
- `/add-qna-ans` - Add new Q&A
- `/update-qna-ans` - Update Q&A
- `/delete-qna-ans` - Delete Q&A
- `/admin/students` - Manage student list
- `/add-student` - Add new student
- `/edit-student` - Edit student details
- `/delete-student` - Delete a student
- `/admin/marks` - Exam marks distribution
- `/update-marks` - Update marks
- `/admin/review-exams` - Review exams

### **Student Routes**

- `/dashboard` - Student dashboard
- `/exam/{id}` - Take exam
- `/exam-submit` - Submit exam
- `/results` - View results
- `/review-student-qna` - Review Q&A

---

## **Contributing**

Feel free to fork this repository and submit pull requests with improvements.

---

## **License**

This project is licensed under the MIT License.

---

## **Contact**

For any queries, reach out to `your-email@example.com`.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(56).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(57).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(58).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(59).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(60).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(61).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(62).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(63).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(64).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(65).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(66).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(67).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(68).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(69).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(70).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(71).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(72).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(73).png)
![alt text](https://github.com/fuad7161/Project/blob/main/Picture/Screenshot%20(74).png)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
