<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classModel extends Model
{
    use HasFactory;

    protected $table ="course_code";

    protected $fillable = ['name', 'status', 'created_by'];

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = classModel::select('course_code.*','users.name as created_by_name','users.last_name as created_by_last_name')
                    ->join('users','users.id','course_code.created_by')
                    ->where('course_code.is_delete', '=', 0)
                    ->orderBy('course_code.id','desc')
                    ->paginate(5);

        return $return;
    }

    static public function getTotalRecordFaculty()
    {
        $return = classModel::select('course_code.*','users.name as created_by_name','users.last_name as created_by_last_name')
                    ->join('users','users.id','course_code.created_by')
                    ->where('course_code.is_delete', '=', 0)
                    ->orderBy('course_code.id','desc')
                    ->count();

        return $return;
    }

    static public function  getClass()
    {
        $return = classModel::select('course_code.*')
        ->join('users','users.id','course_code.created_by')
        ->where('course_code.is_delete', '=', 0)
        ->where('course_code.status', '=', 0)
        ->orderBy('course_code.name','asc')
        ->get();

return $return;
    }

    static public function  getTotalClass()
    {
        $return = classModel::select('course_code.id')
         ->join('users','users.id','course_code.created_by')
        ->where('course_code.is_delete', '=', 0)
        ->where('course_code.status', '=', 0)
        ->count();

return $return;
    }

    static public function facultygetRecord()
    {
        // Get the currently authenticated user
        $currentUser = auth()->user();
    
        // Check if a user is logged in
        if ($currentUser) {
            $return = classModel::select('course_code.*', 'users.name as created_by_name')
                ->join('users', 'users.id', 'course_code.created_by')
                ->where('course_code.is_delete', '=', 0)
                ->where('course_code.created_by', '=', $currentUser->id) // Only show records created by the current user
                ->orderBy('course_code.id', 'desc')
                ->paginate(5);
    
            return $return;
        } else {
            // Handle the case where no user is logged in
            return [];
        }
    }
    
}
