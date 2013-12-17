<?php $this->load->view('admin/header'); ?>


<span>
	<?php echo form_open('admin/createArticle',array('class'=>'form-horizontal')) ?>
	<fieldset>
		<legend>发布文章</legend>		
		<div class="control-group">
			<label for="classify" class="control-label"><span class="must-input">*</span>分类</label>
			<div class="controls">
				<select id="classify" name="classify" style="width: 130px;">
					<option value="" selected disabled="disabled">-- 请选择分类 --</option>
				    <?php foreach ($classify as $c): ?>
				        		<option value="<?= $c['id'] ?>"><?=$c['classname']?></option>
				    <?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label for="title" class="control-label"><span class="must-input">*</span>标题</label>
			<div class="controls">
				<input type="text" maxlength="30" title="标题" class="span3" placeholder="请填写标题" id="title" name="title"/>
			</div>
		</div>
		<div class="control-group">
			<label for="modifydate" class="control-label">发布日期</label>
			<div class="controls">
				<span id="datetimepicker4" class="input-append">
	    			<input type="text" title="发布日期" class="input-small" placeholder="默认为今天" id="modifydate" name="modifydate" value="<?=date('Y-m-d')?>" readonly/>
	    			<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar" id="selectdate"></i></span>
				</span>
				<script type="text/javascript">
				  $(function() {
				    $('#datetimepicker4').datetimepicker({
				      maskInput: true,
				      pickTime: false,
				      format:'yyyy-MM-dd',
				      language:'zh-CN'
				    });
				    $('#modifydate').click(function(){
				    	$('#selectdate').click();
				    });
				  });
				</script>
			</div>
		</div>
		<div class="control-group">
			<label for="content" class="control-label"><span class="must-input">*</span>内容</label>
			<div class="controls">
				<textarea title="正文内容" id="content" name="content" style="width:70%;height: 200px;"></textarea>
			    <script type="text/javascript">
			        UM.getEditor('content');
			    </script>
			</div>
		</div>
		<div class="control-group">
			<label for="priority" class="control-label">优先级</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" name="priority" value="0" checked="checked">默认</label>
				<label class="radio inline"><input type="radio" name="priority" value="1"><b style="color:red;">置顶</b></label>        		
			</div>
		</div>
		<div class="control-group">
			<label for="clicktimes" class="control-label">点击次数</label>
			<div class="controls">
				<input type="text" title="点击次数" class="input-mini" placeholder="默认为0" id="clicktimes" name="clicktimes" value="0"/>
			</div>
		</div>
		
		<p>
			<div class="alert alert-error" style="text-align:center;width:300px;display:none;" id="tixing">
		    	<strong>还有没填完的项哦~ 请检查后再次提交。</strong>
			</div>
		</p>
		<p class="well">
		    <input type="submit" value="发布文章" class="btn btn-primary" id="submit"/>
		    &nbsp;| <a href="<?= base_url('admin/article/manage') ?>">返回列表</a>
		</p>
	</fieldset>
	</form>	
	<script>
	    $(function () {
	    	/*简单表单验证*/
	        $('#tixing').hide();
	        $("#submit").click(function () {
	            $('#tixing').hide();
	            var classify = $("#classify option:selected").attr("value");
	            var title = $("#title").val();
	            var content = $("#content").val();
	            var clicktimes = $("#clicktimes").val();
	            if (classify == "" || title == "" || content == "" || clicktimes == "" || clicktimes<0) {
	                $("#tixing").fadeIn('slow');
	                return false;
	            }
	        });
	        
	    });
	</script>
</span>



<?php $this->load->view('admin/footer'); ?>