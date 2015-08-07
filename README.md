# Stirl

Stirl is a blog system using PHP without framework.

  - Easy
  - Free
  - Fast

### Installation

You need to change the database info in app/Database.php and config/config.php

Database.php:

```php
public function __construct($db_name, $db_user = 'root', $db_pass = 'djason', $db_host = 'localhost'){
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;
}
```

config.php:

```php
	return array(
		"db_user" => "root",
		"db_pass" => "djason",
		"db_host" => "localhost",
		"db_name" => "blog"
	);
```
