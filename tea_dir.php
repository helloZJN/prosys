<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='teacher_info'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>
<?php echo "<a style='display:none' id='mkdir_id'>".$_SESSION['userid']."</a>"; ?>
<div class="widget-head am-cf" >
	<div class="widget-title am-fl">文件夹</div>
</div>
<div class="widget-body am-fr">
	<div class="col-md-8" style="left:15%;">
	<form class="am-form tpl-form-line-form" class="col-md-8">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
        	<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
	            <input type="text" class="am-form-field " style="width: 200px" id="foldername">
	            <span class="am-input-group-btn">
	                <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" 
	                onclick="make_dir(this)" type="button">创建新文件夹</button>
	            </span>
	        </div>
	        <small>输入新文件夹名</small>
	    </div>
	    <div class="am-u-sm-12 am-u-md-12 am-u-lg-6">
		    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
	            <div class="am-form-group tpl-table-list-select" >
	                <select data-am-selected="{btnSize: 'sm'}" id="" style="width: 200px">
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

		            <small>选择文件夹</small> 
		        </div>
	        </div>
	        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                <div class="am-form-group">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-s">
                            <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</form>
	</div>
</div>


<script type="text/javascript">
	function selectOnchang(obj){
		var value = obj.options[obj.selectedIndex].val();
		
		$.ajax({
				type: "POST",    
				url: "getstuwork.php",    
				data: {
					foldid:value,
					},
				success: function(data){ 
					$("stu_work").html(data);	
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
					}else{
						
					}
				}
			}); 

	}
</script>