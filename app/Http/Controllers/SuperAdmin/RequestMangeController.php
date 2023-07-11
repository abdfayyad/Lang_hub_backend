<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\AcademyAdminstrator;
use App\Models\AcademyPending;
use App\Models\AcademyPhoto;
use App\Models\User;
use Illuminate\Http\Request;

class RequestMangeController extends Controller
{
    public function acceptAcademy(AcademyPending $academyPending){
        AcademyPhoto::where('academy_pending_id' , $academyPending->id)->delete();
        // return $academyPending;
        $academy = Academy::create([
            'name' => $academyPending->name ,
            'description' => $academyPending->description,
            'location' => $academyPending->location,
            'photo' => $academyPending->photo,
            'english' => $academyPending->english,
            'french'=>$academyPending->french,
            'spanish' => $academyPending->spanish,
            'germany' => $academyPending->germany ,
            'license_number' => $academyPending->license_number,
            'academy_adminstrator_id' => $academyPending->academy_adminstrator_id
        ]);
        
        AcademyPending::where('id' , $academyPending->id)->delete() ;
        return response()->json([
            'message' => 'academy added successfully',
            'status' => 200 ,
            'data' => $academy 
        ]);
    }
    public function RejectRequest(AcademyPending $academyPending){
        AcademyPhoto::where('academy_pending_id' , $academyPending->id)->delete();
        AcademyPending::where('id' , $academyPending->id)->delete() ;
    
        $admin = AcademyAdminstrator::where('id' , $academyPending->academy_adminstator_id)->first();
        return $admin ;
        User::where('id' , $admin->user_id)->delete();
        $admin->delete(); 
        return response()->json([
            'message'=> 'rejected successfully',
            'status' => 200 ,
        ]);
    }
}
