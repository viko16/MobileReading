<?php $this->load->view('admin/header'); ?>


<span>
	<?php echo form_open('admin/modifyAdminInfo',array('class'=>'form-horizontal')) ?>
	<fieldset>
		<legend>修改密码</legend>
		<div class="control-group" style="margin-left:-50px;">
			<label for="prepwd" class="control-label"><span class="must-input">*</span>当前用户</label>
			<div class="controls">
				<input type="text" name="prepwd" id="prepwd" value="<?=$this->session->userdata('admin');?>" disabled="disabled">
			</div>
		</div>
		<div class="control-group" style="margin-left:-50px;">
			<label for="prepwd" class="control-label"><span class="must-input">*</span>当前密码</label>
			<div class="controls">
				<input type="password" name="prepwd" id="prepwd" value="" placeholder="请输入当前密码">
			</div>
		</div>
		<div class="control-group" style="margin-left:-50px;">
			<label for="newpwd" class="control-label"><span class="must-input">*</span>输入新密码</label>
			<div class="controls">
				<input type="password" name="newpwd" id="newpwd" value="" placeholder="请输入新密码">
			</div>
		</div>
		<div class="control-group" style="margin-left:-50px;">
			<label for="newpwd2" class="control-label"><span class="must-input">*</span>重复新密码</label>
			<div class="controls">
				<input type="password" name="newpwd2" id="newpwd2" value="" placeholder="请再次输入新密码">
			</div>
		</div>
		<p>
			<div class="alert alert-error" style="text-align:center;width:300px;display:none;" id="tixing">
		    	<strong>还有没填完的项哦~ 请检查后再次提交。</strong>
			</div>
		</p>
		<p class="well">
		    <input type="submit" value="修改密码" class="btn btn-primary" id="submit" style="margin-left:30px;">
		</p>
	</fieldset>
	<script>
	    $(function () {
	        $('#tixing').hide();
	        $("#submit").click(function () {
	            $('#tixing').hide();
	            var prepwd = $("#prepwd").val();
	            var newpwd = $("#newpwd").val();
	            var newpwd2 = $("#newpwd2").val();
	            if (prepwd == "" || newpwd == "" || newpwd2 == "") {
	                $("#tixing").fadeIn('slow');
	                return false;
	            }
	        });
	    });
	</script>
	</form>	
</span>

<?php $this->load->view('admin/footer'); ?>