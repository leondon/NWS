<?php keke_tpl_class::checkrefresh('task/mreward/tpl/default/step2', '1414472632' );?><div class="release-form">
          <form class="form-horizontal" role="form" action="<?php echo $strUrl;?>&step=<?php echo $step;?>" method="post"  id="pubTaskForm<?php echo $step;?>" name="pubTaskForm<?php echo $step;?>">
  			<input type="hidden" name="<?php echo $step;?>" value="<?php echo $step;?>">
  			<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">

          <div class="form-group">
            <label class="col-sm-3 control-label">行业分类 <span class="text-danger">*</span></label>

              <div class="col-sm-3">
                  <select class="form-control" name="indus_pid" id="indus_pid" onchange="getIndustry(this.value,'indus_id')">
                     <option value="">请选择父行业</option>
                     <?php if(is_array($arrTopIndustrys)) { foreach($arrTopIndustrys as $v) { ?>
                     	<option value="<?php echo $v['indus_id'];?>" <?php if($arrPubInfo['indus_pid'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                     <?php } } ?>
                   </select>
              </div>
              <div class="col-sm-3">
                <select class="form-control" name="indus_id" id="indus_id">
                     <option value="">请选择子行业</option>
                     <?php if($arrPubInfo['indus_id']) { ?>
                      <?php if(is_array($arrAllIndustrys)) { foreach($arrAllIndustrys as $v) { ?>
<option value="<?php echo $v['indus_id'];?>" <?php if($arrPubInfo['indus_id'] == $v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                      <?php } } ?>
                     <?php } ?>
                   </select>
              </div>
              <div class="col-sm-offset-2 col-sm-8">
                   <span class="help-block"></span>
                 </div>

          </div>

          <!-- 行业分类 end -->

          <div class="form-group">
            <label for="txt_title" class="col-sm-3 control-label">标题名称 <span class="text-danger">*</span></label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="txt_title" name="txt_title" placeholder="标题名称" value="<?php echo $arrPubInfo['txt_title'];?>">
            </div>
            <div class="col-sm-3">
              <p class="form-control-static">任务标题最多50字符</p>
            </div>

          </div>
          <!-- 标题名称 end -->

          <div class="form-group">
            <label for="tar_content" class="col-sm-3 control-label">需求描述 <span class="text-danger">*</span></label>
            <div class="col-sm-6">
              <textarea id="tar_content" name="tar_content" class="form-control xheditor-simple {urlBase:'<?php echo $_K['siteurl']?>/',html5Upload:false,upImgUrl:'index.php?do=ajax&view=upload&file_type=att&filename=filedata',skin:'nostyle'}" rows="10" placeholder="需求描述"><?php echo $arrPubInfo['tar_content'];?></textarea>
            </div>
            <div class="col-sm-3">
              <p class="form-control-static">内容不的少于20字</p>
            </div>
      <script type="text/javascript" src="static/js/xheditor/xheditor.js"></script>
<script type="text/javascript">
 $(function(){
 	editor = $("#tar_content").xheditor();
 })
</script>
          </div>
          <!-- 需求描述 end -->

          <div class="form-group">
            <label for="upload" class="col-sm-3 control-label">上传附件</label>
            <div class="col-sm-3">
              <p class="form-control-static">
              <input type="file" id="upload" name="upload">
              <input type="hidden"  name="file_ids" id="fileid"  class="form-control" value="<?php echo $arrPubInfo['file_ids'];?>">
              </p>
            </div>
            <div class="col-sm-4">
              <p class="form-control-static">最多5个附件，每个附件不得超过20M。</p>
            </div>

 						<script src="static/js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link href="static/js/uploadify/uploadify.css" rel="stylesheet">
<script type="text/javascript">
                             $(function(){
                                    uploadify({
                                    	text:'上传附件',
                                    	auto:true,
                                    	hide:false,
                                    	exts:'<?php echo $strExtTypes;?>',
                                    	limit:5
                                    	},{
objType:'task'
                                    	},uploadResponse);
                                })
function uploadResponse(json){
                            	 $("#fileList").append('<li class="affix-list-item">'+json.msg.name+'</li>');
}
                        </script>

          </div>
          <!-- 上传附件 end -->

          <div class="form-group ">
            <div class="col-sm-offset-3 col-sm-6">
              <ul class="affix-list" id="fileList">
              <?php if(!empty($arrFileLists)) { ?>
              <?php if(is_array($arrFileLists)) { foreach($arrFileLists as $v) { ?>
              	<li class="affix-list-item" data-file-id="<?php echo $v['file_id'];?>"><?php echo $v['file_name'];?> 
              	<a href="javascript:void(0);" data-file-id="<?php echo $v['file_id'];?>" data-class="delete-file">删除</a></li>
              <?php } } ?>
              <?php } ?>
              </ul>
            </div>
          </div>
          <!-- 附件列表 end -->

          <div class="form-group">
            <label for="txt_mobile" class="col-sm-3 control-label">手机号码 <span class="text-danger">*</span></label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="txt_mobile" name="txt_mobile" value="<?php echo $arrPubInfo['txt_mobile'];?>" placeholder="手机号码">
            </div>


          </div>
          <!-- 手机号码 end -->

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-primary" value="下一步" onclick="return isAgreementChecked();">下一步</button>
              <button type="button" class="btn btn-link" onclick="history.back();">上一步</button>
              <span class="btn red hidden" id="pubAgreementTips">请同意《发布协议》</span>
            </div>
          </div>
          <!-- form-group end -->

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <div class="checkbox">
              <label>
                <input type="checkbox" checked="checked" value="true" id="agreementchecked"> 同意 <a href="javascript:void(0);" id="viewPubAgreement">《发布协议》 </a>
              </label>
            </div>
            </div>
          </div>
          <!-- form-group end -->

        </form>
        <div class="release-agreement hidden">
          <div class="agreement-header">
            <h2 class="agreement-title">《发布协议》</h2>
          </div>
          <p><?php keke_loaddata_class::readtag('任务发布协议') ?></p>
        </div>
      </div><?php keke_tpl_class::ob_out();?>