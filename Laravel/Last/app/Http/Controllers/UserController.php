<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterClass;
use App\Models\Category;
use App\Models\Users;
use App\Models\Leader;
use App\Models\User_MC;
use App\Http\Requests\CreateMasterclassRequest;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function enter() 
    {
        return view('enter',['err'=>'','access'=>'']);
    }

    public function exit() {
        request()->session()->forget('id_user');
        request()->session()->forget('admin_status');
        return view('enter',['err'=>'','access'=>'']);

    }

    //вход
    public function login(Request $request)
    {
        $this->validate($request,['login'=>'required', 'password' => 'required',]);
        $data=$request->all();
        $countuser=count(Users::select('Users.email_user')
        ->where('Users.email_user','=', $data['login'])->get());

        $countlead=count(Leader::select('Leader.login_leader')
        ->where('Leader.login_leader','=', $data['login'])->get());
        if ($countlead!=0) 
        {
            $countlp=count(Leader::select('Leader.login_leader')
            ->where('Leader.login_leader','=', $data['login'])
            ->where('Leader.password_leader','=', md5($data['password']))->get());

            if ($countlp!=0) 
            {    
                $admin=1;
                request()->session()->put('admin_status', $admin);
                $id_user=Leader::select('Leader.id_leader')
                ->where('Leader.login_leader','=', $data['login'])->first();

                $id_user=$id_user->id_leader;
                request()->session()->put('id_user', $id_user);

                $leader=Leader::select('Leader.id_leader', 'id_leader',	'first_name_leader','second_name_leader','patronymic_leader','foto_leader')
                ->where('Leader.login_leader','=', $data['login'])->first();

                $masterclass=MasterClass::select('id_MC','name_MC','description_MC','date_MC', 'count_people_MC','cost_MC','id_category','id_leader')
                ->where('id_leader','=',$id_user)->get();

                $zapis=User_MC::select('Users.id_user','FIO_user','email_user','telephone_user','id_MC')->join('Users','Users.id_user','=','User_MC.id_user')
                ->get();

                $categories=Category::select('id_category','name_category')->get();

                return view('cabinet',compact('masterclass','leader','categories','admin','id_user','zapis'));
            }
            else return view('enter', ['err'=>'Вы ввели неверный пароль','access'=>'']);
        }
        elseif ($countuser!=0) 
        {
            $countlp=count(Users::select('Users.email_user')->where('Users.email_user','=', $data['login'])
            ->where('Users.password_user','=', md5($data['password']))->get());
            if ($countlp!=0)
             {    
                $admin=0;
                request()->session()->put('admin_status', $admin);
                $id_user=Users::select('Users.id_user')->where('Users.email_user','=', $data['login'])->first();
                $id_user=$id_user->id_user;
                request()->session()->put('id_user', $id_user);
                $categories=Category::select('id_category','name_category')->get();

                return view('category',compact('categories','admin','id_user'));
            }
            else return view('enter', ['err'=>'Вы ввели неверный пароль','access'=>'']);
        }
        else return view('enter', ['err'=>'Вы ввели неверный логин','access'=>'']);
    }
    
   //авторизация
    public function reg()
    {
        return view('form__reg',['err'=>'','access'=>'']);
    }

    public function regi(Request $request)
    {
        $data=$request->all();
        $user=new Users;
        $userl=count(Users::select('Users.email_user')
        ->where('Users.email_user','=', $data['email_user'])->get());

        $userph=count(Users::select('Users.telephone_user')
        ->where('Users.telephone_user','=', $data['telephone_user'])->get());

		$rules=
		[
			'FIO' => 'required|regex:/[^А-я]/u|max:60',
			'email_user' => 'required|unique:users|email', 
			'telephone_user' => 'required|unique:users|regex:/^\+?\d{1,3}\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{2}[\s.-]?\d{2}$/',
			'password_user' => 'required|regex:/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/',
		];

		$messages=
		[
			'required' => 'Данное поле является обязательным',
			'regex'=>'Введите данные в нужном формате',
			'login.unique'=>'Пользователь с таким логином уже существует',

		];
		$this->validate($request, $rules,$messages);		     
        	$data=$request->all();
           	 	$user->FIO_user=$data['FIO'];
				$user->email_user=$data['email_user'];
				$user->telephone_user=$data['telephone_user'];
           		$user->password_user=md5($data['password_user']);
            	$user->save();

        return view('enter',['err'=>'','access'=>'Регистрация прошла успешно'] );
    }
}
