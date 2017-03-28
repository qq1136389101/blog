<?php

class UserC extends CI_Controller{
    /**********添加**********/
    public function add(){
        //引入表单验证
        $this->load->library('Form_validation');
        //定义验证规则的替代参数
         $this->form_validation->set_rules('username', '用户名', 'required'); $this->form_validation->set_rules('password', '密码', 'required');

        if($this->form_validation->run() === false){
            //验证失败
            $this->load->view("Admin/User/add");
        }else{
            //验证成功,生成model，调用add方法
            $this->load->model('UserM');
            $this->UserM->add();

            //跳转页面
            redirect(site_url("Admin/UserC/lst"));
        }
    }

    /*************显示************/
    public function lst(){
        $this->load->model('UserM');
        $data = $this->UserM->search(5);
        $this->load->view('Admin/User/lst', $data);
    }

    /*************删除************/
    public function del($id){
        $this->load->model('UserM');
        $this->UserM->delete($id);
        redirect('Admin/UserC/lst');
    }
    /**********修改**********/
    public function save($id){
        //取出当前日志的信息
        $this->load->model('UserM');
        $info = $this->UserM->find($id);
        //表单验证
        $this->load->library('form_validation');
         $this->form_validation->set_rules('username', '用户名', 'required'); $this->form_validation->set_rules('password', '密码', 'required');
        if($this->form_validation->run() === false){
            $this->load->view("Admin/User/save", array('info'=>$info));
        }else{
            //验证成功,调用save方法
            $this->UserM->save();
            redirect(site_url('Admin/UserC/lst'));
        }
    }
}