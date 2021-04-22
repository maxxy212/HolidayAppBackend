<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\User;
use App\Models\Department;
use App\Models\Role;

class HolidayController extends Controller
{
    public function getAllHolidays() {
        $holidays = Holiday::get()->toJson(JSON_PRETTY_PRINT);
        return response($holidays, 200);
      }
      public function deleteHoliday ($id) {
        if(Holiday::where('id', $id)->exists()) {
          $holiday = Holiday::find($id);
          $holiday->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Holiday not found"
          ], 404);
        }
      }
      public function getHolidayById($id) {
        if (Holiday::where('id', $id)->exists()) {
          $holiday = Holiday::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($holiday, 200);
        } else {
          return response()->json([
            "message" => "Holiday does not exist"
          ], 404);
        }
      }

      public function getHolidayByDate($start_date,$end_date) {
        if (Holiday::whereBetween('start_date', [$start_date,$end_date])->whereBetween('end_date', [$start_date,$end_date])->exists()) {
          $holiday = Holiday::whereBetween('start_date', [$start_date,$end_date])->whereBetween('end_date', [$start_date,$end_date])->get()->toJson(JSON_PRETTY_PRINT);
          return response($holiday, 200);
        } else {
          return response()->json([
            "message" => "Holiday does not exist"
          ], 404);
        }
      }

      public function createHoliday(Request $request) {
        $holiday = new Holiday;
        $holiday->start_date = $request->start_date;
        $holiday->end_date = $request->end_date;
        //check if user has any leave days left
      if  ($this->checkLeaveDays()){
        //check if less than 50% of dept is on leave 
      if  ($this->checkLeavePopulation($request->start_date,$request->end_date)){
        //check if leave is available based on role
       if ($this->checkRoleAvailability($request->start_date,$request->end_date)){
         $holiday->status= true;
         $holiday->save();
         return response()->json([
          "message" => "Leave application succesful"
        ], 201);
       }
       else{
        return response()->json([
          "message" => "You are not qualified for a leave right now, your partner is on leave"
        ], 304);
      }
      }
      else{
        return response()->json([
          "message" => "You are not qualified for a leave right now, most of your colleagues are on leave"
        ], 304);
      }
    }
    else{
      return response()->json([
        "message" => "You are not qualified for a leave right now, you have no leave days left"
      ], 304);
    }
        
  
       
      }

      private function checkLeaveDays(){
       return Auth::user()->remaining_leaves > 0 ? true:false;
      }
      private function checkLeavePopulation($start_date,$end_date){
        $all_dept=User::where('department_id',Auth::user()->department_id)->lists('id')->toArray();
        $leave_count= Holiday::whereIn('user_id',$all_dept)->whereBetween('start_date', [$start_date,$end_date])->whereBetween('end_date', [$start_date,$end_date])->count();
        return $leave_count>($all_dept/2)?false:true;
      }


      private function checkRoleAvailability($start_date,$end_date){
       return Auth::user()->role()->name=='Junior Member' ? true: $this->checkDepartmentRoleAvailability($start_date,$end_date);
      }


      private function checkDepartmentRoleAvailability($start_date,$end_date){
         if(Str::contains(Auth::user()->role()->name, 'Head')){
           $role=Role::where('name', 'LIKE', '%'.'Head'.'%')->lists('id')->toArray();
          $depts_users=User::where('dept_id',Auth::user()->dept_id)->whereIn('role_id',$role)->lists('id')->toArray();
         $users_on_leave= Holiday::whereBetween('start_date', [$start_date,$end_date])->whereBetween('end_date', [$start_date,$end_date])->whereIn('user_id',$depts_users)->count();
       return  $users_on_leave>0?false:true;
        }
        else{
          $role=Role::where('name', 'Manager')->orWhere('name', 'Senior Member')->lists('id')->toArray();
          $depts_users=User::where('dept_id',Auth::user()->dept_id)->whereIn('role_id',$role)->lists('id')->toArray();
         $users_on_leave= Holiday::whereBetween('start_date', [$start_date,$end_date])->whereBetween('end_date', [$start_date,$end_date])->whereIn('user_id',$depts_users)->count();
        return $users_on_leave>0?false:true;
        }
      }
}
