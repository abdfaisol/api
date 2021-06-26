<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class chat extends Model
{
    use HasFactory;
    public function data(){
        return DB::table('user');
    }
    public function msg(){
        return DB::table('msg');
    }
    // public function allData(){
    //     return DB::table('cobatabel')->get();
    // }
    // public function addData($data){
    //     DB::table('cobatabel')->insertGetId($data);
    // }
}
