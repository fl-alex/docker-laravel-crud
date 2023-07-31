<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\DbDumper\DbDumper;

class ServiceController extends Controller
{
    public function make_backup(DbDumper $dbDumper){
    //    exec('docker exec lv-app-mysql-1 mysqldump --opt --user=sail --password=password --host=mysql --no-tablespaces lv-app > storage/buckup_`date +\"%Y.%m.%d_%H-%M-%S\"`.sql >> mylog.txt');
       $dbDumper::create()
            ->setDbName("lv-app")
            ->setUserName("sail")
            ->setPassword("password")
            ->dumpToFile('storage/dump.sql');

        return view("backup");
    }
}
