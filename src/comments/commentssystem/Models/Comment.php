<?php


namespace comments\commentssystem\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Helpers\UrisHelper;
use App\Models\User;

use blog\blogsystem\Models\Post;
use blog\blogsystem\Helpers\BlogSystemHelper;

class Comment extends Model
{

    protected $fillable = [
        'name',
        'user_id',
        'commentstable_id',
        'commentstable_type',
        'email',
        'comment',
        'approved',
        'parent_id',
        'rating'
    ];
    protected $casts = [
        'parent_id' => 'integer',
    ];


	public static function item($comment){
		if($comment['commentstable_type'] =='App\Models\Product'){
			$item = Product::find($comment['commentstable_id'] );
			$item['arraylink']= UrisHelper::geturiproductarrayparameters($comment['commentstable_type'] ,$comment['commentstable_id']);
			$item['link'] = route('shop.category', $item['arraylink'] );

 			return array('link'=>$item['link'], 'name'=> $item['name']);

		}elseif($comment['commentstable_type'] =='blog\blogsystem\Models\Post'){
			$item = Post::find($comment['commentstable_id'] );
				$item['arraylink']= BlogSystemHelper::geturipostarrayparameters($comment['commentstable_type'] ,$comment['commentstable_id']);

				$item['link'] = route('blog.blogcategory', $item['arraylink'] );

			   return array('link'=>$item['link'], 'name'=> $item['name']);
		}
	}

    public function childs($id){
        return Comment::where('parent_id','=', $id )->get();
    }
    
    public static function isAdmin($user_id){
    	$user =User::find($user_id);

    	if($user['type'] == 'admin'){

    		return true;
    	}else{
    		return false;
    	}

    }  
}    