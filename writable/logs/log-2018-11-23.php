<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2018-11-23 04:16:56 --> Class 'App\Controllers\CardModel' not found
#0 /var/www/html/cct/system/CodeIgniter.php(810): App\Controllers\Home->test()
#1 /var/www/html/cct/system/CodeIgniter.php(307): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#2 /var/www/html/cct/system/CodeIgniter.php(221): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /var/www/html/cct/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2018-11-23 04:25:12 --> Use of undefined constant CI_ENV - assumed 'CI_ENV' (this will throw an Error in a future version of PHP)
#0 /var/www/html/cct/public/custom.php(7): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/var/www/html/c...', 7, Array)
#1 /var/www/html/cct/application/Controllers/Home.php(19): poop(Object(App\Models\CardModel))
#2 /var/www/html/cct/system/CodeIgniter.php(810): App\Controllers\Home->test()
#3 /var/www/html/cct/system/CodeIgniter.php(307): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /var/www/html/cct/system/CodeIgniter.php(221): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /var/www/html/cct/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2018-11-23 04:27:02 --> Undefined variable: _SESSION
#0 /var/www/html/cct/public/custom.php(45): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/var/www/html/c...', 45, Array)
#1 /var/www/html/cct/application/Controllers/Home.php(19): poop(Object(App\Models\CardModel))
#2 /var/www/html/cct/system/CodeIgniter.php(810): App\Controllers\Home->test()
#3 /var/www/html/cct/system/CodeIgniter.php(307): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /var/www/html/cct/system/CodeIgniter.php(221): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /var/www/html/cct/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2018-11-23 04:27:32 --> Undefined variable: _SESSION
#0 /var/www/html/cct/public/custom.php(45): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/var/www/html/c...', 45, Array)
#1 /var/www/html/cct/application/Controllers/Home.php(19): poop(Object(App\Models\CardModel))
#2 /var/www/html/cct/system/CodeIgniter.php(810): App\Controllers\Home->test()
#3 /var/www/html/cct/system/CodeIgniter.php(307): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /var/www/html/cct/system/CodeIgniter.php(221): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /var/www/html/cct/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2018-11-23 04:27:33 --> Undefined variable: _SESSION
#0 /var/www/html/cct/public/custom.php(45): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/var/www/html/c...', 45, Array)
#1 /var/www/html/cct/application/Controllers/Home.php(19): poop(Object(App\Models\CardModel))
#2 /var/www/html/cct/system/CodeIgniter.php(810): App\Controllers\Home->test()
#3 /var/www/html/cct/system/CodeIgniter.php(307): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#4 /var/www/html/cct/system/CodeIgniter.php(221): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /var/www/html/cct/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2018-11-23 04:32:03 --> Access denied for user ''@'localhost' (using password: NO)
#0 /var/www/html/cct/system/Database/MySQLi/Connection.php(177): mysqli->real_connect('localhost', '', '', '', 3306, '', 0)
#1 /var/www/html/cct/system/Database/BaseConnection.php(369): CodeIgniter\Database\MySQLi\Connection->connect(false)
#2 /var/www/html/cct/system/Database/BaseConnection.php(602): CodeIgniter\Database\BaseConnection->initialize()
#3 /var/www/html/cct/system/Database/BaseBuilder.php(1400): CodeIgniter\Database\BaseConnection->query('SELECT *\nFROM `...', Array)
#4 /var/www/html/cct/system/Model.php(363): CodeIgniter\Database\BaseBuilder->get()
#5 /var/www/html/cct/application/Controllers/Home.php(17): CodeIgniter\Model->findAll()
#6 /var/www/html/cct/system/CodeIgniter.php(810): App\Controllers\Home->test()
#7 /var/www/html/cct/system/CodeIgniter.php(307): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Home))
#8 /var/www/html/cct/system/CodeIgniter.php(221): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 /var/www/html/cct/public/index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
