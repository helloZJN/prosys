<?php include_once('conn/Oracle_oci.class.php'); 
	$page=0;
	$page1=0;
	$page1=isset($_GET['page1'])?$_GET['page1']:1;
	$page=isset($_GET['page'])?$_GET['page']:1;
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
								$lines=0;
								$lilines=0;
								$stid=$dbe->select("select a1.* from (select teacher_info.*,rownum rn from teacher_info) a1 where rn between ".(($page-1)*$pagesize+1)." and ".$page*$pagesize);
								while($row=oci_fetch_array($stid)){
									//var_dump($row);
									echo '<tr><td>'.($lines+1).'</td>
									<td>'.$row['0'].'</td>
									<td>'.$row['1'].'</td>
									<td><button type="button" class="badge pull-right">修改</button></td>
									<td><button type="button" class="badge pull-right">删除</button></td></tr>';
									$lines=$lines+1;
									$lilines=$lilines+1;
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
								$lines=0;
								$lilines=0;
								$stid=$dbe->select("select a1.* from (select student.*,rownum rn from student) a1 where rn between ".(($page1-1)*$pagesize+1)." and ".$page1*$pagesize);
								while($row=oci_fetch_array($stid)){
									//var_dump($row);
									echo '<tr><td>'.($lines+1).'</td>
									<td>'.$row['0'].'</td>
									<td>'.$row['1'].'</td>
									<td><button type="button" class="badge pull-right">修改</button></td>
									<td><button type="button" class="badge pull-right">删除</button></td></tr>';
									$lines=$lines+1;
									$lilines=$lilines+1;
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