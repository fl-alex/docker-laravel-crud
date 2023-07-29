<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function make_backup(){
        exec('docker exec lv-app-mysql-1 mysqldump --opt --user=sail --password=password --host=mysql --no-tablespaces lv-app > storage/buckup_`date +\"%Y.%m.%d_%H-%M-%S\"`.sql >> mylog.txt');

        return view("backup");
    }
}
