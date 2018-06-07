<?php include_once('conn/Oracle_oci.class.php'); 
	$page=0;
	$page1=0;
	$page1=isset($_GET['page1'])?$_GET['page1']:1;
	$page=isset($_GET['page'])?$_GET['page']:1;
	$tealines=0;
	$stulines=100;
?>
<h1 class="page-header" id="pageheader">用户管理</h1>
<!-- 老师管理 -->
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
        <h4 class="modal-title" id="exampleModalLabel">信息修改</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="userid" class="col-sm-2 control-label">学工号</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="userid" placeholder="请输入你的学工号" disabled="true">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="username" class="col-sm-2 control-label">姓名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" placeholder="请输入你的姓名">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="userpwd" class="col-sm-2 control-label">密码</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="userpwd" placeholder="密码">
		    </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">修改</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function updatetea(e){
		var index=e.id;
		var teaid='#teaid'+e.id;
		teaid=$(teaid).text();
		var teaname='#teaname'+e.id;
		teaname=$(teaname).text();
		var teapwd='#teapwd'+e.id;
		teapwd=$(teapwd).text();
		$("#userid").val(teaid);
		$("#username").val(teaname);
		$("#userpwd").val(teapwd);
		// 
		// $("#notice-user-date").html(teaname+"&nbsp;&nbsp;日期:"+infotime);
		// $("#notice-content").html("&nbsp;&nbsp;&nbsp;&nbsp;"+content);

		$('#updateModal').modal({
            keyboard: true
        });
	}
	function updatestu(e){
		var index=e.id-100;
		var stuid='#stuid'+e.id;
		stuid=$(stuid).text();
		var stuname='#stuname'+e.id;
		stuname=$(stuname).text();
		var stupwd='#stupwd'+e.id;
		stupwd=$(stupwd).text();
		$("#userid").val(stuid);
		$("#username").val(stuname);
		$("#userpwd").val(stupwd);

		// $("#myModalLabel").text(title);
		// $("#notice-user-date").html(teaname+"&nbsp;&nbsp;日期:"+infotime);
		// $("#notice-content").html("&nbsp;&nbsp;&nbsp;&nbsp;"+content);

		$('#updateModal').modal({
            keyboard: true
        });
	}
	

</script>