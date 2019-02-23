<?php

namespace App\Http\Controllers;
use  App\User;
use App\Profile;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\User as UserResource;
class ProfileController extends Controller
{
public  $successStatus=200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {

//        $user=new User();
//
//        $user->name=$request->input('name');
//        $user->email=$request->input('email');
//        $user->password=$request->input('password');
//        //$user->token=shal(time());
//        $user->save();
//        echo "data insertion sucessful";
       // //return response()->json($user);
    //***************
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['name']=$input['name'];
        $input['email']=$input['email'];
        $input['password'] = bcrypt($input['password']);
        $input['email_verified_at']=User::UNVERIFIED_USER;
        $input['remember_token']=User::getverificationtoken();
        $user = User::create($input);
        $success['message'] = "user registered,first verify ur acoount to login";
        return response()->json(['success'=>$success], $this->successStatus);
    }



    public function login(Request $request)
    {

        $email=$request->input('email');
        $password=$request->input('password');
        $data=DB::select('select id,token from user where email=? and password=?',[$email,$password]);
        if(count($data))
        {
            echo"sucessful";
        }
        else
        {
            echo"not sucessful";
        }
    }
    public function addMore(Request $request)
    {
        $profile=new Profile;
        $profile->name=$request->input('name');
        $profile->address=$request->input('address');
        $profile->phone=$request->input('phone');
        $profile->slug=$request->input('slug');
        $profile->save();
        return response()->json($profile);
        //
//        $demodata=[
//            'id'=>'1',
//            'name'=>'shirt',
//            'mobile'=>'7823679363757',
//            'email'=>'funda@email.com'
//
//        ];
//        return response()->json($demodata);

    }
public function datadisplayapi()
{
    $data=Profile::all();
    return response()->json($data);
}

    public function datadisplayapiVid($id)
    {
        $data=Profile::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function showUser()
    {
        $user=User::all();
        return UserResource::collection($user);
    }
//    public function showProductById()
//    {
//        $user=User::all();
//        return UserResource::collection($user);
//    }
    public function showUserById($id)
    {
        $user=User::find($id);
        if($user)
        {
            return new UserResource($user);
        }
          else
          {
              return response()->json(['Error'=>'There is no data available on this id: '.$id.''],404);
          }
    }

    public function block(Profile $profile)
    {
        //
    }
    public function delete($id)
    {
        $user=User::find($id);
        if($user)
        {
            $user->delete();
            return new UserResource($user);
        }
        else
        {
            return response()->json(['Error'=>'There is no data available on delete id: '.$id.''],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Profile $profile,$id,Request $request)
    {
        $user=User::find($id);
        if($user)
        {
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=$request->input('password');

            $user->save();

            return new UserResource($user);
        }
        else
        {
            return response()->json(['Error'=>'There is no data available on this id: '.$id.''],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
