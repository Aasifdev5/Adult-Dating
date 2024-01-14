<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public static function getProductFullname($id) 
    { 
        $userinfo=Course::find($id);

        if($userinfo)
        {
            return $userinfo->course_name;
        }
        else
        {
            return  '';
        }
        
    }
}
