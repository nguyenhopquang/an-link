Liên kết cần rút gọn
<div class="input-group form-group">
	<span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
	<span id="group_auto_dl" class="input-group-addon" style="border-right:0;display:none">
	<input checked="" id="auto_dl" type="checkbox"> <i class="fa fa-facebook" aria-hidden="true"></i>
	</span>
	<input class="form-control" style="height:38px;z-index:0" id="link" placeholder="Liên kết" type="url" required>
</div>
<button type="button" class="btn btn-success" onclick="Puaru_Active()" >Tạo liên kết</button> <a href="logout"><button type="button" class="btn btn-danger">Đăng xuất</button></a>
<p>
<li id="get-link" class="list-group-item"></li>
<!-- Token Reply -->
<script>
function Puaru_Active() {
var http = new XMLHttpRequest();
var link = document.getElementById("link").value;
var url = "data/url.php";
var params = "url="+link;
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("get-link").innerHTML = http.responseText;        
    }
}
http.send(params);
}
</script>