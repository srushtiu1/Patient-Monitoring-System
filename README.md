Patient Monitoring System
Overview
The Patient Monitoring System is a web application designed for private clinics to manage patient information, billing, payments, and appointment status efficiently. Developed using open-source tools like PHP, Bootstrap, JavaScript, and MySQL, this system provides doctors and receptionists with a streamlined platform to handle administrative and billing tasks, track patient wait times, and generate detailed reports.

Features
Patient Information Management
Easily add and update patient details, including name, date of birth, contact information, and referral source.

Billing and Payment Tracking
Create bills, log payments, and track part, full, or excess payments. Part or excess payments are automatically adjusted in the following bill cycle.

Patient Check-In and Check-Out
Allows receptionists to check patients in and out, updating the wait time status with color-coded alerts to indicate time elapsed:

Green: Wait time under 30 minutes
Yellow: Wait time over 30 minutes
Red: Wait time over an hour
Blue: Patient checked out
Comprehensive Reporting
Generate various reports including:

Daily, Monthly, Patient-Wise Reports: Summarizes financial transactions and patient statistics.
Outstanding and Excess Reports: Tracks pending payments or overpayments. Each report can be exported as a PDF for easy sharing and record-keeping.
Wait Time Analysis and Exportable Records
Analyze average patient wait times and export complete patient details in Excel format for further analysis or backup.

Role-Based Access Control
The system provides two user roles:

Doctor (Admin): Can generate bills, manage payments, and access all reports. The doctor can also change their password.
Receptionist: Primarily handles patient check-ins, check-outs, and adding patient details.
Technical Stack
Frontend: HTML, CSS (Bootstrap), and JavaScript for a responsive, user-friendly interface.
Backend: PHP with a MySQL database for secure data storage and management.
PDF & Excel Generation: Allows exporting reports as PDF files and patient details as Excel files.
