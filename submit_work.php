<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='student'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>
<h1 class="page-header" id="pageheader">提交作业</h1>
<div class="row">     
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<form enctype="multipart/form-data">
			<legend>提交</legend>
		
			<div class="form-group">
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
<?php echo '<a style="display:none" id="submituserid">'.$_SESSION['userid'].'</a>'; ?>
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
		var myDate = new Date();
		// var data = new FormData($('#form1')[0]);
		// $.ajax({
		// 		type: "POST",    
		// 		url: "submitwork.php",    
		// 		data: {
		// 			fileid:myDate.getTime(),
		// 			teaid:$("#selecttea option:selected").val(),
		// 			stuid:$('#submituserid').val(),
		// 			foldid:$("#selectfold option:selected").val(),
		// 			foldname:$("#selectfold option:selected").text(),
		// 			filecontent:$('#txt_file'),
		// 			},
		// 		success: function(data){ 
		// 			alert(data);
		// 		}
		// 	});
		var xhr = new XMLHttpRequest();
        xhr.open('post', 'submitwork.php');
        xhr.onload = function () {
            console.log(xhr.responseText);
        }
        // // XHR2.0新增 上传进度监控
        // xhr.upload.onprogress = function (event) {
        //     //  console.log(event);
        //     var percent = event.loaded / event.total * 100 + '%';
        //     console.log(percent);
        //     // 设置 进度条内部step的 宽度
        //     document.querySelector('.step').style.width = percent;
        // }
        // XHR2.0新增 
        var data = new FormData();
        data.append("fileid",myDate.getTime());
        data.append("teaid",$("#selecttea option:selected").val());
        data.append("stuid",$('#submituserid').val());
        data.append("foldid",$("#selectfold option:selected").val());
        data.append("foldname",$("#selectfold option:selected").text());
        data.append("file",$("#txt_file")[0].files[0]);
        //4.请求主体发送(get请求为空，或者写null，post请求数据写在这里，如果没有数据，直接为空或者写null)
        xhr.send(data); 
	}
</script>