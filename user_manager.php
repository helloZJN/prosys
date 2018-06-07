<?php include_once('conn/Oracle_oci.class.php'); 
	$page=0;
	$page1=0;
	$page1=isset($_GET['page1'])?$_GET['page1']:1;
	$page=isset($_GET['page'])?$_GET['page']:1;
	$tealines=0;
	$stulines=100;
?>
<h1 class="page-header" id="pageheader">用户管理</h1>
<div class="row">     
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">老师管理</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>工号</th>
							<th>姓名</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php

							$dbe=new Oracle_oci();
							$dbe->conn();
							if($dbe->conn){

								$stid=$dbe->select("select count(*) from teacher_info");
								$pagesize=5;//每页显示条数
								$totalnum=oci_fetch_row($stid)['0'];//总条数
								$pagecount=ceil($totalnum/$pagesize);//总页数

								$stid=$dbe->select("select a1.* from (select teacher_info.*,rownum rn from teacher_info) a1 where rn between ".(($page-1)*$pagesize+1)." and ".$page*$pagesize);
								while($row=oci_fetch_array($stid)){
									//var_dump($row);
									echo '<tr><td>'.($tealines+1).'</td>
									<td>'.$row['0'].'</td>
									<td>'.$row['1'].'</td>
									<td><button type="button" class="badge pull-right" onclick="updatetea(this)" id="'.$tealines.'">修改</button></td>
									<td><button type="button" class="badge pull-right">删除</button></td></tr>
									<a id="teaid'.$tealines.'" style="display:none">'.$row['0'].'</a>
									<a id="teaname'.$tealines.'" style="display:none">'.$row['1'].'</a>
									<a id="teapwd'.$tealines.'" style="display:none">'.$row['3'].'</a>';
									$tealines=$tealines+1;
								}
							}
							echo "<tr><th colspan='5'>共".$totalnum."条信息&nbsp&nbsp第".$page."页/共".$pagecount."页</th></tr>";
							echo '<tr><th colspan="5"><div align="center">';
							echo $page!=1?'<a href="main.php?content=user_manager&page=1">首页</a>':'首页';
							echo $page!=1?'<a href="main.php?content=user_manager&page1='.$page1.'&page='.($page-1).'">上一页</a>':'上一页';
							echo $page!=$pagecount?'<a href="main.php?content=user_manager&page1='.$page1.'&page='.($page+1).'">下一页</a>':'下一页';
							echo $page!=$pagecount?'<a href="main.php?content=user_manager&page1='.$page1.'&page='.$pagecount.'">末页</a>':'末页';
							echo '</div></th></tr>';
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
<!-- 	学生管理 -->
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">学生管理</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>学号</th>
							<th>姓名</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							$dbe=new Oracle_oci();
							$dbe->conn();
							if($dbe->conn){

								$stid=$dbe->select("select count(*) from student");
								$pagesize=5;//每页显示条数
								$totalnum=oci_fetch_row($stid)['0'];//总条数
								$pagecount=ceil($totalnum/$pagesize);//总页数
								$stid=$dbe->select("select a1.* from (select student.*,rownum rn from student) a1 where rn between ".(($page1-1)*$pagesize+1)." and ".$page1*$pagesize);
								while($row=oci_fetch_array($stid)){
									//var_dump($row);
									echo '<tr><td>'.($stulines+1-100).'</td>
									<td>'.$row['0'].'</td>
									<td>'.$row['1'].'</td>
									<td><button type="button" class="badge pull-right" onclick="updatestu(this)" id="stu'.$stulines.'">修改</button></td>
									<td><button type="button" class="badge pull-right">删除</button></td></tr>
									<a id="stuid'.$stulines.'" style="display:none">'.$row['0'].'</a>
									<a id="stuname'.$stulines.'" style="display:none">'.$row['1'].'</a>
									<a id="stupwd'.$stulines.'" style="display:none">'.$row['3'].'</a>';
									$stulines=$stulines+1;
								}
							}
							echo "<tr><th colspan='5'>共".$totalnum."条信息&nbsp&nbsp第".$page1."页/共".$pagecount."页</th></tr>";
							echo '<tr><th colspan="5"><div align="center">';
							echo $page1!=1?'<a href="main.php?content=user_manager&page='.$page.'&page1=1">首页</a>':'首页';
							echo $page1!=1?'<a href="main.php?content=user_manager&page='.$page.'&page1='.($page1-1).'">上一页</a>':'上一页';
							echo $page1!=$pagecount?'<a href="main.php?content=user_manager&page='.$page.'&page1='.($page1+1).'">下一页</a>':'下一页';
							echo $page1!=$pagecount?'<a href="main.php?content=user_manager&page='.$page.'&page1='.$pagecount.'">末页</a>':'末页';
							echo '</div></th></tr>';
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- 模态框 -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function updatetea(e){
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
	function updatestu(e){
		var index=e.id-100;
		var teaname='#'+e.id;
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