<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\personalinfo;
use App\emergencyinfo;
use App\Exports\userExport;
use App\relationalinfo;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class memberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(request $request){

        $validator = Validator::make($request->all(), [
            'title' => ['required','string'], 
            'name' => ['required','string', 'max:25'],
            'email' =>[ 'email:rfc','max:30'],   
            'phone' =>[ 'required','string', 'max:15'],
            'dob' =>[ 'date'],
            'address' => [ 'required','string'],
            'hometown' => [ 'required','string'],
            'age' => [ 'required','string', 'max:3'],
            'status' => [ 'required','string', 'max:10'],
            'employmentstat' => [ 'required','string'],
            'occupation' => [ 'required','string'],
            'profession' => [ 'required','string'],
            'period_of_stay' => [ 'required','string'],
            'berean_center' => [ 'required','string'],
            'tithe' => [ 'required','string'],
            'welfare' => [ 'required','string', 'max:3'],
            'ministry' => [ 'required','string'],
            'department' => [ 'required','string'],
            'emergency_name' => [ 'required','string'],
            'emergency_phone' => [ 'required','string',  'max:15'],
            'emergency_relation' => [ 'required','string'],
            'image' => [ 'file', 'image', 'max:5000']
        ]);

        if ($validator->fails())
        {
            return response()->json(['error'=> $validator->errors()->all(),'status'=>'error']);
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
        switch ($update_flavour){
            case "personalinfo":
                $updatesql = personalinfo::where('id', $request->update_id)->update(array_filter($request->except(['flavour', 'update_id', 'profile_path','image'])));
                
                if($request->has('image')){
                    $img_delete = Storage::disk('public')->delete($request->profile_path);
                    if($img_delete){
                        $this->storeImg($request, $request->update_id);
                    }
                }

                return response()->json(['status'=>'success', 'message'=> 'update successful']);

                break;

            case "relationalinfo":
                $updatesql = relationalinfo::where('member_id', $request->update_id)->update(array_filter($request->except(['flavour', 'update_id'])));
                return response()->json(['status'=>'success', 'message'=> 'update successful']);
                break;
            case "emergencyinfo":
                $updatesql = emergencyinfo::where('member_id', $request->update_id)->update(array_filter($request->except(['flavour', 'update_id'])));
                return response()->json(['status'=>'success', 'message'=> 'update successful']);

                break;
          }
    }
    public function delete(request $request){
        personalinfo::where('id', $request->member_id)->delete();
        return response()->json(['status'=>'success', 'message'=> 'delete successful']);
    }
    
    public function viewall(){
        
        $members = personalinfo::join('relationalinfos', 'personalinfos.id', '=', 'relationalinfos.member_id')
                            ->join('emergencyinfos', 'personalinfos.id', '=', 'emergencyinfos.member_id')
                            ->select('personalinfos.*', 'relationalinfos.*', 'emergencyinfos.*')
                            ->paginate(5);

        return response()->json($members);
    }

    public function viewone(request $request){
        $id =  $request->id;
        $members = personalinfo::join('relationalinfos', 'personalinfos.id', '=', 'relationalinfos.member_id')
                            ->join('emergencyinfos', 'personalinfos.id', '=', 'emergencyinfos.member_id')
                            ->select('personalinfos.*', 'relationalinfos.*', 'emergencyinfos.*')
                            ->where('personalinfos.id', $id)->get();
                            

        return response()->json($members);
    }

    public function search(request $request){
        $searchResults = (new Search())
                    ->registerModel(personalinfo::class, ['name', 'title'])
                    ->search($request->search);
        return response()->json($searchResults->paginate(5)); 
        
    }

    public function export(){
        return new userExport;
    }

    // *****************************
    // ***************************
    // ***********************
    // ********************
    // Dependent functions.........................................
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
