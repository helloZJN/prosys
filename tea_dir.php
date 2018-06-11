<h1 class="page-header" id="pageheader">文件夹<button class="pull-right btn btn-info" onclick="make_dir(this)">创建文件夹</button></h1>

<div class="row">     
	<div class="col-md-12">
		<!--—panel面板，里面放置一些控件，下同---->
		<div class="panel panel-primary">
			<!--—panel面板的标题，下同---->
			<div class="">
				<div> <select class="form-control col-md-4" onchange="selectOnchang(this)">
			            <option>文件夹1</option>
			            <option>文件夹2</option>
			            <option>文件夹3</option>
			            <option>文件夹4</option>
			        </select>
			    </div>
			       
			</div>

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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">创建</button>
      </div>
    </div>
  </div>
</div>
<?php echo "<a style='display:none' id='mkdir_id'>".$_SESSION['userid']."</a>"; ?>
<script type="text/javascript">
	function selectOnchang(e){

	}
	function make_dir(e){
		$base_dir="folder/";
		$base_dir=$base_dir+$("#mkdir_id").text()+"/";
		$foldername=$("#foldername").val();
		alert($base_dir);
		$('#makedir').modal({
            keyboard: true
        });
	}
</script>