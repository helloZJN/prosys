<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='teacher_info'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>
<h1 class="page-header" id="pageheader">文件夹<button class="pull-right btn btn-info" onclick="get_dir(this)">创建文件夹</button><button class="pull-right btn btn-info" onclick="del_dir(this)">删除文件夹</button></h1>

<div class="row">     
	<div class="col-md-12">
		<!--—panel面板，里面放置一些控件，下同---->
		<div class="panel panel-primary">
			<!--—panel面板的标题，下同---->
			<div class="">
				<div> <select class="form-control col-md-4" onchange="selectOnchang(this)">
			            <?php 
			            	$dbe=new Oracle_oci();
							$dbe->conn();
							if($dbe->conn){
								$stid=$dbe->select("select * from folder where teaid='".$_SESSION['userid']."'");
								while($row=oci_fetch_array($stid)){
									//var_dump($row);
									echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
								}
								$dbe->close();
							}

			             ?>
			        </select>
			    </div>
			       
			</div>
		</div>
		<div class="col-md-12" id="stu_work">

		</div>

	</div>
</div>
<div class="modal fade" id="makedir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">创建文件夹</h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal">
		  <div class="form-group">
		    <label for="usertype" class="col-sm-2 control-label">名称</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="foldername" placeholder="文件夹名称">
		    </div>
		  </div>
		</form>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="make_dir(this)">创建</button>
      </div>
    </div>
  </div>
</div>
<?php echo "<a style='display:none' id='mkdir_id'>".$_SESSION['userid']."</a>"; ?>
<script type="text/javascript">
	function selectOnchang(obj){
		var value = obj.options[obj.selectedIndex].text;
		$("stu_work").html('');
		$.ajax({
				type: "POST",    
				url: "getstuwork.php",    
				data: {
					foldid:$("#foldername").val(),
					teaid:$("#mkdir_id").text(),
					},
				success: function(data){ 	
					alert(data); 
					if(data=="创建成功"){
						window.location="main.php?content=tea_dir";
					}else if(data=="文件夹已存在") {
						
					}else{
						
					}
				}
			}); 
	}
	function get_dir(e){
		$('#makedir').modal({
            keyboard: true
        });
	}
	function make_dir(e){
		var myDate = new Date();
		$.ajax({
				type: "POST",    
				url: "teadir.php",    
				data: {foldid:myDate.getTime(), 
					foldname:$("#foldername").val(),
					teaid:$("#mkdir_id").text(),
					},
				success: function(data){ 	
					alert(data); 
					if(data=="创建成功"){
						window.location="main.php?content=tea_dir";
					}else if(data=="文件夹已存在") {
						
					}else{
						
					}
				}
			}); 

	}
</script>