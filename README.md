# WebApp_IIUMSportsRevervationSystem

[Group 1_Proposal BIIT 2305 Group Project.pdf](https://github.com/user-attachments/files/28195010/Group.1_Proposal.BIIT.2305.Group.Project.pdf)

<img width="551" height="91" alt="image" src="https://github.com/user-attachments/assets/c0fc8500-0b96-4b9a-aa03-1b6129d7af6c" />

<br>**KULLIYYAH OF INFORMATION AND COMMUNICATION TECHNOLOGY**

**SEMESTER II, 2025/2026**

**BIIT 2305 - Web Application Development**

**Project Proposal**

Lecturer: Dr Najhan bin Muhamad Ibrahim

**Section: 5**

**Group 1**

**Project Title: IIUM Sports Reservation System**

| No. | Name  | Matric No.  |
| --- | :---- | ----------- |
| 1.  | AHMAD AFNAN WAJDI BIN RAHIMI | 2414347 |
| 2.  | AHMAD AMMAR NAJMI BIN NAJMUDDIN | 2410419 |
| 3.  | MUHAMMAD AFIQ ZAKHWAN BIN AZZURAN | 2329169 |
| 4.  | MUHAMMAD HAZMI BIN MOHD HAFIZ | 2419201 |

**Submission Date: 24 May 2026**

**GitHub Link:** https://github.com/AfiqZakhwan/WebApp_IIUMSportsRevervationSystem.git

------------------------------------------------------------------------------------------------------

## 1.1 INTRODUCTION

This project proposes to develop IIUM Sports Reservation System primarily for IIUM students. This system will be built using Laravel MVC that will allow users to reserve both indoor and outdoor sports courts and fields for activities such as volleyball, ping pong, badminton, and archery. To make the reservation, users must register on the website using their full name, matric number, phone number, email, and setting up the password. Small fees, as low as RM2, are needed per session and will go to management for maintenance. The system will manage the slots availability based on court or field type from 7.00am to 7.00pm, and from 9.00am to 11.00pm to honor the during prayer time. Furthermore, the users can rent items provided based on the court type chosen, such as badminton racket and badminton shoes for users who reserve the badminton court. 

---

## 1.2 PROBLEM STATEMENT

### 1.2.1 Background of the problem

Currently there are no reservation systems for any of the sports courts or fields. Students have no way of checking real time availability without physically going to the sports places. This process is highly inefficient and leads to disappointment for students who are staying far away from the sports areas. Other than that, some of the sports facilities are in bad condition due to lack of proper maintenance from management. This is not only unacceptable, but the students can get injured while using the facilities that are not properly maintained. To tackle all these problems, IIUM Sports Reservation System is developed to allow all users to check the real time slot availability, booking management, and fee recording. It is designed to be easily accessible to almost every university student using a web browser on their devices. 

### 1.2.2 Problem Statement

The specific problems with the current unavailability of booking process include: 
- No real-time visibility of court availability, leading to wasted trips and scheduling conflicts
- No enforcement of booking rules since there is no automated system
- Management has no easy way to generate usage reports or monitor court demand
- Student using the facilities for a long period of time, preventing other students from accessing them
- Some facilities are in bad condition, which can lead to injuries for students who are using them.

---

## 1.3 PROJECT OBJECTIVE

The objectives of developing the IIUM Sports Reservation System are: 

1. To develop a web-based reservation system for IIUM students to book sports courts and fields online easily and efficiently.  

2. To provide real-time availability of sports facilities so that students can check available slots without needing to visit the sports areas physically.  

3. To automate the booking management process, including reservation scheduling, payment recording, and equipment rental management.  

4. To help management monitor facility usage, generate booking reports, and manage maintenance fees collected from users.  

5. To ensure fair usage of sports facilities by limiting booking duration and preventing users from occupying facilities for excessive periods of time.  

6. To improve the condition and maintenance of sports facilities through proper fee collection and management monitoring. 

---

## 1.4 PROJECT SCOPE

### 1.4.1 Scope

The IIUM Sports Reservation System is a web-based application developed using the Laravel MVC framework. The system focuses on managing reservation activities for sports courts and fields within IIUM. The scope of the system includes:
- User registration and login using matric number and password
- Viewing real-time availability of sports courts and fields
- Online reservation for indoor and outdoor sports facilities
- Booking schedule management based on available time slots  
- Rental of sports equipment according to selected sports activities
- Payment and fee recording for reservations and equipment rentals
- Management of booking records and facility usage reports
- Limiting booking duration to ensure fair access for all students

The system will only be accessible to IIUM students and management staff through a web browser.

### 1.4.2 Targeted User

The targeted users for the IIUM Sports Reservation System are:
- IIUM students who want to reserve sports courts or fields  
- Sports centre management staff responsible for monitoring reservations and facility maintenance

### 1.4.3 Specific Platform

The system will be developed as a web application using the following platform and technologies:

**Software Requirements**
- Laravel framework
- PHP programming language
- MySQL database
- HTML, CSS, and JavaScript for frontend development  
- XAMPP or Laragon as local server environment

**Hardware Requirements** 
- Laptop or desktop computer for development  
- Internet connection for accessing the system  
- Web browser such as Google Chrome or Mozilla Firefox  

 **Network Requirements**
- Stable internet connection for online reservation access  
- Localhost server during development and web hosting server during deployment

<br>

Sequence Diagram

<img width="546" height="591" alt="Sequence Diagram" src="https://github.com/user-attachments/assets/bf9a6692-cd01-4b94-b76b-8e1a743488f2" /><br>

<br>

Entity Relationship Diagram (ERD):

<img width="537" height="398" alt="ERD" src="https://github.com/user-attachments/assets/bfd67cb3-3a36-4301-9f56-9a53ac97a127" /><br>


---

## 1.5 CONSTRAINTS

Developing the IIUM Sports Reservation System involves several critical constraints that the development team must navigate to ensure successful delivery: 
- Strict Timeline: The fully functional, error-free web application must be completed and ready for a live presentation by Week 14. 

- Laravel Learning Curve: The team must quickly master and implement advanced framework components like Eloquent ORM, Blade Engine, and complex Controller routing under a tight deadline. 

- Resource Limitations: Development relies entirely on local open-source setups (XAMPP, MySQL, and GitHub) due to a lack of budget for live deployment or paid third-party tools. 

- Shariah & Scope Alignment: All system logic, features, and content must strictly adhere to Shariah-compliant guidelines specified by the Kulliyyah.

---

## 1.6 PROJECT STAGES

The development lifecycle is divided into two main parts, broken down into the following milestones:

Milestone Breakdown:
- **Phase 1: Project Initiation & Proposal (Week 11):** Defining system scope, designing the Entity Relationship Diagram (ERD) and Sequence Diagram, and preparing the GitHub proposal draft. 

- **Phase 2: Local Database & Backend Setup (Week 12):** Configuring the local server environment, migrating MySQL database tables using phpMyAdmin based on the ERD, and setting up secure User Authentication. 

- **Phase 3: Frontend & CRUD Integration (Week 13):** Building user interfaces using the Blade Engine and developing controllers to handle real-time court availability, bookings, and equipment rentals. 

- **Phase 4: Testing & Final Presentation (Week 14):** Conducting local system testing to eliminate bugs, documenting the final report on GitHub, and delivering the live 15-minute presentation. 

<br> Gantt Chart <br>

<img width="540" height="146" alt="Gantt Chart" src="https://github.com/user-attachments/assets/14e2723c-9748-4863-9c4e-83a5a2176744" />

---

## 1.7 SIGNIFICANCE OF THE PROJECT

The IIUM Sports Reservation System delivers meaningful advantages to both primary user groups by transforming a manual, physical process into a streamlined digital experience. 

a. For IIUM Students 
- Eliminates Wasted Trips: Students gain immediate, real-time visibility into court and field availability, eliminating the need to walk to sports areas just to check open slots. 

- Convenient Resource Access: Allows students to securely book slots and rent necessary equipment (like badminton rackets and shoes) from any web browser. 

- Guarantees Fair Play: By automating booking rules and setting strict duration limits, the system prevents single groups from hogging facilities for excessive periods. 

- Enhances Safety: The implementation of a structured fee model provides resources to fix broken amenities, greatly reducing the risk of sports-related injuries. 

b. For Sports Centre Management Staff 
- Automates Administration: Drastically reduces manual paperwork by taking over scheduling, payment logging, and equipment tracking. 

- Data-Driven Insights: Empowers the management team to effortlessly monitor court demand and generate comprehensive facility usage reports.  

- Optimised Maintenance Funds: Establishes an organised, transparent system to collect and record the RM2 maintenance fees required to sustain facility conditions. 

- Effortless Policy Enforcement: Systematically enforces operating hours and automatically respects daily prayer time closures without requiring constant human oversight.

---

## 1.8 SUMMARY

The IIUM Sports Reservation System is a web-based solution engineered using the Laravel MVC framework to replace the university’s currently non-existent booking infrastructure. By resolving core operational pain points such as lack of real-time visibility, unfair facility hoarding, and deteriorating court conditions, the application successfully bridges the gap between student convenience and administrative control. 

Through features like live slot tracking, automated equipment rentals, and an affordable RM2 maintenance fee model, the system promotes fair access and a safer sporting environment. Developed systematically across four strategic phases using open-source tools (XAMPP, PHP, and MySQL), this project adheres to strict Kulliyyah timelines and Shariah-compliant guidelines, culminating in a fully functional, bug-free live system demonstration by Week 14. 

---

## 1.9 REFERENCES
1. Otwell, T. (2026). Laravel documentation: The PHP framework for web artisans. Laravel.  
https://laravel.com/docs 

2. Wang, L. (2017). Design and implementation of online booking system of university sports venues. MATEC Web of Conferences, 100, 02024.  
https://doi.org/10.1051/matecconf/201710002024 
