<img width="768" height="71" alt="FULL_IIUM_Official_Logo_Regis_1_Horizontal_CMYK-1-1" src="https://github.com/user-attachments/assets/54e56f28-4553-4202-b19c-81dfbd6c7592" />


**KULLIYYAH OF INFORMATION TECHNOLOGY AND COMMUNICATION**  
**INTERNATIONAL ISLAMIC UNIVERSITY MALAYSIA (IIUM)**  
---

**WEB APPLICATION DEVELOPMENT  (BIIT 2305\)**  
**SEMESTER II, 2025/2026**  
**SECTION 5**  
**GROUP PROJECT REPORT**  
**TOPIC:**  IIUM Sports Venue Reservation System 

---

**INSTRUCTOR: DR. NAJHAN BIN MUHAMAD IBRAHIM**

**GITHUB REPOSITORY: [https://github.com/AfiqZakhwan/WebApp\_IIUMSportsRevervationSystem](https://github.com/AfiqZakhwan/WebApp_IIUMSportsRevervationSystem)**

| NAME | MATRIC NUMBER |
| :---: | :---: |
| AHMAD AFNAN WAJDI BIN RAHIMI | 2414347 |
| AHMAD AMMAR NAJMI BIN NAJMUDDIN |  2410419 |
| MUHAMMAD HAZMI BIN MOHD HAFIZ  | 2419201 |
| MUHAMMAD AFIQ ZAKHWAN BIN AZZURAN | 2329169 |

**SUBMISSION DATE: 8th of June 2026**

# **1.0 EXECUTIVE SUMMARY**

## **1.1 Project Overview**

This project proposes to develop IIUM Sports Reservation System primarily for IIUM students. This system will be built using Laravel MVC that will allow users to reserve both indoor and outdoor sports courts and fields for activities such as volleyball, ping pong, badminton, and archery. To make the reservation, users must register on the website using their full name, matric number, phone number, email, and setting up the password. Small fees, as low as RM2, are needed per session and will go to management for maintenance. The system will manage the slots availability based on court or field type from 7.00am to 7.00pm, and from 9.00am to 11.00pm to honor the during prayer time. Furthermore, the users can rent items provided based on the court type chosen, such as a badminton racket and badminton shoes for users who reserve the badminton court. 

The application architecture relies on PHP 8.x, MySQL for database index management, the Blade templating engine for semantic user interfaces, and Tailwind CSS/Jetstream for a responsive layout. Shariah-compliant features are natively woven into the application logic, ensuring that sports engagement aligns with community values and prayer windows.

## **1.2 Objectives Achieved**

The project successfully achieved its main objectives:

Centralized Facility Catalog: Developed an interactive dashboard displaying badminton, ping pong, volleyball, and basketball court locations segmented cleanly by Male and Female Mahallah facilities.

Role & Profile Secure Authentication: Implemented a profile authentication system mapping custom student records including unique Matric Numbers and Phone Numbers.

Shariah-Compliant Operations: Deployed an automated system-level guard logic block that intercepts booking requests and restricts access during daily prayer windows.

Asset Management Integration Flow: Formulated an architecture redirecting successful venue reservations smoothly to the secondary equipment rental pool framework.

# 

# **2.0 PROBLEM STATEMENT**

## **2.1 Problem Background**

Managing sports complex allocations inside the International Islamic University Malaysia (IIUM) traditionally relies on manual logs, fragmented social media announcements, or physical whiteboard updates at individual Mahallah offices. Students often walk down to sports zones only to find courts occupied or locked for maintenance, resulting in low asset utilization and a poor user experience. Furthermore, standard scheduling systems lack the cultural awareness necessary to automatically pause sports activities during congregational prayer times.

## **2.2 Problem Statement**

The current sports court booking framework at IIUM suffers from several vulnerabilities:

* No real-time visibility of court availability, leading to wasted trips and scheduling conflicts   
* No enforcement of booking rules since there is no automated system   
* Management has no easy way to generate usage reports or monitor court demand   
* Student using the facilities for a long period of time, preventing other students from accessing them   
* Some facilities are in bad condition, which can lead to injuries for students who are using them. 

## **2.3 Project Objectives**

The objectives of developing the IIUM Sports Reservation System are: 

1. To develop a web-based reservation system for IIUM students to book sports courts and fields online easily and efficiently.   
2. To provide real-time availability of sports facilities so that students can check available slots without needing to visit the sports areas physically.   
3. To automate the booking management process, including reservation scheduling, payment recording, and equipment rental management.   
4. To help management monitor facility usage, generate booking reports, and manage maintenance fees collected from users.   
5. To ensure fair usage of sports facilities by limiting booking duration and preventing users from occupying facilities for excessive periods of time.   
6. To improve the condition and maintenance of sports facilities through proper fee collection and management monitoring. 

## **2.4 Project Scope**

The IIUM Sports Reservation System is a web-based application developed using the Laravel MVC framework. The system focuses on managing reservation activities for sports courts and fields within IIUM. The scope of the system includes: 

* User registration and login using matric number and password   
* Viewing real-time availability of sports courts and fields   
* Online reservation for indoor and outdoor sports facilities   
* Booking schedule management based on available time slots   
* Rental of sports equipment according to selected sports activities   
* Payment and fee recording for reservations and equipment rentals   
* Management of booking records and facility usage reports   
* Limiting booking duration to ensure fair access for all students 

The system will only be accessible to IIUM students and management staff through a web browser. 

# 

# **3.0 SYSTEM DESIGN**

## **3.1 Entity Relationship Diagram (ERD)**

<img width="537" height="398" alt="ERD" src="https://github.com/user-attachments/assets/82443f17-6ae3-4e3d-9dfd-e07cca2712c9" /><br>

<br>

The storage architecture of the IIUM Sports Facilities platform is built on a relational schema containing three primary database tables: users, venues and bookings. These entities are tightly integrated using foreign key constraints within the MySQL engine to maintain referential integrity, eliminate duplicate records, and prevent conflicting venue allocations. 

### **Table Breakdowns & Structural Mechanics**

* **users Table:** This entity serves as the identity core of the application. It stores authentication tokens, credentials, and custom student profiles. It contains unique identifiers such as Matric Numbers and Phone Numbers, establishing a single source of truth for tracking which specific individual initializes an action in the system.  
* **Venues Table:** Operating as the master facility directory, this table lists all available courts across the Male and Female Mahallah complexes. It contains descriptive attributes such as the specific court identifier and the broader categorization framework (e.g., Badminton, Ping Pong, Volleyball, Basketball, or Archery).  
* **Bookings Table:** This transactional bridge table captures the interaction between a student and a facility. It maps the operational lifecycle of a reservation by tying a user\_id to a venue\_id. It records parameters such as the reservation date, start time, and end time, allowing the backend controller to run safety checks like the Shariah prayer window guard and duration constraints.

## **3.2 System Sequence Diagram**

The sequence diagram documents the dynamic execution path and chronological message flow within the application during a venue reservation event. It maps the end-to-end transaction loop across four structural layers: the Student (Client Interface), the Web Router Engine (web.php), the Backend Request Handler (BookingController), and the Database Layer (MySQL/Eloquent ORM).  

<img width="546" height="591" alt="Sequence Diagram" src="https://github.com/user-attachments/assets/5cd6fec3-0cde-4588-bd35-e94b41c0c720" />

1. Interface Initialisation (Steps 1-5): The transaction begins when an authenticated student triggers an HTTP GET request by clicking the "Book Now" link on a specific Mahallah court card. The Web Router captures the request string and maps it directly to the controller's create() scope. The controller queries the venues table via Eloquent to ensure the resource exists, extracts its parameters, and passes them down to compile the frontend Blade view wrapper.

2. Backend Guard Interception & Execution (Steps 6-9): When the student submits their chosen timeframe via a POST form payload, the parameters are captured by the store() method. Before any data hits the storage engine, the system intercepts the execution thread to enforce three business rules:

* The Shariah Filter: Rejects the operation if the datetime array touches the 7:00 PM – 9:00 PM congregational prayer lock.  
    
* The Allocation Filter: Calculates time differences to prevent single reservations from exceeding 2 hours.  
    
* The Clashing Filter: Sweeps existing rows in the database to catch duplicate, overlapping reservations for that exact court.

State Management & Handoff (Steps 10-12): Once the validation routines confirm the timeline is clean, the controller communicates with the database layer to initialize a fresh record row. Upon a successful database write, the controller alters the execution state by issuing a redirect header. It pushes the user session back to the primary dashboard, appending an interactive flash alert variable (with('success', ...)) to update the live reservation history grid instantly.

# 

# **4.0 TECHNICAL IMPLEMENTATION**

## **4.1 Models & Database Migrations**

Five Eloquent models form the backbone of the IIUM Sports Reservation System which are User, Venue, Booking, Equipment, and Rental.

The **User** model is built on top of Laravel's Authenticatable class and comes with Jetstream's HasApiTokens, HasProfilePhoto, and TwoFactorAuthenticatable traits. On top of the standard auth fields, it stores matric\_number, phone, and a role column that distinguishes students from administrators. An isAdmin() helper method is defined to keep role checks readable across the codebase.

    php  
    public function isAdmin(): bool  
    {  
    return $this\-\>role \=== 'admin';  
    }

The **Venue** model holds court and facility records with a built-in scopeAvailable() local scope that filters only venues marked as active — this scope is what powers the student-facing dashboard so unavailable venues are never shown to students.

The **Booking** model is the central link between a student and a venue. It records the date, start time, and end time of each session, and connects outward to Rental (for equipment) and Payment via Eloquent relationships.

**Migration Snippet — bookings table:**

    php

    Schema::create('bookings', function (Blueprint $table) {

    $table\-\>id();

    $table\-\>foreignId('user\_id')\-\>constrained()\-\>onDelete('cascade');

    $table\-\>foreignId('venue\_id')\-\>constrained()\-\>onDelete('cascade');

    $table\-\>date('booking\_date');

    $table\-\>time('start\_time');

    $table\-\>time('end\_time');

    $table\-\>timestamps();

    });

Both foreign keys cascade on delete, so removing a user or venue automatically removes all related booking records without leaving orphaned data.

## **4.2 Routes Configuration**

All routes live in routes/web.php and are split into three groups — public, student, and admin.

The root / route is public and returns the welcome view with no auth requirement.

Student routes are wrapped in the auth:sanctum, jetstream.auth\_session, and verified middleware stack. These cover the entire booking journey from browsing venues all the way through to payment confirmation.

Admin routes stack an extra admin middleware on top and run under the /admin prefix with the admin.\* naming convention. Venues and Equipment each get a full set of CRUD routes, while Bookings and Users have more limited admin actions like deletion and role toggling.

    php

    // Student routes

    Route::middleware(\['auth:sanctum', config('jetstream.auth\_session'), 'verified'\])

    \-\>group(function () {

        Route::get('/dashboard', \[BookingController::class, 'index'\])\-\>name('dashboard');

        Route::get('/booking/create', \[BookingController::class, 'create'\])\-\>name('booking.create');

        Route::post('/booking/store', \[BookingController::class, 'store'\])\-\>name('booking.store');

        Route::delete('/booking/{id}', \[BookingController::class, 'destroy'\])\-\>name('booking.destroy');

    });

    // Admin routes

    Route::middleware(\['auth:sanctum', ..., 'admin'\])

    \-\>prefix('admin')\-\>name('admin.')\-\>group(function () {

        Route::get('/venues', \[AdminVenueController::class, 'index'\])\-\>name('venues.index');

        Route::post('/venues/{venue}/toggle', \[AdminVenueController::class, 'toggleAvailability'\])\-\>name('venues.toggle');

    });

## 

## **4.3 Controllers & CRUD Logic** 

AdminVenueController handles all venue management for admins. The index() method eager-loads booking counts with withCount('bookings') so the admin can see how active each venue is without triggering extra queries.

The store() and update() methods share the same validation rules. The is\_available field goes through Laravel's boolean() helper to safely handle checkbox input before hitting the database.

    php  
    public function store(Request $request)  
    {  
    $request\-\>validate(\[  
        'name'           \=\> 'required|string|max:255',  
        'sport\_type'     \=\> 'required|string|max:100',  
        'price\_per\_hour' \=\> 'required|numeric|min:0',  
        'is\_available'   \=\> 'boolean',  
    \]);

    Venue::create($request\-\>only(\[  
        'name', 'sport\_type', 'description', 'price\_per\_hour'  
    \]) \+ \['is\_available' \=\> $request\-\>boolean('is\_available', true)\]);

    return redirect()\-\>route('admin.venues.index')\-\>with('success', 'Venue created.');  
    }

A dedicated toggleAvailability() method lets admins flip a venue on or off instantly without going through the full edit form — useful for taking a court offline quickly.

The BookingController goes beyond standard validation. Its store() method runs three additional business logic checks after Laravel's built-in validation passes — a prayer time block (7:00 PM – 9:00 PM), a clash detection query against existing bookings, and a 2-hour session cap.

    php  
    // Prayer time block  
    if ($startTime\-\>lt($prayerEnd) && $endTime\-\>gt($prayerStart)) {  
    return redirect()\-\>back()  
        \-\>withErrors(\['time' \=\> 'Reservations are closed between 7:00 PM and 9:00 PM.'\]);  
    }

    // Clash detection  
    $isDoubleBooked \= Booking::where('venue\_id', $request\-\>venue\_id)  
    \-\>where('booking\_date', $request\-\>booking\_date)  
    \-\>where(function ($q) use ($request) {  
        $q\-\>where('start\_time', '\<', $request\-\>end\_time)  
          \-\>where('end\_time', '\>', $request\-\>start\_time);  
    })\-\>exists();

Booking cancellation runs inside a DB::transaction() to ensure equipment quantities are restored to inventory before the booking record is deleted, keeping stock counts accurate.

## **4.4 User Authentication & Security** 

Authentication is powered by **Laravel Jetstream and Fortify**, handling login, registration, profile updates, and two-factor authentication without custom boilerplate.

Registration goes through the CreateNewUser action class where six fields are validated — name, a unique matric number, phone, a unique email, and a confirmed password. Every new account gets assigned the student role automatically, so no student can self-register as admin.

    php  
    return User::create(\[  
    'name'          \=\> $input\['name'\],  
    'matric\_number' \=\> $input\['matric\_number'\],  
    'phone'         \=\> $input\['phone'\],  
    'email'         \=\> $input\['email'\],  
    'password'      \=\> Hash::make($input\['password'\]),  
    'role'          \=\> 'student',  
    \]);

A custom admin middleware gates every /admin/\* route by checking isAdmin() on the authenticated user. Students hitting admin URLs get a 403 response, and guests are bounced to the login page by Sanctum's auth guard before the middleware even runs.

## **4.5 Views & Blade Template Engine**

All pages extend a single Jetstream base layout. Child views inject content through @section('content') while inheriting the navbar and shared assets automatically.

Navbar links switch based on who is logged in. Admins get an Admin Panel link, students see Dashboard and My Bookings, and guests only see Login and Register — all controlled through @auth, @guest, and @if directives.

    php  
    @auth  
    @if(Auth::user()\-\>isAdmin())  
        \<a href="{{ route('admin.dashboard') }}"\>Admin Panel\</a\>  
    @else  
        \<a href="{{ route('dashboard') }}"\>Dashboard\</a\>  
        \<a href="{{ route('bookings.index') }}"\>My Bookings\</a\>  
    @endif  
    @endauth

The venue listing on the student dashboard uses @forelse so an empty state message appears automatically when no venues are available. Inline validation errors from the booking form's business logic checks — prayer time conflicts, slot clashes, and session limits — are surfaced to the user through @error directives on each relevant field.

# **5.0 USER INTERFACE DESIGN**

## **5.1 Use of Media** 

The IIUM Sports Reservation System incorporates several interactive and visual media elements to enhance the user experience. The landing page features a real sports facility photograph as the full-page background, immediately establishing context and institutional identity for IIUM students. The IIUM logo is embedded as the application's favicon and navbar brand icon, reinforcing the university's identity throughout every page.

Venue listings are presented as interactive cards, each displaying the venue name, sport type, and a "Book This Venue" call-to-action button. Status-based visual indicators are applied across the booking system — a green badge marks the booking date, while the payment confirmation banner uses a distinct blue notification bar to draw the user's attention to transaction status.

<img width="1274" height="696" alt="5 1 Available Venues" src="https://github.com/user-attachments/assets/04acbbb6-570e-4fc5-b9e4-8fb42b4af235" />

The booking form incorporates an interactive time picker with increment and decrement controls, allowing students to configure session slots intuitively. A contextual notice box within the form proactively informs users of prayer time restrictions (7:00 PM – 9:00 PM) and the 2-hour session limit, reflecting the system's Shariah-conscious design.

<img width="1379" height="736" alt="5 1 Configure Reservation Slot" src="https://github.com/user-attachments/assets/498bcc2c-9a80-4e1e-8ec3-e41a1014db00" />

## **5.2 Design, Colour Scheme & Layout** 

The application adopts a clean, institution-appropriate colour scheme built around a deep forest green primary palette, directly referencing IIUM's official branding. This is paired with white card surfaces and a soft off-white background to maintain readability and visual breathing room across all pages.

<img width="1303" height="707" alt="5 2 Welcome" src="https://github.com/user-attachments/assets/720abdc1-e842-494e-9b89-97d201b4b52b" />

The typography uses a clear sans-serif system font stack, prioritising legibility for academic users. Page headings such as "Available Venues" and "Configure Reservation Slot" are rendered in bold dark text, while supporting descriptions use lighter grey tones to establish clear visual hierarchy.

The layout follows a responsive card-based grid structure. The student dashboard arranges venue cards in a two-column grid, scaling appropriately across screen sizes. The admin panel adopts a two-panel layout — a fixed dark green sidebar for primary navigation and a white content area for data tables and stat cards. Stat cards on the admin dashboard display key metrics (Total Students, Total Revenue, Total Bookings, Active Venues) in a four-column grid, providing administrators with a quick operational overview at a glance.

<img width="1154" height="624" alt="5 2 Admin Dashboard" src="https://github.com/user-attachments/assets/870fdce0-26b2-4095-b51f-9f5b5a46041a" />

<br>## **5.3 Navigation and Links**

Navigation is role-based and dynamically rendered through Blade directives. Students see "Dashboard" and "My Bookings" in the top navbar, while administrators access a persistent left sidebar containing links to Dashboard, Venues, Equipment, Bookings, and Users. The navbar also displays the authenticated user's name with a dropdown for profile and logout actions.

<img width="1232" height="681" alt="5 3 Available Venues" src="https://github.com/user-attachments/assets/1549ea04-aea3-4da8-9eef-f3fa0c75accc" />


The registration page provides a structured entry point for new users, collecting essential details including Full Name, Matric Number, Phone Number, Email Address, and Password before granting access to the system. Unauthenticated visitors can only reach the Login and Register pages, with all student and admin routes protected from unauthorized access. Any attempt to access protected routes without authentication automatically redirects the user back to the login screen, enforcing strict role separation between students and administrators. 

<img width="1296" height="722" alt="5 3 Register Account" src="https://github.com/user-attachments/assets/e085f743-66d3-402a-9093-8a9867067153" />


# 

# **6.0 CHALLENGES AND SOLUTIONS**

These are the challenges that we as a team faced during the development of this project:

## **6.1 Technical Challenges**

1. **Shariah-Compliant Automation & Time-Blocking**: One of the core business logic challenges was programmatically locking facility reservations during congregational prayer times (specifically the 7:00 PM – 9:00 PM Maghrib and Isha window). Ensuring the system dynamically rejected reservation arrays that overlapped with this timeframe required strict backend interceptors. This was resolved by implementing a custom validation array check inside the BookingController's store() method that evaluates incoming reservation arrays against a predefined conditional timestamp constraint before issuing a database write.  
     
2. **Database Migration Sequencing & Engine Conflicts**: During the schema initialization phase, the development team frequently encountered relational database errors—specifically Base table or view already exists and Foreign key constraint failures when resetting tables. This occurred because default Laravel Jetstream/Fortify dependencies required helper tables (such as sessions and cache for login throttling) before custom tables could link to user identifiers. This was resolved by reordering the migration execution files chronologically, clearing the framework optimization state using php artisan optimize:clear, and executing structural rebuilds via php artisan migrate:fresh to synchronize the MySQL schema perfectly.  
     
3. **Multi-Scope Controller Variable Passing**: An early integration challenge involved binding the dynamically generated facility index grid (dashboard.blade.php) to the individual reservation transaction route. Clicking "Book Now" on a specific facility card occasionally failed to forward data down the request pipeline, throwing blank variable or null routing exceptions. The team resolved this by refactoring the system's routing closures in web.php and updating BookingController@create to capture explicit route parameter bindings, cleanly injecting the targeted venue\_id into the user's booking view.  
     
4. **Concurrent and Duplicate Booking Clashes**: During system testing, it was discovered that a student could inadvertently submit overlapping booking records for the exact same Mahallah court by rapidly double-clicking the reservation button or requesting a matching timeframe. To preserve database integrity, the BookingController's storage validation mechanism was updated with a thorough lookahead constraint using Eloquent's exists() query builder:


# 

# **7.0 CONCLUSION**

## **7.1 Conclusion** 

The IIUM Sports Venue Reservation System successfully replaces a manual, unstructured approach to campus sports facility management with a high-performance web application engineered using the Laravel Model-View-Controller (MVC) framework. By digitalizing court availability logs, the system addresses core administrative pain points such as lack of real-time visibility, unfair facility hoarding, and conflicting schedule double-bookings.

Crucially, the platform demonstrates that modern web applications can seamlessly uphold institutional and Islamic values. Through the automated enforcement of Shariah-compliant policy boundaries specifically blocking facility usage during the daily congregational prayer windows of Maghrib and Isha (7:00 PM to 9:00 PM)the system preserves campus spiritual welfare without administrative overhead. Furthermore, by establishing an affordable RM2 micro-maintenance fee pipeline alongside an automated equipment rental module, the system ensures financial sustainability and preserves equipment health. Ultimately, the system delivers an optimal equilibrium between student convenience and administrative facility control.

## **7.2 Future Improvements**

To advance the technical capabilities and usability of the platform beyond the current build, several systemic upgrades are proposed for future development iterations:

1. **Integrated Secure Payment Gateways:** Transitioning from mock tracking schemas to live API processing (such as ToyyibPay or Stripe) to collect maintenance fees and item rental balances securely at the exact point of checkout.  
2. **Interactive Visual Calendar Interface:** Introducing a dynamic, front-end calendar layout (using FullCalendar.js or a reactive Vue/Livewire wrapper) to let students visually view, click, and interact with open or reserved slots on a live timeline.  
3. **Automated Notification Engines:** Integrating micro-messaging or mailing communication APIs (such as Twilio or Mailgun) to instantly trigger confirmation text alerts, digital booking tokens, or reservation update summaries directly to student devices.  
4. **IoT Smart Facility Access Control:** Linking the Laravel database architecture with physical Internet-of-Things (IoT) smart doors or court gates at the complexes, enabling automated entrance verification via unique QR code scans tied to active booking timestamps.  
 


# **8.0 INDIVIDUAL CONTRIBUTION**

1. Afnan

As the front-end and integration engineer, my primary contributions centered on user security, theme customization, and system handoff:

* **Authentication & Custom Schema**: Deployed user session handling using Laravel Jetstream and Sanctum. Modified the baseline database migrations and authentication controllers to validate unique student attributes, specifically Matric Numbers and Phone Numbers.  
* **UI & Theme Implementation**: Developed the application's visual identity around a custom Emerald Green palette reflecting IIUM's colors. Built responsive frontend grid structures using backdrop-blur overlay cards integrated with localized media underlays (image\_9a6386.jpg).  
* **Institutional Branding Integration**: Refactored isolated Jetstream blade templates (application-mark.blade.php and authentication-card-logo.blade.php) to substitute default branding with the official IIUM emblem across mobile and desktop displays.  
* **Dashboard Data Binding**: Programmed the main facility index page (dashboard.blade.php) to dynamically loop through database venue rows. Collaborated with Member 2 to refactor controller scope enclosures, ensuring clicking "Book Now" cleanly passes the required venue details to the reservation form.  
    
2. Hazmi

As the backend developer responsible for the admin system, my primary contribution was designing and building the entire administration layer of the application from scratch, as the original system only supported student-facing features.

* **Admin Panel Development**: Architected and implemented the full admin dashboard including summary stat cards displaying total students, revenue, bookings, active venues, and equipment types. Built the Recent Bookings table with real-time data pulled from the database.  
* **Admin CRUD for Venues**: Developed the complete venue management module allowing admins to create, edit, update, and delete sports facilities. Implemented a toggleAvailability() function enabling admins to instantly take venues offline without deletion, and integrated withCount('bookings') eager loading to display booking activity per venue.  
* **Admin CRUD for Equipment**: Built the equipment management module with full create, edit, update, and delete functionality, including stock quantity tracking tied directly to the rental system.  
* **User Management**: Implemented the admin user directory with role promotion (Make Admin) and account deletion capabilities, with safeguards preventing admins from deleting their own account.  
* **Admin Middleware & Route Protection**: Created and registered the custom admin middleware that gates all /admin/\* routes, returning HTTP 403 for unauthorized access attempts.  
* **Admin Bookings Overview**: Built the admin bookings index showing all platform reservations with student name, venue, date, and payment status for full operational visibility.  
    
3. Ammar  
   As the core backend developer responsible for availability and reservation mechanics, my primary contributions centered on booking orchestration, Shariah compliance automation, and schedule conflict resolution:   
* **Shariah-Compliant Policy Automation:** Formulated and deployed automated backend guard clauses utilizing Carbon time-parsing methods to proactively catch, intercept, and reject reservation queries that intersect with the evening congregational prayer window (7:00 PM to 9:00 PM) to preserve campus spiritual welfare.   
* **Double-Booking & Fair-Use Guard Clauses:** Engineered robust database conditional queries within the reservation pipeline to automatically block overlapping court requests on matching dates, while integrating strict operational boundaries that restrict individual user sessions to a maximum of 2 hours.   
* **Relational Database & Model Architecture:** Architected and migrated the underlying database schemas for the venues and bookings tables. Programmed the structured, cascading one-to-many Eloquent relationship frameworks to natively map physical campus infrastructure to transactional student data records.   
* **Core Business Logic Implementation:** Programmed the entire request-orchestration backend logic within BookingController.php to handle endpoint indexing, coordinate parameter validation, and secure the persistence of active facility reservation blocks. 

4. Afiq

As the developer tasked with integrating the equipment inventory and financial checkout systems, my primary contributions focused on bridging the venue reservation phase with the necessary sports gear rentals. My responsibilities encompassed backend controller logic, database design, and frontend user interfaces for the rental module:

* Inventory Checkout and Booking Integration: Engineered the RentalControlleer to handle the equipment checkout process, establishing a direct relational link to the Booking ID generated in the previous step. The logic is programmed to dynamically read the sport type selected by the user and query the database to fetch only the relevant, matching sports gear.  
* Availability Validation and Dynamic Pricing Engine: Formulated crucial backend validation checks to ensure items could only be checked out if their quantity\_available was greater than zero. Additionally, a financial computation algorithm built within the controller. This logic accurately tallies the aggregate cost of the selected rental equipment and automatically injects the mandatory RM2 base booking fee into the final financial sum.  
* Database Architecture (Models and Migrations): Architected the database structure for the inventory system by creating the migrations and Eloquent models for Equipment.php and Rental.php. This included defining the correct relationships (e.g., one-to-many or many-to-many) to ensure database integrity between bookings, user rentals, and stock levels.  
* Routing Configuration: Configured the necessary endpoints in routes/web.php (GET/booking/{id}/rental) and POST/booking/{id}/rental) to smoothly route the user from the venue booking pages to the rental catalog, and finally to process their selected inventory submission.

  # 

# **9.0 REFERENCES**

1. Otwell, T. (2026). *Laravel documentation: The PHP framework for web artisans*. 	Laravel.  [https://laravel.com/docs](https://laravel.com/docs)  
2. Wang, L. (2017). Design and implementation of online booking system of university sports venues. *MATEC Web of Conferences*, 100, 02024\. [https://doi.org/10.1051/matecconf/201710002024](https://www.google.com/search?q=https://doi.org/10.1051/matecconf/201710002024)   
3. Carbon. (2026). *Carbon: A simple PHP API extension for DateTime*. Nesbot. [https://carbon.nesbot.com/docs/](https://www.google.com/search?q=https://carbon.nesbot.com/docs/)   
   
