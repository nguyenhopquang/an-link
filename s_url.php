<?php
/*
* Developed by Vy Nghĩa
*/
require_once 'login.php';
require_once 'data/config.php';
include 'data/header.php';

$short_hash = $_GET['s']; //GET short_hash data

//Select Datebase in condition hash_url = $short_hash
$hash_url = mysql_query("SELECT * FROM `gen_url` WHERE `hash_url` = '$short_hash'");

//Check accessToken exists
if($accessToken == null){
	echo '<center><a href = "'.$loginUrl.'"><button type="button" class="btn btn-danger" >Đăng nhập</button></a><br/>
	<p>Chỉ lấy quyền cơ bản (<strong>xem ID</strong>, <strong>tên</strong> và <strong>danh sách bạn bè</strong>) của bạn. Không đòi hỏi các quyền nhạy cảm như <strong>đăng bài</strong>, <strong>like</strong> và <strong>chia sẻ</strong>.</p></center>';
}

//After login => access_token
	while($sql = mysql_fetch_array($hash_url)){
	$hashtag = $sql['hashtag'];
	$post_id = $sql['post_id'];
	if(!empty($accessToken)){

	//Graph Api
	$me_api = 'https://graph.facebook.com/me?access_token='.$accessToken;
	$page_info = 'https://graph.facebook.com/'.$page_id.'?fields=name,id,username&access_token='.$accessToken;

	//JSON decode
	$page = json_decode(file_get_contents($page_info, true)); //page info
	$user = json_decode(file_get_contents($me_api, true)); //user info

	//Feed (timeline) data
	$feed_api = file_get_contents('https://graph.facebook.com/'.$page_id.'/feed?limit=100&access_token='.$accessToken);
	$feed_json = json_decode($feed_api, true);

	//Get Page info
	$page_username = $page->username;

	if($page_username == null){
		$page_username = $page_id;
	}
	
	//Get Facebook user_id
	$user_id = $user->id;
	
	//Check user_id => null -> exit = re-access_token
	if(!empty($user_id)){
	} else {
	echo '<center>Không thể định dạng Token! Vui lòng hãy thử cài đặt app lại hen!<br/>
	<a href = "'.$loginUrl.'"><button type="button" class="btn btn-danger" >Đăng nhập</button></a></center>';;
	include 'data/footer.php';
	exit;
	}

	//Search user reactions ID 
	$reactions_post = 'https://graph.facebook.com/v2.8/'.$page_id.'_'.$post_id.'/reactions?pretty=0&live_filter=no_filter&limit=2000&access_token='.$accessToken;
	$reactions_json = $reactions_post;
	$s_like = $user_id;

	header('Content-Type: text/html');

	$get_like_json = file_get_contents($reactions_json);
	$data_s_like = preg_quote($s_like, '/');
	$data_s_like = "/^.*$data_s_like.*\$/m";
	if(preg_match_all($data_s_like, $get_like_json, $found)){
		//Found ID reactions post
		$check_like = '<i class="fa fa-check" aria-hidden="true"></i> Đã xác nhận bạn đã like bài viết!';
		$liked = 'true';
	}
	else {
		//Not found ID reactions post
		$check_like = '<i class="fa fa-times" aria-hidden="true"></i> Bạn chưa like bài viết! Vui lòng truy cập liên kết trên rồi like hoặc thả cảm xúc và thử lại!';
		$post_embed_start = '<div class="fb-post" data-href="';
		$post_embed_end = '" data-width="500" data-show-text="true"></div>';
	}
    
	//Search user comments
    $cmt_post = 'https://graph.facebook.com/v2.10/'.$page_id.'_'.$post_id.'/comments?access_token='.$accessToken;
	$cmt_json = $cmt_post;
	$s_cmt = $user_id;

	header('Content-Type: text/html');

	$get_cmt_json = file_get_contents($cmt_json);
	$data_s_cmt = preg_quote($s_cmt, '/');
	$data_s_cmt = "/^.*$data_s_cmt.*\$/m";
	if(preg_match_all($data_s_cmt, $get_cmt_json, $found)){
		$check_cmt = '<i class="fa fa-check" aria-hidden="true"></i> Đã xác nhận bạn đã bình luận bài viết!';
        $commented = 'true';
	}
	else {
		$check_cmt = '<i class="fa fa-times" aria-hidden="true"></i> Bạn chưa bình luận bài viết! Truy cập liên kết trên để bình luận và thử lại.';
        $post_embed_start = '<div class="fb-post" data-href="';
    	$post_embed_end = '" data-width="500" data-show-text="true"></div>';
	}
    
	//Check condition
	if(!empty($liked&&$commented)){
		$url = $sql['url'];
		$real_url = '<i class="fa fa-angle-right" aria-hidden="true"></i> <a href="'.$url.'">'.$url.'</a> <i class="fa fa-angle-left" aria-hidden="true"></i>';
	}

	//Find post_id
	foreach($feed_json["data"] as $feed) {
    if(strpos($feed['message'], $hashtag) !== FALSE) {
		$post_id_found = str_replace($page_id.'_', '',$feed['id']);
		$url_post = 'https://www.facebook.com/'.$page_username.'/posts/'.$post_id_found;
		//Found ID post but not set data into mySQL
			if($post_id == null){
				//Search user reactions ID 
				$reactions_post = 'https://graph.facebook.com/v2.8/'.$page_id.'_'.$post_id_found.'/reactions?pretty=0&live_filter=no_filter&limit=2000&access_token='.$accessToken;
				$api_json = $reactions_post;
				$s = $user_id;

				header('Content-Type: text/html');

				$get_api = file_get_contents($api_json);
				$data_s = preg_quote($s, '/');
				$data_s = "/^.*$data_s.*\$/m";
				if(preg_match_all($data_s, $get_api, $found)){
				//null
				} else {
				//In if post id = null but hashtag exists in post
				$check_like = '<i class="fa fa-times" aria-hidden="true"></i> Bạn chưa like bài viết! Vui lòng truy cập liên kết trên rồi like hoặc nhấn like ở trên và tải lại trang!';
				$post_embed_start_n = '<div class="fb-post" data-href="';
				$post_embed_end_n = '" data-width="500" data-show-text="true"></div>';
				}
                
                //Search user comments
                $cmt_post = 'https://graph.facebook.com/v2.10/'.$page_id.'_'.$post_id_found.'/comments?access_token='.$accessToken;
	            $cmt_json = $cmt_post;
	            $s_cmt = $user_id;

            	header('Content-Type: text/html');

	            $get_cmt_json = file_get_contents($cmt_json);
            	$data_s_cmt = preg_quote($s_cmt, '/');
            	$data_s_cmt = "/^.*$data_s_cmt.*\$/m";
            	if(preg_match_all($data_s_cmt, $get_cmt_json, $found)){
            		$check_cmt = '<i class="fa fa-check" aria-hidden="true"></i> Đã xác nhận bạn đã bình luận bài viết!';
                    $commented = 'true';
            	}
            	else {
            		$check_cmt = '<i class="fa fa-times" aria-hidden="true"></i> Bạn chưa bình luận bài viết! Truy cập liên kết trên hoặc nhấn nút bình luận để bình luận và thử lại.';
            	}
			$found_id = mysql_query("UPDATE `".$dbname."`.`gen_url` SET `post_id` = '$post_id_found' WHERE `gen_url`.`hashtag` = '$hashtag'");
			if (mysql_query($found_id)){
			} else {
				null;
			}
			echo '<li id="get-link" class="list-group-item">
			<center><br/><br/><p style="font-size: 18"><a href="'.$url_post.'">'.$url_post.'</a><br/>';
			if(!empty($post_embed_start_n&&$post_embed_end_n)){
			echo $post_embed_start_n.$url_post.$post_embed_end_n; //if not like post => show
			}
			echo $real_url.'
			</p>
			<br/><br/>
			</center></li><br/>
			<i class="fa fa-check" aria-hidden="true"></i> Đã xác minh #hashtag trên Post ID '.$post_id_found.'
			<br/>'.$check_like.'<br/>'.$check_cmt; //Check like/comment or not like/comment
			include 'data/footer.php';
			exit;
			}		
		//Found post and have set into mySQL
		echo '<li id="get-link" class="list-group-item">
			<center><br/><br/><p style="font-size: 18"><a href="'.$url_post.'">'.$url_post.'</a><br/>';
			if(!empty($post_embed_start&&$post_embed_end)){
			echo $post_embed_start.$url_post.$post_embed_end; //if not like post => show
			}
			echo $real_url.'
			</p>
			<br/><br/>
			</center></li><br/>
			<i class="fa fa-check" aria-hidden="true"></i> Đã xác minh #hashtag trên Post ID '.$post_id_found.'
			<br/>'.$check_like.'<br/>'.$check_cmt; //Check like/comment or not like/comment
		}
	}
	if($post_id == null){
		echo '<li id="get-link" class="list-group-item"><center><br/><br/><p style="font-size: 18">Chưa có bài viết nào gắn #hashtag cho url này</p><br/><br/></center></li>
		<p><i class="fa fa-times" aria-hidden="true"></i> Không thể xác minh hashtag trên bài viết</p>';
	}
  }
}
mysql_close($con);
include 'data/footer.php';
?>