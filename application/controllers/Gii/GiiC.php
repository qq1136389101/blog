<?php

/**
 * Class GiiC
 * 注意事项：
 *      生成代码后一定要检查验证规则，有些验证规则生成的是错误的
 *      比如：添加时间不能为空，由于添加时间不是表单提交的，是手动加入的，
 *           所以表单会一直验证失败
 */
    class GiiC extends CI_Controller{

        /************生成代码************/
        public function create(){
            /**获取表名，并处理*/
            $_tableName = $this->input->post('tableName');
            if($_tableName){
                //去掉表前缀
                $tableName = substr($_tableName, strpos($_tableName, '_')+1);
                //首字母大写
                $tableName = ucfirst($tableName);

                /**根据模板生成控制器文件*/
                $str = file_get_contents('./application/controllers/Gii/templets/controller.php');
                //替换表名
                $str = str_replace('_tableName_', $tableName, $str);
                //替换验证规则
                $fields = $this->db->query('show full fields from '.$_tableName);
                $fields = $fields->result('array');
                $field_rules = '';
                foreach($fields as $k=>$v){
                    if($v['Field'] === 'id')
                        continue;
                    if($v['Null']==='NO' && $v['Default']===null){
                        $field_rules .= ' $this->form_validation->set_rules(\''.$v['Field'].'\', \''.$v['Comment'].'\', \'required\');';
                    }
                }
                if($field_rules !== '')
                    $str = str_replace('#field_rules', $field_rules, $str);
                //生成控制器文件
                file_put_contents( './application/controllers/Admin/'.$tableName.'C.php', $str);
                /**根据模板生成model文件*/
                //开启ob缓冲区
                ob_start();
                include './application./controllers/Gii/templets/model.php';
                $str = ob_get_clean();
                file_put_contents('./application/models/'.$tableName.'M.php', '<?php '.$str);
            }



            $this->load->view('gii');
        }
    }