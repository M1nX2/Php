<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \DateTime;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($mes=null)
    {       
        //dd($mes);
        return view('index',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'courses'=>Course::all(),'mes'=>$mes]);
    }

    public function rubric($rubric_name)
    {
        return view('rubric',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'courses'=>Course::where('rubric','=',$rubric_name)->get(),'rubric_name'=>$rubric_name]);
    }
    public function rubricadmin($rubric_name)
    {
        if(Auth::user()->role=='admin')
        {
        return view('rubricadmin',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'courses'=>Course::where('rubric','=',$rubric_name)->get(),'rubric_name'=>$rubric_name]);
        }
        else return view('rubric',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'courses'=>Course::where('rubric','=',$rubric_name)->get(),'rubric_name'=>$rubric_name]);
    }
    public function statya($id)
    {
        $d=true;
        $data=Course::find($id);
        $user=Auth::user()->id;
        $begin=new DateTime($data->begin);
        $now = new DateTime();
        $now->modify('+5 hours');
        $dif=$begin->diff($now);
        if($dif->invert==0)$d=false;
        $r=Record::where('user_id','=',Auth::user()->id)->where('course_id','=',$id)->get();
        
        //dd(count($r));
        if(count($r)>0)$d=false;
        if($data->number<=0)$d=false;
        return view('statya',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'course'=>Course::find($id),'d'=>$d]);
    }

    public function coursereg($id)
    {
        $data=Course::find($id);
        $user=Auth::user()->id;
        $begin=new DateTime($data->begin);
        $now = new DateTime();
        $now->modify('+5 hours');
        $dif=$begin->diff($now);
        //dd($dif);
        //dd();
        if($dif->invert==0)
        {
            return view('statya',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'course'=>Course::find($id),'errs'=>'Мероприятие уже прошло']);
        }
        else if(record::where('user_id','=',$user)->where('course_id','=',$id)->get()->count()>0)
        {
            return view('statya',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'course'=>Course::find($id),'errs'=>'Вы уже записаны']);
        }
        else if(Course::find($id)->number<=0)
        {
            return view('statya',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'course'=>Course::find($id),'errs'=>'Мест нет']);
        }
        else
        {
            
            $r=new record();
            $r->user_id=$user;
            $r->course_id=$id;
            $r->save();
            Course::find($id)->decrement('number',1);
            return(redirect()->route('index',['mes'=>'Успешно записано']));
        }
    }
    public function prof($mes=null)
    {
        $t=Course::join('records','courses.id','=','records.course_id')->join('users','users.id','=','records.user_id')->where('users.id','=',Auth::user()->id)->get();
        
        //dd($dif->d+$dif->m);
        //dd($t);
        //dd(Auth::user());
        return view('profile',['user'=>Auth::user(),'records'=>$t,'name'=>Auth::user()->name,'mes'=>$mes]);
    }
    public function adminprof($mes=null)
    {
        $t=Course::join('records','courses.id','=','records.course_id')->join('users','users.id','=','records.user_id')->where('users.id','=',Auth::user()->id)->get();
        //dd($t);
        //dd(Auth::user());
        return view('profileadmin',['user'=>Auth::user(),'records'=>$t,'name'=>Auth::user()->name,'mes'=>$mes]);
    }
    public function coursecancel($id,$user_id)
    {
        //доделать
        //dd($id." ".$user_id);
        $begin=new DateTime(Course::find($id)->begin);
        $now = new DateTime();
        $now->modify('+5 hours');
        $dif=$begin->diff($now);
        //dd($dif->d+$dif->m);
        if($dif->invert!=0&&$dif->d+$dif->m+$dif->y>>1)
        {
        $t=record::where('user_id','=',$user_id)->where('course_id','=',$id)->first();
        $t->delete();
        $c=Course::where('id','=',$id)->get()->first();
        $c->number=$c->number+1;
        $c->save();
        return redirect()->route('prof',['mes'=>'Запись отменена']);
        }
        else
        {
            return redirect()->route('prof',['mes'=>'Невозможно отписаться']);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function indexadmin($mes=null)
    {       
        if(Auth::user()->role=='admin')
        {
        //dd($mes);
        return view('indexadmin',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'courses'=>Course::all(),'mes'=>$mes]);
        }
        else return view('index',['name'=>Auth::user()->name,'role'=>Auth::user()->role,'courses'=>Course::all(),'mes'=>$mes]);
    }
    public function AddShow()
    {
        if(Auth::user()->role=='admin')
        {
            $rubs=[    
                'Английский',
                'Французский',           
                'Немецкий',           
                'Китайский',           
                ];
        return view('add',['rubs'=>$rubs]);
        }
        else return redirect()->route('index');
    }
    public function Add(Request $request)
    {
        $this->validate($request,[ 'course' => 'required|unique:courses',
        'description' => 'required',
        'number' => 'required|integer|min:0','image' => 'required',
        'begin' => 'required','rubric'=> 'required']);
        $data=$request->all();
        $d=new Course;
        $d->fill($data);
        $d->save();
        return redirect()->route('indexadmin');
    }
    public function ChangeShow($id)
    {
        if(Auth::user()->role=='admin')
        {     
            $rubs=[    
                'Английский',
                'Французский',           
                'Немецкий',           
                'Китайский',           
                ];
        return view('change',['course'=> Course::find($id),'rubs'=>$rubs]);
        }
        else return redirect()->route('index');
    }
    public function Change(Request $request, $id)
    {
    //dd($request);
    $this->validate($request,[ 'course' => 'required|unique:courses,course,'. $id,
    'description' => 'required',
    'number' => 'required|integer|min:0','image' => 'required',
    'begin' => 'required']);

    $d = Course::where('id', $id)->update([
        'course' => $request->input('course'),
        'description' => $request->input('description'),
        'number' => $request->input('number'),
        'begin'=> $request->input('begin'),
        'rubric' => $request->input('rubric'),
        'image' => $request->input('image')
    ]);

    return redirect()->route('indexadmin');
    }
public function formdelete($id)
    {
        //dd(';');
        if(record::where('course_id','=',$id)->get()->count()==0){
        Course::where('id','=',$id)->delete();
        return redirect()->route('indexadmin',['mes'=>'Запись удалена']);
        }
        else 
        return redirect()->route('indexadmin',['mes'=>'Запись нельзя удалить']);
        
    }
    public function RecordShow($id)
    {
        if(Auth::user()->role=='admin')
        {           
        //dd(record::where('course_id','=',$id)->join('courses','courses.id','=','records.course_id')->join('users','users.id','=','records.user_id')->get()[0]->name);
        return view('records',['records'=> record::where('course_id','=',$id)->join('courses','courses.id','=','records.course_id')->join('users','users.id','=','records.user_id')->get()]);
        }
        else return redirect()->route('index');
    }
    public function recordelete($id,$user_id)
    {
        $t=record::where('user_id','=',$user_id)->where('course_id','=',$id)->first();
        $t->delete();
        $c=Course::where('id','=',$id)->get()->first();
        $c->number=$c->number+1;
        $c->save();
        return redirect()->route('indexadmin',['mes'=>'Запись отменена']);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
