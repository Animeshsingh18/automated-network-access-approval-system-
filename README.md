In this project, we developed a robust web application for managing and tracking user 
applications through various approval stages. The application, built with PHP and
MySQL, incorporates essential functionalities such as user authentication, application
status tracking, history logging, and security enhancements using TLS encryption.

User Authentication and Login
• Login Page: We implemented a secure login system that allows users to enter
their username and password to access the application. The login page initiates
a session for the user, ensuring that only authenticated users can access their
application status and history.
• Session Management: Upon successful login, a session is created for the user.
This session is used to maintain the user's state across different pages of the
application, providing a seamless user experience.




<img width="307" alt="Screenshot 2024-07-02 at 9 58 42 PM" src="https://github.com/Animeshsingh18/automated-network-access-approval-system-/assets/123716564/58e4d547-69d5-4fad-835f-615ae4613ef3"><img width="366" alt="Screenshot 2024-07-02 at 10 15 31 PM" src="https://github.com/Animeshsingh18/automated-network-access-approval-system-/assets/123716564/b647c99a-a7c9-4529-b834-08d74443a609">






User Dashboard
• Personalized Dashboard: After logging in, users are redirected to a
personalized dashboard where they can view the status of their applications.
The dashboard is designed to be user-friendly and informative.
• Application Status Tracking: The dashboard provides detailed information
about the current status of the user's application. It displays whether the
application is under processing, approved at different levels, or rejected. This is
achieved through querying various tables in the database (history, form4,
form3, form2, form, user1, user2, user3).
• Detailed Status Messages: Users receive clear messages regarding their
application status. For example, if an application is approved at level 3, the
user sees a specific message indicating this. Similarly, if the application is
rejected at any level, the user is informed accordingly.



<img width="1036" alt="Screenshot 2024-07-02 at 10 24 53 PM" src="https://github.com/Animeshsingh18/automated-network-access-approval-system-/assets/123716564/25e06331-e844-4012-b97d-6034dde7e9ad">









Application Records Management
Database Integration: The application is integrated with a MySQL database, which stores all the application data. Different tables are used to manage different stages and statuses of applications.
Dynamic Data Fetching: The application dynamically fetches and displays data from the database based on the user's session and queries, ensuring that the information is always current.

<img width="1470" alt="Screenshot 2024-07-02 at 9 57 58 PM" src="https://github.com/Animeshsingh18/automated-network-access-approval-system-/assets/123716564/ae3f4bcc-2f34-479b-8bb5-578c4c3d5917"> 









History and Reporting
Comprehensive History Tracking: The application includes a history page that logs all received applications. It separates approved applications (history table) from rejected ones (history2 table) for clear differentiation.
Search Functionality: The history page includes a search bar that allows users to search through application records based on various criteria such as system, operating system, IP, and date. This makes it easy to find specific records.
User-Friendly Interface: The history page features a clean and responsive design, enhancing the user experience with easy-to-navigate tables and intuitive search options.

<img width="1469" alt="Screenshot 2024-07-02 at 10 10 25 PM" src="https://github.com/Animeshsingh18/automated-network-access-approval-system-/assets/123716564/49e1f897-3e01-44f5-9d48-7afbb83bcd98">










Security Enhancements
TLS Implementation: To ensure secure data transmission between the client and server, we implemented Transport Layer Security (TLS) using a self-signed certificate. This encryption mechanism protects sensitive user data from being intercepted during transmission.
OpenSSL for Certificate Generation: We used OpenSSL to generate the self-signed certificate and configured it with the web server. This step was crucial for establishing a secure communication channel.

![image](https://github.com/Animeshsingh18/automated-network-access-approval-system-/assets/123716564/a7748a65-c11e-4a03-b185-4b969e8ea35a)




