# Stirl

Stirl is a ultra light blog system using PHP without framework.

  - Easy
  - Free
  - Fast

### Installation

- You need to modify the config file in config/config.php

config.php:

```php
	return array(
		"blog_title"=>"Votre titre",
		"blog_subtitle"=>"Votre description",
		"db_user" => "root",
		"db_pass" => "djason",
		"db_host" => "localhost",
		"db_name" => "blog"
	);
```

- Then go on http://yourdomain/index.php?page=ACCOUNTCREATION
- Create your account
- DELETE THE ACCOUNTCREATION.PHP FILE IN PAGES FOLDERS
- Go in your database, users table and change 0 to 1 in admin column
