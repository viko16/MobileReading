<?php $this->load->view('admin/header'); ?>


<?php if (isset($articles)): ?>
<!--以下是文章列表页面-->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mytable').dataTable({
                //'bInfo':false,
                'bFilter':false,//搜索
                'bSort':false,//排序
                "bPaginate": true,//分页
                "bSearchable": false,//参与搜索
                'bLengthChange':false,//改变每页展示数量
                "oLanguage": {
                    "sLengthMenu": "每页显示 _MENU_ 条记录",
                    "sZeroRecords": "暂无数据",
                    "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条",
                    "sInfoEmpty": "",
                    "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                    "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "<<",
                    "sNext": ">>",
                    "sLast": "尾页"}
                },
                "sDom": "<'row'r>t<'row'<'span6'i><p>>",
                "sPaginationType": "bootstrap"
            });
        });
    </script>
    <table class="table" id="mytable">
        <thead>
        <tr>
            <th>点击量</th>
            <th>标题</th>
            <th>分类</th>
            <th>日期</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td><a class="btn btn-primary" href="<?= base_url('admin/article/add') ?>">新建</a></td>
        </tr>
        </tfoot>
        <tbody>
            <?php if(!empty($articles)):?>
                <?php foreach ($articles as $a_item): ?>
                    <tr>
                        <td><span class="show_click_times" title="点击次数"><?= $a_item['clicktimes'] ?></span></td>
                        <td><?php echo $a_item['priority'] == 1?"<font style='color:red'>[置顶]</font>":"";?><a href="<?=base_url('?bid=').$a_item['id']?>" target="_blank" title="点击查看文章"><?= $a_item['title'] ?></a></td>
                        <td><a href="<?=base_url('lists/'.$a_item['classid'])?>" target="_blank" title="点击查看该分类">
                            <?php $c=$this->classify_model->get_classify($a_item['classid']);echo $c["classname"];?>
                        </a></td>
                        <td><?= $a_item['modifydate'] ?></td>
                        <td><?= ($a_item['status']!==0)?'正常':'隐藏'?></td>
                        <td><a href="<?= base_url('admin/article') . "/" . $a_item['id'] ?>">修改</a> | <a
                                href="<?= base_url('admin/delArticle') . "/" . $a_item['id'] ?>"
                                onclick="{if(confirm('删除?')){this.document.myform.submit();return true;} return false;}">删除</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
<?php endif ?>



<?php if (isset($article_edit)): ?>
 <!--以下是编辑文章页面-->   
    <?php echo form_open('admin/editArticle' . "/" . $article_edit['id'],array('class'=>'form-horizontal')) ?>
    <fieldset>
        <legend>编辑文章</legend>
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
                <input type="text" maxlength="30" title="标题" class="span3" placeholder="请填写标题" id="title" name="title" value="<?=$article_edit['title']?>"/>
            </div>
        </div>
        <div class="control-group">
            <label for="modifydate" class="control-label">发布日期</label>
            <div class="controls">
                <span id="datetimepicker4" class="input-append">
                    <input type="text" title="发布日期" class="input-small" placeholder="默认为今天" id="modifydate" name="modifydate" value="<?=$article_edit['modifydate']?>" readonly/>
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
                <textarea title="正文内容" id="content" name="content" style="width:70%;height: 200px;"><?=$article_edit['content']?></textarea>
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
                <input type="text" title="点击次数" class="input-mini" placeholder="默认为0" id="clicktimes" name="clicktimes" value="<?=$article_edit['clicktimes']?>"/>
            </div>
        </div>
        
        <p>
            <div class="alert alert-error" style="text-align:center;width:300px;display:none;" id="tixing">
                <strong>还有没填完的项哦~ 请检查后再次提交。</strong>
            </div>
        </p>  
        <p class="well">
            <input type="submit" value="修改文章" class="btn btn-primary" id="submit"/>
            &nbsp;| <a href="<?= base_url('admin/article/manage') ?>">返回列表</a>
        </p>
        <!-- 读取数据库，填充表单 -->
        <script type="text/javascript">
            $(document).ready(function () {
            $("#classify").find("option[value='<?=$article_edit['classid']?>']").prop("selected", true);
            $("input[name='priority'][value='<?=$article_edit['priority']?>']").attr("checked",true);
        });
        </script>
    <fieldset>
    </form>
    <script>
        $(function () {
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
<?php endif ?>

<?php $this->load->view('admin/footer'); ?>