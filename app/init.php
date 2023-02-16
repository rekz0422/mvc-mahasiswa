<?php

/* 
    fungsi file ini : 
    1. memanggil file yang ada di folder core
    2. fungsi folder core : mengatur lalu lintas utama pada web
    3. wajib manggil semua utama di folder config & core
*/

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'core/Flash_msg.php';

require_once 'config/Config.php';
