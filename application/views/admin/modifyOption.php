<?php $this->load->view('admin/header'); ?>


<span>
	<?php echo form_open('admin/modifyoption',array('class'=>'form-horizontal')) ?>
	<fieldset>
		<legend>站点设置</legend>
		<div class="control-group" style="margin-left:-50px;">
			<label for="site_name" class="control-label"><span class="must-input">*</span>站点名称</label>
			<div class="controls">
				<input type="text" name="site_name" id="site_name" value="<?=$site_name=$this->option_model->get_option('site_name');?>">
			</div>
		</div>
		<p class="well">
		    <input type="submit" value="提交" class="btn btn-primary" id="submit" style="margin-left:30px;">
		</p>
	</fieldset>
	</form>	
</span>

<?php $this->load->view('admin/footer'); ?>