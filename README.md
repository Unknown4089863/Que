**By default if You download this repository, not show any content because some first need to add content by first create Account then login into it and if you upload content then it will show at both logined page and by default page i.e index.php**

First Need to Create DataBase.

# Database: pulse_rate

## Tables

**1. upload**

| Column Name          | Data Type   | Description                                                                                                  |
|----------------------|-------------|-----------------------------------------------------------------------------------------------------------|
| sno                  | INT(11)     | Primary Key, Auto Increment                                                                              |
| heading              | VARCHAR(255)| Title or heading of the upload                                                                       |
| content              | TEXT        | Body or content of the upload                                                                          |
| email                | VARCHAR(255)| Email address of the user who uploaded the content                                                    |
| file                 | LONGBLOB    | Uploaded file data (binary)                                                                           |
| filename             | TEXT        | Original name of the uploaded file                                                                    |
| time                 | TIMESTAMP   | Timestamp of when the upload was created (Default: current_timestamp())                               |

**2. login**

| Column Name          | Data Type   | Description                                                                                                  |
|----------------------|-------------|-----------------------------------------------------------------------------------------------------------|
| sno                  | INT(11)     | Primary Key, Auto Increment                                                                              |
| email                | VARCHAR(50) | Email address of the user                                                                              |
| password             | VARCHAR(10) | Hashed password of the user                                                                          |
| time                 | TIMESTAMP   | Timestamp of when the login record was created (Default: current_timestamp())                               |

**3. contact**

| Column Name          | Data Type   | Description                                                                                                  |
|----------------------|-------------|-----------------------------------------------------------------------------------------------------------|
| sno                  | INT(11)     | Primary Key, Auto Increment                                                                              |
| name                 | VARCHAR(50) | Full name of the contact                                                                              |
| age                  | INT(2)      | Age of the contact                                                                                      |
| gender               | VARCHAR(5)  | Gender of the contact                                                                                  |
| email                | VARCHAR(50) | Email address of the contact                                                                              |
| phone                | VARCHAR(10) | Phone number of the contact                                                                          |
| other                | TEXT        | Additional information about the contact                                                                |
| time                 | TIMESTAMP   | Timestamp of when the contact record was created (Default: current_timestamp())                               |
