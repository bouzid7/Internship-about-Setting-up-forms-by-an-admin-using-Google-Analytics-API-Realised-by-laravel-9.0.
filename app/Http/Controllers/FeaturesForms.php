<?php

namespace App\Http\Controllers;
use App\Models\response_list;
use App\Models\response;
use App\Models\form_list;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\map;

class FeaturesForms extends Controller
{
    //
    
    public function save_form(Request $req)
    {
    
        $loop = true;
        $code =$req->form_code;
        if(empty($req->form_code)){
            while($loop == true){
                $code=mt_rand(0,9999999);
                $chk=DB::table('form_lists')->where('form_code','=',$code)->count();
                if($chk <= 0)
                    break;
            }
        }
        
        $fname = $code.".html";
       // $content=file_put_contents($fname,$req->form_data);
        Storage::disk('local')->put($fname,$req->form_data);
        if(empty($req->form_code))
        {

             $list=new form_list();
             $list->form_code=$code;
             $list->title=$req->title;
             $list->description=$req->description;
             $list->fname=$fname;
             $save_form=$list->save();

             // insert in response_list
              
             $r_l=new response_list();
             $r_l->form_code=$code;
             $r_l->save();

        }
        
        else
        {
         $up=form_list::find($req->id);
         $up->title=$req->title;
         $up->description=$req->description;
         $save_form=$up->save();
         
        }
        
        if($save_form)
        {
            $resp['status'] = 'success';
        }
        else
        {
            $resp['status'] = 'failed'; 
        }

        return  $resp;
    }

    
    public function delete_form(Request $req)
    {
         $id=$req->id;
         $code=$req->form_code;
         $dele=form_list::find($id)->delete();
        if($dele<=0)
        {
            $resp['status'] = 'failed';
        }
        else
        {
    
           // unlink($code.'.html');
           Storage::disk('local')->delete($code.'.html');
             $resp['status'] = 'success';
        }
        return $resp;
    }

  
    public function save_response(Request $req)
    {
          
        $rl=new response_list();
        $rl->form_code=$req->form_code;
        $rl->userName=$req->userName;
        $rl->save();

        $row=response_list::where('form_code',$req->form_code)->first();
          $rlId= $row->id;
          $max=0;
          if($req->q)
          { 
            $size1=count($req->q);
            if(!empty($req->q[0]))
            {
                $NL=new response();
                $NL->rl_id=$rlId;
                $NL->meta_field=$max;
                $NL->meta_value=$req->q['0'];
                $NL->user_id=$req->user_id;
                $NL->save();
                $max++;
            }

           for($i=1;$i<$size1;$i++)
           {
               $NL=new response();
               if(empty($req->q[$i]))
               {
                  continue;
               }
               else
               {

                $NL->rl_id=$rlId;
                $NL->meta_field=$max;
                $NL->meta_value=$req->q[$i];
                $NL->user_id=$req->user_id;
                $NL->save();
                $max++;

               }

           }
        
         }
        
        if($req->C)
        {
              
              $NL=new response();
              $NL->rl_id=$rlId;
              $NL->meta_field=$max;
              $C=implode(",",$req->C);
              $NL->meta_value=$C;
              $NL->user_id=$req->user_id;
              $NL->save();
            $max++;
        }

        if($req->R)
        {
              $NL=new response();
              $NL->rl_id=$rlId;
              $NL->meta_field=$max;
              $R=implode(",",$req->R);
              $NL->meta_value=$R;
              $NL->user_id=$req->user_id;
              $NL->save();
              $max++;

        }
        
        if($req->typeUser=='admin')
        {
            return redirect("/admin")->with("message","form suceffuly submitted admin");
        }
    
        elseif($req->typeUser=='user')
        {
             return redirect("/user/accueil")->with("message","form suceffuly submitted");
        }
    
        
    }


    
    public function dataAdmin()
    {
        $data=form_list::all();
        return view('indexAdmin',compact('data'));
        
    }

    public function displayForm($form_code)
    {
          return view('form',compact('form_code'));
          
    }

    public function edit_form($id,$form_code)
    {
        $code=$form_code;
        return view('editForm',compact('id','code'));
    }
    


    public function push()
    {
    
         $data=form_list::where('afu','=','on')->get();
         $c=count($data);
         return view('pageUser',compact('data','c'));

    }






    public function change_AV(Request $req)
    {
            

         for($i=0;$i<count($req->afu);$i++)
    {
         if(!empty($req->afu[$i]))
       {
          if($req->afu[$i]=='off')
          {

             $av=form_list::find($req->afu[$i+1]);
             $av->afu="on";
             $av->save();

             return redirect('/admin')->with('message','Avaibility enregistred suceffuly!');
          }

        
           
        
          elseif($req->afu[$i]=='on')
          {
            
            $av1=form_list::where('afu','on')->where('id','!=',$req->afu[$i+1])->get();
            if($av1)
            {
             $countav1= count(form_list::where('afu','on')->where('id','!=',$req->afu[$i+1])->get());
             for($j=0;$j<=$countav1;$j++)
             {
              if(!empty($av1[$j]['id']))  
              {

              if(!empty(form_list::find($av1[$j]['id'])))
              {
              $v1=form_list::find($av1[$j]['id']);
              $v1->afu='off';
              $v1->save();
              }

              }
             }
            }

            return redirect('/admin')->with('message','Avaibility enregistred suceffuly!');

          }

          
        }
    }
    
         return redirect('/admin')->with('you are not changing the availability!');
        
    
    }


    public function viewresponse($form_code)
    {
    
     $re=response_list::where("form_code",$form_code)->orderBy('date_created', 'desc')->get();
     return view('viewResponseUsers',compact('re','form_code'));

    }

    public function viewresponseform($form_code,$id)
    {
     
     $data =response::where("rl_id",'=',$id)->get();
     return view("viewResponse",compact('data','form_code'));

     //return $data;
     
    }

























    public function test(Request $req)
    {

        return $req;
    
    }

}        

