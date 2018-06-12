<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='admin'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
	$page=0;
	$page1=0;
	$page1=isset($_GET['page1'])?$_GET['page1']:1;
	$page=isset($_GET['page'])?$_GET['page']:1;
	$tealines=0;
	$tea_del_lines=50;
	$stulines=100;
	$stu_del_lines=150;
?>
<div class="widget-head am-cf">
	<div class="widget-title am-fl"><span style="font-size: 30px">用户管理</span></div>
</div>
<!-- 老师管理 -->
<div class="row">     
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">老师管理</h3>
			</div>
			<div class="col-md-8" style="left:15%;">
				<table class="am-table am-table-compact am-table-striped tpl-table-black " width="100%">
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
									echo '<tr class="gradeX>
										<td>'.($tealines+1).'</td>
										<td>'.$row['0'].'</td>
										<td>'.$row['1'].'</td>
										<td>
											
											<div class="tpl-table-black-operation">
											<a href="javascript:;" onclick="updateuser(this)" id="'.$tealines.'">
												<i class="am-icon-pencil"></i> 修改
											</a>
											</div>
										</td>
										<td>
										<button type="button" class="badge pull-right" id="'.$tea_del_lines.'" onclick="deluser(this)">删除</button>
										</td>
									</tr>
									<a id="teaid'.$tealines.'" style="display:none">'.$row['0'].'</a>
									<a id="teaname'.$tealines.'" style="display:none">'.$row['1'].'</a>
									<a id="teapwd'.$tealines.'" style="display:none">'.$row['3'].'</a>';
									$tealines=$tealines+1;
									$tea_del_lines=$tea_del_lines+1;
								}
								$dbe->close();
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
									<td><button type="button" class="badge pull-right" onclick="updateuser(this)" id="'.$stulines.'">修改</button></td>
									<td><button type="button" class="badge pull-right" onclick="deluser(this)" id="'.$stu_del_lines.'">删除</button></td></tr>
									<a id="stuid'.$stulines.'" style="display:none">'.$row['0'].'</a>
									<a id="stuname'.$stulines.'" style="display:none">'.$row['1'].'</a>
									<a id="stupwd'.$stulines.'" style="display:none">'.$row['3'].'</a>';
									$stulines=$stulines+1;
									$stu_del_lines=$stu_del_lines+1;
								}
								$dbe->close();
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
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top: 50px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">信息修改</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="usertype" class="col-sm-2 control-label">用户类型</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="usertype" placeholder="用户类型" disabled="true">
		    </div>
		  </div>
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
		      <input type="text" class="form-control" id="userpwd" placeholder="密码">
		    </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="submit_update()">修改</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function submit_update(){
		if($("#usertype").val()=='老师'){
			var user_table="teacher_info";
		}else {
			var user_table="student";
		}
		$.ajax({
				type: "POST",
				url: "updateuser.php",
				data: {userid:$("#userid").val(),
					username:$("#username").val(),
					userpwd:$("#userpwd").val(),
					table:user_table},
				success: function(res) {
					if(res=="yes"){
						alert("修改成功!");
						window.location.href="main.php?content=user_manager";
					}else {
						alert("修改失败！");
					}

				}
				});
	}
	function deluser(e){
		if(confirm("确认删除此用户？")==true){
			if(e.id<149){
				var user_id='#teaid'+(e.id-50);
				user_id=$(user_id).text();
				var user_table="teacher_info";
			}else {
				var user_id='#stuid'+(e.id-50);
				user_id=$(user_id).text();
				var user_table="student";
			}
			$.ajax({
					type: "POST",
					url: "deluser.php",
					data: {userid:user_id,
						table:user_table},
					success: function(res) {
						if(res=="yes"){
							window.location.href="http://127.0.0.1/prosys/main.php?content=user_manager";
						}else {
							alert("删除失败！");
						}

					}
					});
		}

	}
	function updateuser(e){
		var index=e.id;
		if(e.id<99){
			var userid='#teaid'+e.id;
			userid=$(userid).text();
			var username='#teaname'+e.id;
			username=$(username).text();
			var userpwd='#teapwd'+e.id;
			userpwd=$(userpwd).text();
			$("#usertype").val("老师");
		}else {
			var userid='#stuid'+e.id;
			userid=$(userid).text();
			var username='#stuname'+e.id;
			username=$(username).text();
			var userpwd='#stupwd'+e.id;
			userpwd=$(userpwd).text();
			$("#usertype").val("学生");
		}	
		$("#userid").val(userid);
		$("#username").val(username);
		$("#userpwd").val(userpwd);
		$('#updateModal').modal({
            keyboard: true
        });
	}

</script>