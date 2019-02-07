<?php

namespace App\Http\Controllers;
use  App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {
        $user=new User();

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');

        $user->save();
        echo "data insertion sucessful";
        //return response()->json($user);
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
    public function show(Profile $profile)
    {
        //
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
    public function update(Request $request, Profile $profile)
    {
        //
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
