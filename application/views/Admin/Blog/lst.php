<?php $this->load->view('Admin/top');?>
<div class="container clearfix">
<?php $this->load->view('Admin/menu');?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?=site_url('Admin/BlogC/lst');?>" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="title" value="<?php echo $this->input->get('title');?>" id="" type="text"></td>
                        </tr>
                        <tr>
                            <th width="70">是否显示:</th>
                            <td>

                                <input type="radio" name="is_show" <?php if(!$this->input->get('is_show')){echo 'checked="checked"';}?> checked="checked" value=""/>全部
                                <input type="radio" name="is_show" <?php if($this->input->get('is_show')==='是'){echo 'checked="checked"';}?> value="是"/>是
                                <input type="radio" name="is_show" <?php if($this->input->get('is_show')==='否'){echo 'checked="checked"';}?> value="否"/>否
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?=site_url('Admin/BlogC/add');?>"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>是否显示</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <?php foreach($data->result() as $k=>$v):?>
                        <tr>
                            <td><?=$v->id?></td>
                            <td title="<?=$v->title?>"><a target="_blank" href="#" title="<?=$v->title?>"><?=$v->title?></a>
                            </td>
                            <td><?=$v->is_show?></td>
                            <td><?=$v->addtime?></td>
                            <td>
                                <a class="link-update" href="<?=site_url('Admin/BlogC/save/'.$v->id);?>">修改</a>
                                <a class="link-del" onclick="return confirm('确定要删除吗？');" href="<?=site_url('Admin/BlogC/del/'.$v->id)?>">删除</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                    <div class="list-page"><?=$links?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>