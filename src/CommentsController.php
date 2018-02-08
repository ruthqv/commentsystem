<?php

namespace comments\commentssystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use comments\commentssystem\Models\Comment;
use App\Models\User;
class CommentsController extends Controller
{

    public function index()
    {
        $comments = Comment::paginate(10);

        return view('comments::admin.index', compact('comments'));
    }

    public function approve($commentid)
    {
                
        $comment= Comment::find($commentid)->update(['approved' => 1]);
        return redirect()->back()->with('alert-success', 'The comment was approved');
     }

    public function add(Request $request)
    {
        $data = $request->all();
        // print_r($data);
        $this->validate($request, [
            'name'    => 'required|min:2|max:100',
            'email'   => 'required',
            'comment' => 'required|min:2',
            'commentstable_id'   => 'required',
            'commentstable_type' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',        
        ]);
        
        if(!empty($data['user_id']) ){
           $user = User::find($data['user_id']);
           if($user['type'] == 'admin' ){
                $data['approved'] = 1;
                $comment = Comment::create($data);
                return redirect()->back()->with('alert-success', 'Admin has repply');
           }
        }else{
            $comment = Comment::create($data);
            return redirect()->back()->with('alert-success', 'Thankyou for your comment!We review and soon it will be published');
        }    

    }
    public function adminadd(Request $request)
    {
        $data = $request->all();
        // print_r($data);
        $this->validate($request, [
            'user_id' => 'required',
            'name'    => 'required|min:2|max:100',
            'email'   => 'required',
            'comment' => 'required|min:2',
            'commentstable_id'   => 'required',
            'commentstable_type' => 'required',
        ]);
        

        $data['approved'] = 1;
        $comment = Comment::create($data);
        return redirect()->back()->with('alert-success', 'The repply has been added to the comments'); 

    }
    public function destroy($commentid)
    {
        $comment= Comment::find($commentid);
        $delete = $comment->delete();
        
        if($delete){
        return redirect()->back()->with('alert-success', 'The comment was deleted');
        }else{
         return redirect()->back()->with('alert-danger', 'There was a problem. Try again');

        }    


    }

    public function repply($comment)
    {
        //
    }

}
