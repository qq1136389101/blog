<?php

/**
 * Class _tableName_C
 *      生成控制器后：
 *          请仔细检查表单验证规则，删除多余的，添加必要的，防止报错
 */
class _tableName_C extends CI_Controller{
    /**********添加**********/
    public function add(){
        //引入表单验证
        $this->load->library('Form_validation');
        //定义验证规则的替代参数
        #field_rules

        if($this->form_validation->run() === false){
            //验证失败
            $this->load->view("Admin/_tableName_/add");
        }else{
            //验证成功,生成model，调用add方法
            $this->load->model('_tableName_M');
            $this->_tableName_M->add();

            //跳转页面
            redirect(site_url("Admin/_tableName_C/lst"));
        }
    }

    /*************显示************/
    public function lst(){
        $this->load->model('_tableName_M');
        $data = $this->_tableName_M->search(5);
        $this->load->view('Admin/_tableName_/lst', $data);
    }

    /*************删除************/
    public function del($id){
        $this->load->model('_tableName_M');
        $this->_tableName_M->delete($id);
        redirect('Admin/_tableName_C/lst');
    }
    /**********修改**********/
    public function save($id){
        //取出当前日志的信息
        $this->load->model('_tableName_M');
        $info = $this->_tableName_M->find($id);
        //表单验证
        $this->load->library('form_validation');
        #field_rules
        if($this->form_validation->run() === false){
            $this->load->view("Admin/_tableName_/save", array('info'=>$info));
        }else{
            //验证成功,调用save方法
            $this->_tableName_M->save();
            redirect(site_url('Admin/_tableName_C/lst'));
        }
    }
}