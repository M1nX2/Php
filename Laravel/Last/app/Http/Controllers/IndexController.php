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


class IndexController extends Controller
{  

    //мейн
    public function category() 
    {   
        $id_user=(request()->session()->get('id_user'));
        if (request()->session()->has('admin_status')) 
        {
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $categories=Category::select('id_category','name_category')->get();
            
            return view('category',compact('categories','id_user','admin'));
        }
        else 
        {   
            $categories=Category::select('id_category','name_category')->get();
            return view('category',compact('categories','id_user'));
        }
    }

    //вывод по категории
    public function show_category($id) 
    {
        $id_user=(request()->session()->get('id_user'));
        if (request()->session()->has('admin_status')) 
        {
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $masterclass=MasterClass::select('first_name_leader','second_name_leader','patronymic_leader','foto_leader',
            'id_MC','name_MC','description_MC','date_MC',  'count_people_MC','cost_MC','id_category','Leader.id_leader')
            ->join('Leader','MasterClass.id_leader','=','Leader.id_leader')
            ->where('id_category','=',$id)->get();
            $categories=Category::select('id_category','name_category')->get();
            $content=Category::select('id_category','name_category','description1','description2','description3','description4','foto_category')
            ->where('id_category','=',$id)->first();
            $records=USER_MC::where('User_MC.id_user','=',$id_user)->get();
            $zapis=USER_MC::join('users','users.id_user','=','user_mc.id_user')->get();
            return view('category',compact('masterclass','categories','content','admin','id_user','records','zapis'));
        }
        else 
        {   
            $masterclass=MasterClass::select('first_name_leader','second_name_leader','patronymic_leader','foto_leader','id_MC',
            'name_MC','description_MC','date_MC',  'count_people_MC','cost_MC','id_category','Leader.id_leader')
            ->join('Leader','MasterClass.id_leader','=','Leader.id_leader')->where('id_category','=',$id)->get();
            $categories=Category::select('id_category','name_category')->get();
            $content=Category::select('id_category','name_category','description1','description2','description3',
            'description4','foto_category')->where('id_category','=',$id)->first();
            return view('category',compact('masterclass','categories','content','id_user'));
        }
    }

    //добавить форма
    public function add() 
    {
        $id_user=(request()->session()->get('id_user'));
        if (request()->session()->get('admin_status')==1) 
        {
            $categories=Category::select('id_category','name_category')->get();
            return view('form__master-class',compact('categories','id_user'));
        }
        else 
        {   
            $categories=Category::select('id_category','name_category')->get();
            return view('category',compact('categories','id_user'));
        }
    }
    //добавить в  бд
    public function add_content(CreateMasterclassRequest $request)
    {       
        $admin=intval(request()->session()->get('admin_status'));
        $id_user=(request()->session()->get('id_user'));
        $data=$request->validated();
        $check=count(MasterClass::select('id_MC')
        ->where('date_MC','=',$data['date_MC'].'T'.$data['time_MC'])->get());
        //dd($check);
        $id_user=(request()->session()->get('id_user'));
        if ($check==0) {
        $MK=new MasterClass;
        $MK->id_category=$data['id_category'];
        $MK->name_MC=$data['name_MC'];
        $MK->description_MC=$data['description_MC'];
        $MK->count_people_MC=$data['count_people_MC'];
        $MK->date_MC=$data['date_MC'].'T'.$data['time_MC'];
        $MK->cost_MC=$data['cost_MC'];
        $MK->id_leader=$id_user;
        $MK->save();
        $zapis=User_MC::select('Users.id_user','FIO_user','email_user','telephone_user','id_MC')
        ->join('Users','Users.id_user','=','User_MC.id_user')->get();

        $leader=Leader::select('Leader.id_leader', 'id_leader',	'first_name_leader','second_name_leader','patronymic_leader','foto_leader')
        ->where('Leader.id_leader','=', $id_user)->first();

        $masterclass=MasterClass::select('id_MC','name_MC','description_MC','date_MC', 'count_people_MC','cost_MC','id_category','id_leader')
        ->where('id_leader','=',$id_user)->get();

        $categories=Category::select('id_category','name_category')->get();
        
        return view('cabinet',compact('masterclass','leader','categories','zapis','admin','id_user'));
        }
        else {
            $message='Данное время/дата заняты.';
            $categories=Category::select('id_category','name_category')->get();
            return view('form__master-class',compact('categories','message','id_user'));
        }
    }

