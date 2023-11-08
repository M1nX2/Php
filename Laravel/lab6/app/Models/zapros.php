<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zapros extends Model
{
    public function zapros1($request){
        
        //dump($request->all());// что пришло в запросе
        $data=$request->all();
        $resume=new Person;
        $resume->fill($data);
        //dump($resume); // чем заполнен текущий экземпляр класса
        $resume->save();
        return$resume;
    } 
    public function zapros2($request,$id){
        
        //dump($request->all());// что пришло в запросе
        $data=$request->all();
        //$resume=Person::select('FIO','phone','stage','staff','image')->where('id','=',$id)->get();
        $resume=Person::where('id','=',$id);
        //dump($resume); // чем заполнен текущий экземпляр класса
        $resume->update([
            'FIO'=>$data['FIO'],
            'phone'=>$data['Phone'],
            'stage'=>$data['Stage'],
            'staff'=>$data['Staff'],
            'image'=>$data['Image']
        ]);
    }
    public function getpeople()
    {
        $str=Person::select('people.id','FIO','stage','phone','image','staff.id as sid','staff.staff as staffname')->join('staff', 'staff.id', '=', 'people.Staff')->get();
        return $str;
    }
    public function getstaff()
    {
        return Staff::select('id','staff')->get();
    }
    public function getpeoplewhere($id)
    {
        $str=Person::select('people.id','FIO','stage','phone','image','staff.id as sid','staff.staff as staffname')->where('people.id','=',$id)->join('staff', 'staff.id', '=', 'people.Staff')->get();
        return $str;
    }
    use HasFactory;
}
