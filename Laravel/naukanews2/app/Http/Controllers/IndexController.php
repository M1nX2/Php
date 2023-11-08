<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nauka;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegRequest;
use App\Http\Requests\DataRequest;
use App\Http\Requests\ChangeNaukaRequest;
class IndexController extends Controller
{
    public function Index(){
        //session(['role'=>'admin']);
        //dd(session('role'));
    if(session('role'))
    {
    $content=Nauka::select()->get();
    //dd($content->count());
    return view('index',['content'=>$content]);
    }
    else return redirect()->route('formlogin');
    }

    public function LoginShow(){
        return view('login');
    }

    public function Login(UserRequest $request){
       // dd('a');
       $request->validated();
        $data=$request->all();
        $res=User::where('login','=',$data['login'])->where('password','=',md5($data['password']))->get();
        //dd($res);
        if($res->count()>0){
            session(['role'=>$res[0]->role]);
            session(['login'=>$res[0]->login]);
            //dd( $_SESSION['role']);
            return redirect()->route('index');
        }
        else
        {
            return view('login',['err'=>'Такого пользователя не существует']);
        }
    }

    public function Refresh(){
        session(['role'=>null]);
        session(['login'=>null]);
        return redirect()->route('formlogin');
    }

    public function RegShow(){
        return view('reg');
    }

    public function Reg(RegRequest $request){
        //dd('a');
        $request->validated();
        $data=$request->all();
        $rew=new User;
        $data['password']=md5($data['password']);
        $rew->fill($data);
        //dd($rew->login);
        $rew->save();
        return redirect()->route('formlogin');
    }
    public function Rubric($name){
        if(session('role'))
        {
        $content=Nauka::where('rubric','=',$name)->get();
        return view('rubrika',['content'=>$content,'title'=>$name]); 
        }
        else return redirect()->route('formlogin');
        
    }
    public function Statya($id)
    {
        //dd('a');
        if(session('role'))
        {
        $content=Nauka::where('id','=',$id)->get();
        return view('statya',['content'=>$content[0]]);
        }
        else return redirect()->route('formlogin');
    }
    public function DeleteStat($id,$rname)
    {
        //dd(';');
        
        Nauka::where('id','=',$id)->delete();
        if(isset($rname))return redirect()->route('rubric',['name'=>$rname]);
        else redirect()->route('index');
    }
    public function AddShow($name)
    {
        if(session('role'))
        {
        return view('add',['name'=>$name]);
        }
        else return redirect()->route('formlogin');
    }
    public function Add(DataRequest $request,$name)
    {
        $request->validated();
        $data=$request->all();
        $d=new Nauka;
        $d->fill($data);
        $d->save();
        return redirect()->route('rubric',['name'=>$d->rubric]);
    }
    public function ChangeShow($name,$id)
    {
        if(session('role'))
        {     
            $rubs=[    
            'Искусственный интеллект',
            'Искусственная нейронная сеть',           
            'Распознавание образов',           
            'Робототехника',           
            'Информационное общество',
            'Автоматическая обработка текста'
            ];
        return view('change',['name'=>$name,'stat'=> Nauka::find($id),'rubs'=>$rubs]);
        }
        else return redirect()->route('formlogin');
    }
    public function Change(ChangeNaukaRequest $request, $name, $id)
{
    //dd($request);
    $request->validated();

    $d = Nauka::where('id', $id)->update([
        'title' => $request->input('title'),
        'lid' => $request->input('lid'),
        'content' => $request->input('content'),
        'rubric' => $request->input('rubric'),
        'image' => $request->input('image')
    ]);

    return redirect()->route('rubric', ['name' => $request->input('rubric')]);
}

}