    //личный кабинет
    public function cabinet() 
    {
        //dd(request()->session());
        if (request()->session()->get('id_user')) 
        {
        if (request()->session()->get('admin_status')==1) 
        {
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $leader=Leader::select('Leader.id_leader', 'id_leader',	'first_name_leader','second_name_leader','patronymic_leader','foto_leader')
            ->where('Leader.id_leader','=', $id_user)->first();
            $masterclass=MasterClass::select('id_MC','name_MC','description_MC','date_MC',  'count_people_MC','cost_MC','id_category','id_leader')
            ->where('id_leader','=',$id_user)->get();
            $zapis=User_MC::select('Users.id_user','FIO_user','email_user','telephone_user','id_MC')->join('Users','Users.id_user','=','User_MC.id_user')->get();
            $categories=Category::select('id_category','name_category')->get();
            return view('cabinet',compact('masterclass','leader','categories','admin','id_user','zapis'));
        }
        elseif (request()->session()->get('admin_status')==0) 
        {
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $user=Users::select('Users.id_user', 'FIO_user')->where('Users.id_user','=', $id_user)->first();
            $masterclass=MasterClass::select('MasterClass.id_MC','name_MC','description_MC','date_MC', 'count_people_MC','cost_MC','id_category','id_leader')->join('User_MC','User_MC.id_MC','=','MasterClass.id_MC')->where('id_user','=',$id_user)->get();
            $categories=Category::select('id_category','name_category')->get();
            return view('cabinet',compact('masterclass','user','categories','admin','id_user'));
        }
        }
        else
        {
            return redirect()->route('category');
        }
    }

    //изменить форма
    public function change($id)
    {
        if (request()->session()->get('admin_status')==1) 
        {
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $mc=MasterClass::select('id_MC','name_MC','description_MC','date_MC', 'count_people_MC','cost_MC','id_category','id_leader')
            ->where('id_MC','=',$id)->first();
            return view('change-form',compact('mc','admin','id_user'));
        }
        else
        {
            return redirect()->route('category');
        }
    }
    
    //изменить в бд
    public function change_content(Request $request){
        $this->validate($request,[
        'description_MC' => 'required', 'cost_MC' => 'required']);
        $data=$request->all();
        $admin=intval(request()->session()->get('admin_status'));
        $id_user=(request()->session()->get('id_user'));
            DB::table('MasterClass')
            ->where('id_MC', $data['id_MC'])
            ->update(['description_MC' => $data['description_MC'],
            'cost_MC' => $data['cost_MC']]);
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
                $leader=Leader::select('Leader.id_leader', 'id_leader',	'first_name_leader','second_name_leader','patronymic_leader','foto_leader')
                ->where('Leader.id_leader','=', $id_user)->first();

                $masterclass=MasterClass::select('id_MC','name_MC','description_MC','date_MC', 'count_people_MC','cost_MC','id_category','id_leader')
                ->where('id_leader','=',$id_user)->get();

                $categories=Category::select('id_category','name_category')->get();
                $zapis=User_MC::select('Users.id_user','FIO_user','email_user','telephone_user','id_MC')->join('Users','Users.id_user','=','User_MC.id_user')->get();

                return view('cabinet',compact('masterclass','leader','categories','admin','id_user','zapis'));
    }
    
