<?php

namespace App\Http\Controllers;

use Validator;
use App\personalinfo;
use App\relationalinfo;
use App\emergencyinfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class memberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(request $request){
        if($this->uservalidation($request->all())){
           return response()->json(['error'=> $this->uservalidation(request()->all()),'status'=>'error']);
        }
        
        $personalsql = personalinfo::create([
            'title' => $request->title, 
            'name' => $request->name,
            'email' => $request->email,   
            'phone' => $request->phone,
            'dob' =>  $request->dob,
            'address' => $request->address,
            'hometown' => $request->hometown,
            'age' => $request->age,
            'status' => $request->status,
            'employmentstat' => $request->employmentstat,
            'occupation' => $request->occupation,
            'profession' => $request->profession,
        ]); 
            
                
                $relationalsql = relationalinfo::create([
                    'member_id' => $personalsql->id,
                    'period_of_stay' => $request->period_of_stay,
                    'berean_center' => $request->berean_center,
                    'tithe' => $request->tithe,
                    'welfare' => $request->welfare,
                    'ministry' => $request->ministry,
                    'department' => $request->department,
                ]); 
        
                $emergencysql = emergencyinfo::create([
                    'member_id' => $personalsql->id,
                    'emergency_name' => $request->emergency_name,
                    'emergency_phone' => $request->emergency_phone,
                    'emergency_relation' => $request->emergency_relation,
                ]); 

                $imagesql = $this->storeImg($request, $personalsql->id);

                return response()->json([$personalsql, $relationalsql, $emergencysql, $imagesql]);     
    }

    public function update(request $request){
        if($this->uservalidation($request->all())){
            return response()->json(['error'=> $this->uservalidation(request()->all()),'status'=>'error']);
        }
        $update_flavour = $request->flavour;

        switch ($update_flavour) {
            case "personal":
                $updatesql = personalinfo::where('id', $request->member_id)->update(array_filter($request->except(['flavour', 'member_id'.'profile_path','image'])));
                
                if($request->has('image')){
                    $img_delete = Storage::disk('public')->delete($request->profile_path);
                    if($img_delete){
                        $this->storeImg($request, $request->member_id);
                    }
                }

                return response()->json(['status'=>'success', 'message'=> 'update successful']);

                break;

            case "relational":
                $updatesql = relationalinfo::where('member_id', $request->member_id)->update(array_filter($request->except(['flavour', 'member_id'])));
                return response()->json(['status'=>'success', 'message'=> 'update successful']);
                break;
            case "emergency":
                $updatesql = emergencyinfo::where('member_id', $request->member_id)->update(array_filter($request->except(['flavour', 'member_id'])));
                return response()->json(['status'=>'success', 'message'=> 'update successful']);

                break;
          }
    }
    public function delete(request $request){
        personalinfo::where('id', $request->member_id)->delete();
        return response()->json(['status'=>'success', 'message'=> 'delete successful']);
       } 

    public function uservalidation($data){
        $validator = Validator::make(array_filter($data), [
            'title' => ['string'], 
            'name' => [ 'string', 'max:25'],
            'email' =>[ 'email:rfc','max:30'],   
            'phone' =>[ 'string', 'max:15'],
            'dob' =>[ 'date'],
            'address' => [ 'string'],
            'hometown' => [ 'string'],
            'age' => [ 'string', 'max:3'],
            'status' => [ 'string', 'max:10'],
            'employmentstat' => [ 'string'],
            'occupation' => [ 'string'],
            'profession' => [ 'string'],
            'period_of_stay' => [ 'string'],
            'berean_center' => [ 'string'],
            'tithe' => [ 'string'],
            'welfare' => [ 'string', 'max:3'],
            'ministry' => [ 'string'],
            'department' => [ 'string'],
            'emergency_name' => [ 'string'],
            'emergency_phone' => [ 'string',  'max:15'],
            'emergency_relation' => [ 'string'],
            'image' => [ 'file', 'image', 'max:5000']
        ]);

        if ($validator->fails())
        {
            return $validator->errors()->all();
        }

    }   

    protected function storeImg($data, $member_id){
        if($data->has('image')){
            $profileImg = $data->image->store('uploads', 'public');
            return $sql = personalinfo::where('id', $member_id)->update(['profileImg' => $profileImg]);
        }
    }
    
   
    public function guard()
    {
        return Auth::guard('api');
    }
}
