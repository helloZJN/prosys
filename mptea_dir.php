<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='teacher_info'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>
<?php echo "<a style='display:none' id='mkdir_id'>".$_SESSION['userid']."</a>"; ?>
<div class="widget-head am-cf" >
	<div class="widget-title am-fl" style="font-size: 30px">文件夹-mobile</div>
</div>
<div class="widget-body am-fr">
	<div class="col-md-8" ">
	<form class="am-form tpl-form-line-form" class="col-md-8">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
        	<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
	            <input type="text" class="am-form-field " id="foldername">
	            <span class="am-input-group-btn">
	                <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" 
	                onclick="make_dir(this)" type="button">创建</button>
	            </span>
	        </div>
	        <small>输入新文件夹名</small>
	    </div>
	    <div class="am-u-sm-12 am-u-md-12 am-u-lg-6">
		    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
	            <div class="am-form-group tpl-table-list-select" >
	                <select id="folder-select" onchange="selectchange()">
	                <option value="" selected disabled></option>
		                <?php 
			            	$dbe=new Oracle_oci();
							$dbe->conn();
							if($dbe->conn){
								$stid=$dbe->select("select * from folder where teaid='".$_SESSION['userid']."'");
								while($row=oci_fetch_array($stid)){
									echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
								}
								$dbe->close();
							}
				        ?>
	                </select>

		            <small>选择文件夹</small> 
		        </div>
	        </div>
	    </div>
	</form>

	</div>
</div>

<div class="widget-head am-cf" >
	<div class="widget-title am-fl" style="font-size: 30px">文件操作</div>
</div>
<div  class="row" >
	<div class="col-md-8" ">
	<table class="am-table am-table-compact am-table-striped tpl-table-black" id="example-r" >
		<thead>
			<tr>
				<th>文件名</th>
				<th>作者</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody id="stu_work">
			
		</tbody>

	</table>
	</div>
</div>

<script type="text/javascript">
	function selectchange(){
		var value = $("#folder-select").val();
		$.ajax({
			type: "POST",    
			url: "mpgetstuwork.php",    
			data: {
				foldid:value,
				},
			success: function(data){ 
				$("#stu_work").html(data);
			}
		});
	}
	function make_dir(e){
		var myDate = new Date();
		if($("#foldername").val()==""){
			alert("文件夹名不能为空");
			return false;
		}
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
						alert(data);
					}
				}
		}); 
	}
	function downloadfile(argument) {
		var index=argument.id;
		var filenameindex="#name"+index;
		var filename=$(filenameindex).text();
		var filepathindex="#path"+index;
		var filepath=$(filepathindex).text();
		var url="download.php";  
		var form=$("<form></form>");  
		form.attr("action",url);  
		form.attr("method","post");  
		var inputfile_name=$("<input type='text' name='file_name'/>");  
		inputfile_name.attr("value",filename);  
		var inputfile_path=$("<input type='text' name='file_dir'/>");  
		inputfile_path.attr("value",filepath);   
		form.append(inputfile_name);  
		form.append(inputfile_path);  
		form.appendTo("body");    
		form.hide();  
		form.submit();
	}

	function deletefile(argument){
		var index=argument.id;
		var filenameindex="#name"+index;
		var filename=$(filenameindex).text();
		var filepathindex="#path"+index;
		var filepath=$(filepathindex).text();
		filepath=filepath+"/"+filename;
		$.ajax({
			type: "POST",
			url: "delfile.php",
			data: {
				filepath:filepath,
				filename:filename
			},
			success: function(res) {
				alert(res);
				selectchange();
			}
		});
	}

</script>