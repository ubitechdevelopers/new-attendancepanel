<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// define('URL','http://ubiattendance.zentylpro.com/ubiattnew2/index.php/');
// define('URL1','http://ubiattendance.zentylpro.com/ubiattnew2/');
// define('IMGURL','http://ubiattendance.zentylpro.com/uploads/');
// define('IMGURL5','http://ubiattendance.zentylpro.com/ubiattnew2/uploads1/');
// define('IMGURL6','http://ubiattendance.zentylpro.com/ubiattnew2/uploads/');
// define('IMGURL1','http://ubiattendance.zentylpro.com/ubiattnew2/visits/');
// define('IMGURL2','../UBIHRM/HRMINDIA/public/');
// define('IMGURL3','http://ubiattendance.zentylpro.com/ubiattnew2/UBIHRM/HRMINDIA/public/');
// define('IMGURL4','http://ubiattendance.zentylpro.com/ubiattnew2/ubitech/');
// define('IMGUR2','http://ubiattendance.zentylpro.com/ubiattnew2/flexi/');
// define('PROFILEIMG','https://ubihrmimages.s3.ap-south-1.amazonaws.com/');
// define('IMGPATH','');
// define('LOCATION','online');
// define('IAMKEY','AKIAXILXCVAKWUSSEY7V');
// define('IAMSECRET','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');
// define('ATTENDANCEBUCKET','ubiattendanceimages');



// for live



// define('URL','https://ubinewpanel.ubihrm.com/index.php/');
// define('IMGURL','https://ubinewpanel.ubihrm.com/uploads/');
// define('IMGURL5','https://ubinewpanel.ubihrm.com/uploads1/');
// define('IMGURL6','https://ubinewpanel.ubihrm.com/uploads/');
// define('IMGURL1','https://ubinewpanel.ubihrm.com/visits/');
// define('IMGURL2','../UBIHRM/HRMINDIA/public/');
// define('IMGURL3','https://ubinewpanel.ubihrm.com/UBIHRM/HRMINDIA/public/');
// define('IMGURL4','https://ubinewpanel.ubihrm.com/ubitech/');
// define('IMGUR2','https://ubinewpanel.ubihrm.com/flexi/');
// define('PROFILEIMG','https://ubihrmimages.s3.ap-south-1.amazonaws.com/');
// define('IMGPATH','');
// define('LOCATION','local');
// define('IAMKEY','AKIAXILXCVAKWUSSEY7V');
// define('IAMSECRET','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');
// define('ATTENDANCEBUCKET','ubiattendanceimages');


define('URL','https://ubiattendance.ubihrm.com/newpanel/index.php/');
define('IMGURL','https://ubiattendance.ubihrm.com/newpanel/uploads/');
define('IMGURL5','https://ubiattendance.ubihrm.com/newpanel/uploads1/');
define('IMGURL6','https://ubiattendance.ubihrm.com/newpanel/uploads/');
define('IMGURL1','https://ubiattendance.ubihrm.com/newpanel/visits/');
define('IMGURL2','../UBIHRM/HRMINDIA/public/');
define('IMGURL3','https://ubinewpanel.ubihrm.com/UBIHRM/HRMINDIA/public/');
define('IMGURL4','https://ubinewpanel.ubihrm.com/ubitech/');
define('IMGUR2','https://ubinewpanel.ubihrm.com/flexi/');
define('PROFILEIMG','https://ubihrmimages.s3.ap-south-1.amazonaws.com/');
define('IMGPATH','');
define('LOCATION','local');
define('IAMKEY','AKIAXILXCVAKWUSSEY7V');
define('IAMSECRET','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');
define('ATTENDANCEBUCKET','ubiattendanceimages');




/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database','session');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array();
$autoload['libraries'] = array('database','session');
$autoload['helper'] = array('auth_helper','url');