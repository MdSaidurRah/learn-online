<?php 
 
  
 namespace App\Http\Controllers\Quiz; 
 
 use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Crypt; 
 use App\LibraryFunctions\accesslogger;
 use App\LibraryFunctions\crudlib;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Redirect;
 use Illuminate\Support\Facades\Session;
 
 
 class QuestionController extends Controller 
{
 public $accessLogger;
 public $crudObject;
 

                    public function __construct()
{
 $this->accessLogger=new accesslogger();
 $this->crudObject=new crudlib();
 $this->middleware('checkPermission');
}
 

                    public function index()
{
 return view('Question.question-all');
}
 

                    public function create()
{
 return view('Question.question-add');
}
 

                    public function store(Request $request)
{
 $userId=Session::get('userId');
 $request->request->add(['createdBy'=>$userId]);
 $inputFormData=$request->except('_token');
 $question=$this->crudObject->create(new Question(),$inputFormData);
 if($question)
{
 $this->accessLogger->logEntry($userId,'News submit.','News content','','');
 flash()->addSuccess('Add operation has been successful.');
 return Redirect::back();
}else 
{
 flash()->addError('Sorry, Add operation has been failed.');
 return Redirect::back();
}
}

                    public function show($id)
{
 $keyId = Crypt::decryptString($id); 
 $question=DB::table('question')->select('*')->where('id',$keyId)->get();
 return view('Question.question-show')
->with('question',$question);
}
 

                    public function edit($id)
{
 $keyId = Crypt::decryptString($id); 
 $question=DB::table('question')->select('*')->where('id',$keyId)->get();
 return view('Question.question-edit')
->with('question',$question);
}
 

                    public function update(Request $request)
{
 $userId=Session::get('userId');
 $request->request->add(['updatedBy'=>$userId]);
 $inputFormData=$request->except('_token','id','submit');
 $question=$this->crudObject->update(new Question(),$inputFormData,'id',$request->id);
 if($question)
{
 $this->accessLogger->logEntry($userId,'News Update.','News content','','');
 flash()->addSuccess('Update operation has been successful.');
 return Redirect::back();
}else 
{
 flash()->addError('Sorry, Update operation has been failed .');
 return Redirect::back();
}
}
 

                    public function delete($id)
{
 $question=DB::table('question')->select('*')->where('id',$id)->get();
 return view('Question.view-news')
->with('question',$question);
}
 

                    public function getAllItems(Request $request)
 {
 $question=DB::table('question')->select(['*'])->orderBy('id','DESC')->get();
 return datatables()->of($question)
 ->addIndexColumn()
 ->addColumn('action',function($question)
 {
 $btn1='<a href="'.'/question/show/'. Crypt::encryptString($question->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show</a> ';
 $btn2='<a href="'.'/question/edit/'. Crypt::encryptString($question->id).'" class="edit btn btn-warning btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Edit</a> ';
 $btn3='<a href="'.'/question/delete/'. Crypt::encryptString($question->id).'" class="edit btn btn-danger btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Delete</a> ';
 return $btn1.$btn2.$btn3;
})
 ->rawColumns(['action'])
 ->make(true);
}
 
 } 
