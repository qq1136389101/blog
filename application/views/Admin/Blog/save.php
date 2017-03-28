<?php $this->load->view('Admin/top');?>
<div class="container clearfix">
<?php $this->load->view('Admin/menu');?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?=site_url('Admin/BlogC/save');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$info['id']?>">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?=set_value('title',$info['title']);?>" type="text">
                                    <span class="error"><?=form_error('title');?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>内容：</th>
                                <td>
                                    <textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"><?=set_value('content', $info['content']);?></textarea>
                                   <span class="error"><?=form_error('content');?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>是否显示：</th>
                                <td>
                                    <?php $isShow = $info['is_show']?>
                                    <input type="radio" name="is_show" value="是" <?php if($isShow==='是')echo 'checked="checked"'?>/>是
                                    <input type="radio" name="is_show" value="否" <?php if($isShow==='否')echo 'checked="checked"'?>/>否
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>

<style type="text/css">
    .error{color:red; font-weight: bold;}
    </style>