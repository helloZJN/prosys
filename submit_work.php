<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='student'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>
<div class="widget-head am-cf">
	<div class="widget-title am-fl"><span style="font-size: 30px">提交作业</span></div>
</div>
<div class="row">     
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<form enctype="multipart/form-data">

			<div class="form-group" style="padding-top: 30px">
				<label for="selecttea">选择老师</label>
				<select name="selecttea" id="selecttea" class="form-control" onchange="selectteaOnchang(this)" required>
					<option value="" disabled selected></option>
					<?php 
						$dbe=new Oracle_oci();
						$dbe->conn();
						if($dbe->conn){
							$stid=$dbe->select("select * from teacher_info");
							while($row=oci_fetch_array($stid)){
								//var_dump($row);
								echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
							}
							$dbe->close();
						}
					 ?>
				</select>
			</div>
			<div class="form-group" id="foldselect">		
			</div>
			<div class="form-group">	
				<input type="file" name="txt_file" id="txt_file" />
			</div>	
			<button type="button" class="btn btn-primary" onclick="submit_work(this)">提交</button>
		</form>
	</div>
</div>
<?php echo '<span style="display:none" id="submituserid" >'.$_SESSION['userid'].'</span>'; ?>
<script type="text/javascript">
	function selectteaOnchang(obj){
		var value = obj.options[obj.selectedIndex].value;
		$.ajax({
				type: "POST",    
				url: "getfold.php",    
				data: {
					teaid:value,
					},
				success: function(data){ 
					$("#foldselect").html(data);	
				}
			}); 
	}
	function submit_work(obj){
		var xhr = new XMLHttpRequest();
        xhr.open('post', 'submitwork.php');
        xhr.onload = function () {
        	alert(xhr.responseText);
        }
        var data = new FormData();
        data.append("teaid",$("#selecttea option:selected").val());
        data.append("stuid",$('#submituserid').text());
        data.append("foldid",$("#selectfold option:selected").val());
        data.append("foldname",$("#selectfold option:selected").text());
        data.append("file",$("#txt_file")[0].files[0]);
        xhr.send(data); 
	}
</script>