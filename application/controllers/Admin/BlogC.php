<?php

class BlogC extends CI_Controller{
    /**********添加**********/
    public function add(){
        //引入表单验证
        $this->load->library('Form_validation');
        //定义验证规则的替代参数
         $this->form_validation->set_rules('content', '内容', 'required');
         $this->form_validation->set_rules('title', '标题', 'required');

        if($this->form_validation->run() === false){
            //验证失败
            $this->load->view("Admin/Blog/add");
        }else{
            //验证成功,生成model，调用add方法
            $this->load->model('BlogM');
            $this->BlogM->add();

            //跳转页面
            redirect(site_url("Admin/BlogC/lst"));
        }
    }

    /*************显示************/
    public function lst(){
        $this->load->model('BlogM');
        $data = $this->BlogM->search(5);
        $this->load->view('Admin/Blog/lst', $data);
    }

    /*************删除************/
    public function del($id){
        $this->load->model('BlogM');
        $this->BlogM->delete($id);
        redirect('Admin/BlogC/lst');
    }
    /**********修改**********/
    public function save($id){
        //取出当前日志的信息
        $this->load->model('BlogM');
        $info = $this->BlogM->find($id);
        //表单验证
        $this->load->library('form_validation');
         $this->form_validation->set_rules('content', '内容', 'required');
         $this->form_validation->set_rules('title', '标题', 'required');
        if($this->form_validation->run() === false){
            $this->load->view("Admin/Blog/save", array('info'=>$info));
        }else{
            //验证成功,调用save方法
            $this->BlogM->save();
            redirect(site_url('Admin/BlogC/lst'));
        }
    }
}