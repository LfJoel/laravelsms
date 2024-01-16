# laravelsms
school_management_system using laravel


## Application Information

sms is school management application developed in php laravel 10.
  
User Authentication and Dashboard:

Admin Interface:

User Authentication: Implement a secure login system for administrators with encrypted password storage. Allow the admin to reset passwords, add new admin accounts, and manage user roles.

Dashboard: Provide a centralized dashboard for the admin to view and manage all aspects of the school. Include functionalities like managing staff, student enrollment, class schedules, and overall school statistics.

User Management: Allow the admin to add, edit, or remove teachers, students, and parents. Provide options for assigning roles and permissions.
Teacher Interface:

Login and Profile: Enable teachers to log in with their credentials. Allow them to update their profiles, including personal details and qualifications.

Class Management: Provide a section where teachers can view and manage their class schedules, assign grades, and input attendance.

Communication: Implement a messaging system for teachers to communicate with students and parents. Include options for sending announcements, updates, and progress reports.


Student Interface:

Login and Profile: Enable students to log in and view their personal profiles, including academic records, attendance, and contact information.

Course Information: Display the courses the student is enrolled in, along with relevant details such as schedule, teacher information, and grades.

Communication: Provide a platform for students to communicate with teachers and fellow students, facilitating discussions and queries.
Parent Interface:

Login and Profile: Allow parents to log in and view profiles for each of their children, including academic performance, attendance, and contact information.

Communication: Implement a messaging system for parents to communicate with teachers and receive updates on their child's progress.
Reports and Progress: Provide access to academic reports, attendance records, and any other relevant information about their child's educational journey.
Attendance and Academic Tracking:

Admin Interface:

Attendance Management: Develop a system for tracking and managing attendance records for both teachers and students. Allow admins to generate attendance reports.


Attendance Tracking: Enable teachers to take and manage attendance for their classes. Implement features for automated attendance reports.

Grade Entry: Allow teachers to input and manage grades for assignments, exams, and other assessments.
Student Interface:

View Attendance: Provide students with the ability to view their attendance records and receive notifications for low attendance.
Grades: Enable students to access their grades, view feedback from teachers, and track their academic progress.

## Features

#### PreLogin =>
    - Login
    - Forgot Password / Reset Password

#### PostLogin =>
    - Change Password
    - Update My profile
    - Logout

#### Role =>
    - Admin
    - Teacher
    - Student
    - Parent 

#### Chat System =>    

    - Admin
    - Teacher
    - Student
    - Parent 
    
#### Admin

    Admin =>

                - Add
                - List
                - Edit
                - Status Change
                - Delete
                - Search filter

    Student => 
                - Add
                - List
                - Edit
                - Status Change
                - Delete
                - Search filter
    Parent => 
                - Add
                - List
                - Edit
                - Status Change
                - Delete
                - Assign student to parent
                        - Edit
                        - Delete
                        - Search filter                
                - Search filter
    Teacher => 
                - Add
                - List
                - Edit
                - Status Change
                - Delete
                - Search filter            

    Academics => 
                - Add Class
                - List Class
                - Edit Class
                - Status Change
                - Delete class
                - Search filter               

                - Add subject
                - List subject
                - Edit subject
                - Status Change 
                - Delete subject
                - Search filter

                - Assign Class to teacher
                - List 
                - Edit
                - Delete
                - Search filter

                - Add class timetable 
                - Edit class timetable 
    Fees  =>         
                - Collect fees
                - Collection list
                - Search filter

                - Fees Report
                - Report list
                - Search filter
     
    Examination  =>

                 - Add Exam
                 - List Exam
                 - Edit Exam
                 - Delete Exam
                 - Search filter

                 - Add exam schedule
                 - Edit exam schedule

                 - Add student marks
                 - Print 
                 - Edit student marks
                 
                 - Add grade
                 - Edit grade
                 - Delete grade

    Attendance  =>
                  
                 - Search attendance
                 - List
                 - Add
                 - Edit

    Attendance Report =>

                 - Search filter
                 - Attendance list

    Communication =>
             
                 - Add notice board
                 - Edit notice board
                 - Delete notice board
                 - Search filter

                 - Send Email to particular user or role based

    Homework =>
               
                 - Add homework
                 - Edit homework
                 - Delete homework
                 - submitted homework list
                 - Search filter

                 - Homework report 
                 - Search filter

    My Account =>

                 - Create
                 - Update

    Settings => 

                 - Create details
                 - Update details


#### Teacher 

    My Account =>
                 - Update

    Class & Subject =>

                 - List
                 - Timetable List

    Student =>
                 - List

    Homework =>
               
                 - Add homework
                 - Edit homework
                 - Delete homework
                 - submitted homework list
                 - Search filter

                 - Homework report 
                 - Search filter

    Mark Register => 
              
                 - Add student marks
                 - Print 
                 - Edit student marks 
    Calendar => 

                 - Timetable list
                 - Exam date list

    Exam Timetable =>

                 - List

    Attendance  =>
                  
                 - Search attendance
                 - List
                 - Add
                 - Edit

    Attendance Report =>

                 - Search filter
                 - Attendance list 

    Notice Board =>

                 - List
                 - Search filter


#### Student

    My Account =>
                 - Update

    Subject =>
                 - List

    Homework =>  

                 - List
                 - Search filter

    Submitted Homework =>  

                 - List
                 - Search filter

    Calendar => 

                 - Timetable list
                 - Exam date list

    Class Timetable =>
        
                 - List

    Attendance => 

                 - List
                 - Search filter
    
    Notice Board =>

                 - List
                 - Search filter

    Exam Result => 
                
                 - Result list
   
    
    Exam Timetable =>
        
                 - List

    Fees => 

                - Pay fees

#### Parent

    My Account =>
                 - Update

    Student =>
                 - List

                Subject =>
                            - List

                Homework =>  

                            - List
                            - Search filter

                Submitted Homework =>  

                            - List
                            - Search filter

                Calendar => 

                            - Timetable list
                            - Exam date list
                Attendance => 

                            - List
                            - Search filter
    
   

                Exam Result => 
                            
                            - Result list
            
                
                Exam Timetable =>
                    
                            - List

                Fees => 

                            - Pay fees

    Notice Board =>

                 - List
                 - Search filter

    Student =>

                  - List
                  - Search Filter  



Laravel	version =>  `10.10`
PHP Version => `8.1`
MySQL Version => `8.1.17`

##### Installation

Clone the repository

```sh
git clone https://github.com/LfJoel/laravelsms.git
cd sms/school.com
```

##### Generate autoload file
In most cases, updating the Composer will regenerate the vendor folder and the autoload.php file.
```sh
composer update
```

Alternatively, we can regenerate the autoload.php file using the command,
```sh
composer dump-autoload
```

##### Generate Environmental File

You can setup individual environmental file for production and development.
For development,
```sh
copy .env.example .envdev
```

For production,
```sh
copy .env.example .envprod
```

##### Setup Application Key

After setup environmental file, generate application secret key.
```sh
php artisan key:generate
```


##### Run Server

You can run the application using below command
```sh
php artisan serve
```

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
127.0.0.1:8000
```
##### import database

before run the project database should be imported 

you can see database file in schema folder

##### seeder
For seed chat table and user table
```sh
php artisan migrate

php artisan db:seed --class=UserSeeder ,

php artisan db:seed --class=ChatTableSeeder
```



                                                

                                      



