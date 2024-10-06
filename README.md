# Simple Forum

A simple web forum where users can post texts. It also includes two functionalities for administrators

## Features

### Pin
Admins can pin posts to highlight important discussions.

### Remove
Admins can remove posts to maintain the quality of the forum.

## Installation

If it does not exist or is not created automatically, you will have to create the `posts` table. Run this command in your database:

```
CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    pinned TINYINT(1) DEFAULT 0
);
```

## Admin Configuration and settings
To access as administrator you will have to put your credentials in /admin/admin.json
You can also change the name of the Forum on /forum/index.html


## PREVIEW
![image](https://github.com/user-attachments/assets/c701aa72-a0d0-4871-a59e-95999d33dd91)

