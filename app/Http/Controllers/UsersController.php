<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = ['admin', 'viewer','dataEntry'];
        $data=[
            'users'=>User::all(),
            'roles'=>$roles
        ];
        return view('system.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.users.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // do validation
        $request->validate([
            'f_name_ar'=>'required',
            'l_name_ar'=>'required',
            'f_name_en'=>'required',
            'l_name_en'=>'required',
            'job_title_ar'=>'required',
            'job_title_en'=>'required',
            'email'=>'required|email|unique:users',
        ],
            $messages = [
                'required' => 'حقل :attribute مطلوب.',
                'max' => 'حقل :attribute يجب أن لا يتجاوز 255 حرف.',
                // 'email.required' => 'Please Provide Department Email',
                'email.email' => 'البريد الإلكتروني غير صحيح',
            ],
            //create fields attribute
            $attributes=[
                'f_name_ar'=>'الاسم الاول باللغة العربية',
                'l_name_ar'=>'الاسم الرابع باللغة العربية',
                'f_name_en'=>'الاسم الاول باللغة الانجليزية',
                'l_name_en'=>'الاسم الرابع باللغة الانجليزية',
                'job_title_ar'=>'المسمى الوظيفي باللغة العربية',
                'job_title_en'=>'المسمى الوظيفي باللغة الانجليزية',
                'email'=>'البريد الإلكتروني',
            ]


        );
        //create new user
        $user=new User();
        $user->f_name_ar=$request->f_name_ar;
        $user->s_name_ar=$request->s_name_ar;
        $user->t_name_ar=$request->t_name_ar;
        $user->l_name_ar=$request->l_name_ar;
        $user->f_name_en=$request->f_name_en;
        $user->s_name_en=$request->s_name_en;
        $user->t_name_en=$request->t_name_en;
        $user->l_name_en=$request->l_name_en;
        $user->job_title_ar=$request->job_title_ar;
        $user->job_title_en=$request->job_title_en;
        $user->email=$request->email;
        $user->password=bcrypt('123456');
        $user->username=$request->email;
        $user->save();
        //rediretc to index
        return redirect()->route('users.index')->with('success','تم إضافة المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changeRole($id)
    {
        $userRoles=User::find($id)->roles;
        $roles =  array();
        foreach ($userRoles as $item) {
           array_push($roles, $item['name']);
        }
        Log::alert($roles);
        $data=[
            'id'=>$id,
            'roles'=>$roles
        ];
        return view('system.users.roles')->with($data);
    }
    function SaveRole(Request $request,$id)
    {
        $user=User::find($id)->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success','تم تعديل صلاحيات المستخدم بنجاح');
    }
}
