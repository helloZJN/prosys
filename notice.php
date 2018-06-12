<?php include_once('conn/Oracle_oci.class.php'); ?>
<div class="widget-head am-cf">
	<div class="widget-title am-fl"><span style="font-size: 30px">公告</span></div>
</div>
<div style="padding-top: 25px"></div>
<div class="row" >     
	<div class="col-md-8" style="left:15%;">
		<table class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r" width="100%">
			<thead>
				<tr>
					<th width="50%">文章标题</th>
					<th width="20%">作者</th>
					<th>时间</th>
					<th>操作</th>
				</tr>
			</thead>
		
			<tbody>
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
						$stid=$dbe->select("select a1.* from (select info.*,rownum rn from info order by info.infotime desc) a1 where rn between ".(($page-1)*$pagesize+1)." and ".$page*$pagesize);
						while($row=oci_fetch_row($stid)){
							//var_dump($row);
							echo '
							<tr class="gradeX">
								<td>'.$row['3'].'</td>
								<td>'.$row['1'].'</td>
								<td>20'.$row['5'].'日</td>
								<td>
									<div class="tpl-table-black-operation">
										<a href="javascript:;" onclick="getmodal(this)" id="'.$lines.'">
											<i class="am-icon-pencil"></i> 阅读
										</a>
									</div>
								</td>
							</tr>


							
							<span id="infoid'.$lines.'" style="display:none">'.$row['0'].'</span>
							<span id="teaname'.$lines.'" style="display:none">'.$row['1'].'</span>
							<span id="teaid'.$lines.'" style="display:none">'.$row['2'].'</span>
							<span id="title'.$lines.'" style="display:none">'.$row['3'].'</span>
							<span id="content'.$lines.'" style="display:none">'.$row['4'].'</span>
							<span id="infotime'.$lines.'" style="display:none">'.$row['5'].'</span>
							';
							$lines=$lines+1;
							$lilines=$lilines+1;
						}
					}
				?>
			</tbody>
		</table>
		<div class="am-u-lg-12 am-cf">
		<?php 
			echo "<div>共".$totalnum."条公告&nbsp&nbsp第".$page."页/共".$pagecount."页</div>";
			echo '<div class="am-u-lg-12 am-cf">
					<div class="am-fr">
						<ul class="am-pagination tpl-pagination">';
				echo '<li><a href="main.php?content=notice&page=1">首页</a></li>';
				echo $page!=1?'<li><a href="main.php?content=notice&page='.($page-1).'">上一页</a></li>':
					'<li class="am-disabled"><a href="main.php?content=notice&page='.($page-1).'">上一页</a></li>';
				echo $page!=$pagecount?'<li><a href="main.php?content=notice&page='.($page+1).'">下一页</a></li>':
					'<li class="am-disabled"><a href="main.php?content=notice&page='.($page+1).'">下一页</a></li>';
				echo '<li><a href="main.php?content=notice&page='.$pagecount.'">末页</a></li>';
			echo '		</ul>
					</div>
				</div>
			';
		?>
		</div>
    </div>	
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 50px">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#000000;font-size: 30px;" align="center">公告</h4>
      </div>
      <div class="modal-body">
      	<div align="center" id="notice-user-date" style="color:#000000">作者</div>
      	<div style="padding-top: 15px"></div>
      	<div id="notice-content" style="font-size: 25px;color:#000000" >这是我发布的公告</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
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
		$("#notice-user-date").html("作者:"+teaname+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日期:20"+infotime+"日");
		$("#notice-content").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+content);

		$('#myModal').modal({
            keyboard: true
        });
	}
	

</script>
<!-- // $.ajax({
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
	// }); -->