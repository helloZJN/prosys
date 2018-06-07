<?php include_once('conn/Oracle_oci.class.php'); ?>
<h1 class="page-header" id="pageheader">公告</h1>
<div class="row">     
	<div class="col-md-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">系统公告</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<?php  
						$page=isset($_GET['page'])?$_GET['page']:1;
						$dbe=new Oracle_oci();
						$dbe->conn();
						if($dbe->conn){

							$stid=$dbe->select("select count(*) from info");
							$pagesize=5;//每页显示条数
							$totalnum=oci_fetch_row($stid)['0'];//总条数
							$pagecount=ceil($totalnum/$pagesize);//总页数
							$lines=0;
							$lilines=0;
							$stid=$dbe->select("select a1.* from (select info.*,rownum rn from info) a1 where rn between ".(($page-1)*$pagesize+1)." and ".$page*$pagesize);
							while($row=oci_fetch_row($stid)){
								//var_dump($row);
								echo '<li role="presentation"><a href="#" class="alert alert-info"><button type="button" class="badge pull-right" onclick="getmodal(this)" id="'.$lines.'">阅读</button>
								'.$row['3'].'
								<a id="infoid'.$lines.'" style="display:none">'.$row['0'].'</a>
								<a id="teaname'.$lines.'" style="display:none">'.$row['1'].'</a>
								<a id="teaid'.$lines.'" style="display:none">'.$row['2'].'</a>
								<a id="title'.$lines.'" style="display:none">'.$row['3'].'</a>
								<a id="content'.$lines.'" style="display:none">'.$row['4'].'</a>
								<a id="infotime'.$lines.'" style="display:none">'.$row['5'].'</a>	</a>
								
								</li>';
								$lines=$lines+1;
								$lilines=$lilines+1;
							}
						}
						echo "共".$totalnum."条公告&nbsp&nbsp第".$page."页/共".$pagecount."页";
						echo '<div align="center">';
							echo $page!=1?'<a href="main.php?content=notice&page=1">首页</a>':'首页';
							echo $page!=1?'<a href="main.php?content=notice&page='.($page-1).'">上一页</a>':'上一页';
							echo $page!=$pagecount?'<a href="main.php?content=notice&page='.($page+1).'">下一页</a>':'下一页';
							echo $page!=$pagecount?'<a href="main.php?content=notice&page='.$pagecount.'">末页</a>':'末页';
						echo '</div>';
					?>					
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">公告</h4>
      </div>
      <div class="modal-body">
      	<div align="center" id="notice-user-date" style="color:#000000">作者</div>
      	<div id="notice-content" style="font-size: 25px">这是我发布的公告</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function getmodal(e){
		var index=e.id;
		var teaname='#teaname'+e.id;
		teaname=$(teaname).text();
		var title='#title'+e.id;
		title=$(title).text();
		var content='#content'+e.id;
		content=$(content).text();
		var infotime='#infotime'+e.id;
		infotime=$(infotime).text();

		$("#myModalLabel").text(title);
		$("#notice-user-date").html(teaname+"&nbsp;&nbsp;日期:"+infotime);
		$("#notice-content").html("&nbsp;&nbsp;&nbsp;&nbsp;"+content);

		$('#myModal').modal({
            keyboard: true
        });
	}
	

</script>
// $.ajax({
	// 	type: $("#login-form").attr("method"),
	// 	type: 'POST',
	// 	url: '../services/users/check-user.php',
	// 	data: "email="+email+"&password="+password,
	// 	success: function(html) {
	// 		if (html == "OK") {
	// 			if(callback){
	// 				window.location=callback;
	// 			}else{
	// 				window.location="../index.php";
	// 			}

	// 			$("#login-msg").css('visibility', 'hidden');
	// 		} else {
	// 			$("#login-msg").css('visibility', 'visible');
	// 			$("#login-msg").html(html);

	// 			setTimeout (function () {
	// 				$("#login-msg").css('visibility', 'hidden');
	// 			}, 10000);
	// 		}
	// 	}
	// });