    // подтверждение страница
    public function confirmation($id){
        if (request()->session()->get('admin_status')==0) 
        {
            $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $check=count(User_MC::select('id_user_mc')->where('id_user','=',$id_user)->where('id_MC','=',$id)->get());
            if ($check==0) 
            {
                $user=Users::select('FIO_user')->where('id_user','=',$id_user)->first();
                $mc=MasterClass::select('first_name_leader','second_name_leader','patronymic_leader','id_MC','name_MC','description_MC',
                'date_MC', 'count_people_MC','cost_MC','MasterClass.id_category','name_category','MasterClass.id_leader')
                ->join('Category','MasterClass.id_category','=','Category.id_category')
                ->join('Leader','MasterClass.id_leader','=','Leader.id_leader')
                ->where('id_MC','=',$id)->first();

                $kolvo=count(User_MC::select('id_user_mc')
                ->where('id_MC','=',$id)->get());

                $count_people=(MasterClass::select('count_people_MC')
                ->where('id_MC','=',$id)->first())->count_people_MC;
                if ($kolvo<$count_people)
                {
                    return view('confirmation',compact('mc','user','admin','id_user'));
                }
                else
                {
                    $message='Свободных мест на данный мастер-класс нет!';
                    $categories=Category::select('id_category','name_category')->get();
                    return view('category',compact('categories','id_user','admin','message'));
                }
            }
            else
            {
                $message='Вы уже записаны на данный мастер-класс!';
                $categories=Category::select('id_category','name_category')->get();
                return view('category',compact('categories','id_user','admin','message'));
            }
        }
    }
    public function unsubscribe($id)
    {
        $admin=intval(request()->session()->get('admin_status'));
        $id_user=(request()->session()->get('id_user'));
        $m=USER_MC::where('id_user','=',$id_user)->where('id_MC','=',$id)->delete();
        $categories=Category::select('id_category','name_category')->get();
        $message='Запись удалена!';
        //dd($m);
        return view('category',compact('categories','id_user','admin','message'));
    }
// подтверждение в бд
    public function confirmation_content(Request $request,$id){
        $admin=intval(request()->session()->get('admin_status'));
            $id_user=(request()->session()->get('id_user'));
            $check=count(User_MC::select('id_user_mc')->where('id_user','=',$id_user)->where('id_MC','=',$id)->get());
            if ($check==0)
        {
        $data=$request->all();
        $admin=intval(request()->session()->get('admin_status'));
        $id_user=(request()->session()->get('id_user'));
        $zapis=new User_MC;
        $zapis->id_MC=$data['id_MC'];
        $zapis->id_user=$id_user;
        $zapis->save();
        $message='Вы успешно записаны на мастер класс!';
        $categories=Category::select('id_category','name_category')->get();
        return view('category',compact('categories','id_user','admin','message'));
    }
    else 
        {
                $message='Вы уже записаны на данный мастер-класс!';
                $categories=Category::select('id_category','name_category')->get();
                return view('category',compact('categories','id_user','admin','message'));
            }
    }

// подтверждение отмена
    public function confirmation_cancel(Request $request){
        $data=$request->all();
        $admin=intval(request()->session()->get('admin_status'));
        $id_user=(request()->session()->get('id_user'));
        $categories=Category::select('id_category','name_category')->get();
        
        return view('category',compact('categories','id_user','admin'));
    }
    public function get_date($date) {
        // Получаем список доступных временных интервалов для выбранной даты
        $mc = MasterClass::whereRaw("DATE_FORMAT(date_MC, '%Y-%m-%d') = ?", [$date])->get();
        $times = ['9:00', '11:00', '13:00', '15:00'];
        //return $mc;      
        foreach ($mc as $item) {
            $time=date('g:i', strtotime($item->date_MC));
            //return($time);
            if (($key = array_search($time, $times)) !== false) {
                unset($times[$key]);
            }
        }
    
        // Возвращаем список временных интервалов в виде HTML-кода
        $html = '';
        foreach ($times as $time) {
            $html .= '<option value="' . $time . '">' . $time . '</option>';
        }
        if($html=='')$html='<option>Нет времени на выбранную дату</option>';
        return $html;
    }
}
