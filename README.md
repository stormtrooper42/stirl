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

### Customisation

You can personalize completely your blog if you know about it in programming.

You can change the header by replacing the image being in public / img (home-bg).

### Add languages
For this example, I'm going to add spanish.

- Modify index.php file in /public/ folder
```php
if(isset($_COOKIE['lang'])){
  $lang = htmlspecialchars($_COOKIE['lang']);
  if($lang == "fr"){
    require_once("lang/fr.php");
  }else if($lang == "en"){
    require_once("lang/en.php");
  }
}else{
  require_once("lang/fr.php");
}
```
you can modify this like:
```php
if(isset($_COOKIE['lang'])){
  $lang = htmlspecialchars($_COOKIE['lang']);
  if($lang == "fr"){
    require_once("lang/fr.php");
  }else if($lang == "en"){
    require_once("lang/en.php");
  }else if($lang == "es"){
    require_once("lang/es.php");
  }
}else{
  require_once("lang/fr.php");
}
```
- Now modify the function getDate() of the Article.php file in app/Table folder like:
```php
public function getDate(){
  $originalDate = $this->dateOfWriting;
  $newDate = date("d/m/Y", strtotime($originalDate));

  if(isset($_COOKIE['lang'])){
	if($_COOKIE['lang'] == "fr" || $_COOKIE['lang'] == "es"){ // I added '|| $_COOKIE['lang'] == "es"'
		$newDate = date("d/m/Y", strtotime($originalDate));
	}else if($_COOKIE['lang'] == "en"){
		$newDate = date("Y/m/d", strtotime($originalDate));
	}
  }

  return $newDate;
}
```
- Then modify the header.php file in /template/ folder
```php
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav navbar-right">
		<li><a href="index.php?page=changelanguage&lang=fr"><span class="flag-icon flag-icon-fr"></span> <?php echo $translator['FRENCH_LANG']; ?></a></li>
		<li><a href="index.php?page=changelanguage&lang=en"><span class="flag-icon flag-icon-gb"></span> <?php echo $translator['ENGLISH_LANG']; ?></a></li>
		<li><a href="index.php?page=changelanguage&lang=es"><span class="flag-icon flag-icon-gb"></span> <?php echo $translator['SPANISH_LANG']; ?></a></li>
	</ul>
</div>
```
- Over soon, modify all the lang file (fr.php and en.php by default) in public/lang folder and add this line at the end of the array
```php
// DON'T FORGET TO ADD , AT THE END OF THE ABOVE LINE
"SPANISH_LANG"	 =>   "spanish"
// Repeat the action for all lang file (use translator like http://reverso.com/)
```
- Finally create a es.php file in public/lang folder, copy/paste en.php (or fr.php in es.php) and translate/complete it
```php
$translator = array(
	"FRENCH_LANG"    => "francés",
	"ENGLISH_LANG"   => "inglés",
	"HOME"           => "acogida",
	"CATEGORIES"     => "categorías",
	"ALL_CATEGORIES" => "todas",
	"ARCHIVE         => "archivo",
	"ABOUT"          => "sobre",
	// ...
```
