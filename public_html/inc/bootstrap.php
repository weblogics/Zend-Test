<?
# Defaults
$error_reporting = E_ALL;
$path = "/home/admin/Library/";

# Settings (overwrite defaults)
include('settings.php');

# Functions
include('functions.php');

# Error Reporting
error_reporting($error_reporting);

# Include Path
ini_set('include_path', get_include_path() .PATH_SEPARATOR. $path);

# Zend Framework
include("Zend/Loader.php");

# Compontents
Zend_Loader::loadClass('Zend_Config_Ini');
Zend_Loader::loadClass('Zend_Db');
Zend_Loader::loadClass('Zend_Acl');

/** /
# Configuration Settings
$config = new Zend_Config_Ini('../config.ini','production');

# Database Connection
$db = Zend_Db::factory($config->database);
/**/

# Access Control List
$ac = new Zend_Acl();
