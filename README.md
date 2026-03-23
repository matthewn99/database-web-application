# Database Web Application

This project is a database-driven web application developed as part of a university course. It demonstrates backend development concepts such as data generation, database interaction, and CRUD operations using a relational database.

---

## Overview

The project consists of two main components:

- A **Java application (JDBC)** for generating and inserting test data into the database  
- A **PHP web application (OCI8)** for interacting with and displaying data via a web interface  

The system models realistic relationships between entities and ensures data consistency through proper use of primary and foreign keys.

---

## Features

- Full **CRUD functionality** (Create, Read, Update, Delete)  
- Integration with a **relational database (Oracle)**  
- Data generation using **Java and JDBC**  
- Web-based data interaction using **PHP and OCI8**  
- Implementation of a **stored procedure** with input and output parameters  
- Handling of structured and relational data with realistic constraints  

---

## Screenshots

![Application Screenshot](https://github.com/matthewn99/database-web-application/blob/main/docs/Application%20Screenshot.png?raw=true)

---

## Technologies Used

- **Java (JDBC)** – data generation and database insertion  
- **PHP (OCI8)** – web application and database access  
- **SQL / Oracle Database** – relational database design and queries  
- **Docker (university environment)** – application and database access  
- **HTML / Web Technologies** – frontend structure  

---

## Java Component (Data Generation)

The Java application was developed to insert large volumes of test data into the database.

Key aspects:
- Generation of realistic datasets with valid relationships  
- Use of **INSERT statements via JDBC**  
- Ensuring referential integrity between tables  
- Handling multiple tables with hundreds to thousands of records  

---

## Web Application (PHP + OCI8)

The PHP application provides access to selected parts of the database via a web interface.

Key features:
- CRUD operations across multiple entities  
- Interaction with the database using **OCI8**  
- Execution of a **stored procedure** with:
  - User-provided input parameters  
  - Output parameters displayed in the UI  

---

## Database Design

- Relational schema based on a physical database design  
- Use of **primary keys and foreign keys**  
- Structured data with realistic relationships between entities  

---

## Project Structure

- java/ - Java application for data generation (JDBC)
- php/ - Web application (PHP + OCI8)
- database/ - SQL scripts (create, drop)
- docs/ - Documentation, diagrams and deployment instructions

---

## Environment & Deployment

This project was developed and tested in a university-provided environment.

- The application and database were accessed through a **Docker-based setup**  
- Connection to the database required the university server configuration  
- Some environment-specific settings may be required to fully run the project  

---

## Disclaimer

This project was originally designed to run within a university Docker/server environment.  
As a result, the full deployment may require additional configuration outside of this environment.

---

## Learning Outcomes

Through this project, I gained practical experience in:

- Backend development and database integration  
- Working with **JDBC and OCI8**  
- Implementing CRUD operations  
- Designing and managing relational databases  
- Handling structured data and ensuring data consistency  

---

## Author

Matthew Nachbaur
