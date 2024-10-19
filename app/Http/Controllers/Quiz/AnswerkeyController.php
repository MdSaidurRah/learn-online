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
 use App\Models\Answerkey;
 class AnswerkeyController extends Controller 
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
 return view('Answerkey.answerkey-all');
}
 

                    public function create()
{
 return view('Answerkey.answerkey-add');
}
 

                    public function store(Request $request)
{
 $userId=Session::get('userId');
 $request->request->add(['createdBy'=>$userId]);
 $inputFormData=$request->except('_token');
 $answerkey=$this->crudObject->create(new Answerkey(),$inputFormData);
 if($answerkey)
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
 $answerkey=DB::table('answerkey')->select('*')->where('id',$keyId)->get();
 return view('Answerkey.answerkey-show')
->with('answerkey',$answerkey);
}
 

                    public function edit($id)
{
 $keyId = Crypt::decryptString($id); 
 $answerkey=DB::table('answerkey')->select('*')->where('id',$keyId)->get();
 return view('Answerkey.answerkey-edit')
->with('answerkey',$answerkey);
}
 

                    public function update(Request $request)
{
 $userId=Session::get('userId');
 $request->request->add(['updatedBy'=>$userId]);
 $inputFormData=$request->except('_token','id','submit');
 $answerkey=$this->crudObject->update(new Answerkey(),$inputFormData,'id',$request->id);
 if($answerkey)
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
 $answerkey=DB::table('answerkey')->select('*')->where('id',$id)->get();
 return view('Answerkey.view-news')
->with('answerkey',$answerkey);
}
 

                    public function getAllItems(Request $request)
 {
 $answerkey=DB::table('answerkey')->select(['*'])->orderBy('id','DESC')->get();
 return datatables()->of($answerkey)
 ->addIndexColumn()
 ->addColumn('action',function($answerkey)
 {
 $btn1='<a href="'.'/answerkey/show/'. Crypt::encryptString($answerkey->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show</a> ';
 $btn2='<a href="'.'/answerkey/edit/'. Crypt::encryptString($answerkey->id).'" class="edit btn btn-warning btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Edit</a> ';
 $btn3='<a href="'.'/answerkey/delete/'. Crypt::encryptString($answerkey->id).'" class="edit btn btn-danger btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Delete</a> ';
 return $btn1.$btn2.$btn3;
})
 ->rawColumns(['action'])
 ->make(true);
}
 
 } 
