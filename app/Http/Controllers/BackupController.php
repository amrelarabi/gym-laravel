<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup(){
        Spatie\DbDumper\Databases\MySql::create()
        ->setDbName($databaseName)
        ->setUserName($userName)
        ->setPassword($password)
        ->dumpToFile('dump.sql');
    
        return redirect()->route('dashboard.index')->with('success', 'تم اخذ نسخة احتياطة من قاعدة البيانات بنجاح');
    }

}
