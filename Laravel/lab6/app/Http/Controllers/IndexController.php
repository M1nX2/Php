<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Staff;
use App\Models\Vacancy;
use App\Models\Firm;
use App\Models\zapros;
class IndexController extends Controller
{
    //
    public function Index(){
        return view ('page')->with(['title'=>'Главная','header'=>'Резюме и вакансии','persons'=>Person::select('id','FIO','stage','phone','staff')->get()]);
    }
    public function Show($id){
		$str=Person::select('FIO','stage','phone','image','staff.staff')->where('people.id','=',$id)->join('staff', 'staff.id', '=', 'people.Staff')->get();
        return view ('resume')
        ->with(['title'=>'Резюме','header'=>'Резюме','persons'=>$str]);
    }
    public function Query1()
	{
		$person=new Person();
		$query = $person->where('Stage', '>', 5)->where('Stage', '<', 15)->get();
		return view ('query',['data' => $query,'header'=>'Фамилии персон, имеющих стаж от 5 до 15 лет.','title'=>'Запрос 1']);
	}
	
		public function Query2()
	{
		$person=new Person();
        $query = $person->join('staff', 'staff.id', '=', 'people.Staff')
		->where('staff.Staff', '=', 'Программист')->get();
		return view ('query',['data' => $query,'header'=>'Фамилии и стаж людей с профессией Программист.','title'=>'Запрос 2']);
	}
	
		public function Query3()
	{
		$person=new Person();
		$query = $person->count();
		return view ('query',['data' => $query,'header'=>'Общее число резюме в базе.','title'=>'Запрос 3']);
	}
	
		public function Query4()
	{
		$person=new Person();
		$staff=new staff();
		$query = $staff
		->select('staff.staff')
		->join('people', 'people.Staff', '=', 'staff.id')
		->groupBy('staff.staff')
		->get();
		return view ('query',['data' => $query,'header'=>'Профессии, представители которых имеются в резюме.','title'=>'Запрос 4']);
	}
	public function delete_resume($id)
	{
		Person::find($id)->delete();
		return redirect('/resume');
	}
	public function add(){
		$z=new zapros;
		$str=$z->getpeople();
		$staff=$z->getstaff();
		return view('add-content',['header'=>'Добавить резюме','persons'=>$str,'staffs'=>$staff,'title'=>'Добавить']);
	}
	public function store(Request $request){
		$this->validate($request,['FIO' => 'required|max:255', 'Phone' =>
        'required', 'Stage' => 'required', 'Staff' => 'required',]);
        $r=new zapros;
		$resume=$r->zapros1($request);
		return redirect()->route('resumeShow', ['id' => $resume->id]);
		//редирект на детальную страницу созданной записи
	}
	public function changeShow($id){
		//dd($id);
		$r=new zapros;
		$str=$r->getpeoplewhere($id);
		//dd($str[0]->staffname);
		$staff=$r->getstaff();
		return view('changeresume',['header'=>'Изменить резюме','persons'=>$str,'staffs'=>$staff,'title'=>'Изменить']);
	}
	public function change(Request $request,$id){
		//dd($id);
		$this->validate($request,['FIO' => 'required|max:255', 'Phone' =>
        'required', 'Stage' => 'required', 'Staff' => 'required',]);
		$r=new zapros;
		$r->zapros2($request,$id);
		return redirect()->route('resumeShow', ['id' => $id]);
	}
		
}
