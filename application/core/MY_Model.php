<?php

    class MY_Model extends CI_Model{
        protected $_tableName;          //操作的数据库表名
        protected $_insertFields;       //添加数据时允许接受的字段
        protected $_updateFields;       //修改数据时允许修改的字段

        /************根据id获取当前model的基本信息***********/
        public function find($id){
            $this->db->from($this->_tableName);
            $this->db->where('id', $id);
            $data = $this->db->get()->result('array');
            return $data[0];
        }
        /************根据id删除当前model***********/
        public function delete($id){
            //判断是否存在_before_delete钩子函数，有则先执行
            if(method_exists($this, '_before_delete')){
                if($this->_before_delete($id) === false){
                    return false;
                }
            }
            $this->db->delete($this->_tableName, array('id' => $id));
        }
        /**************添加信息*****************/
        public function add(){
            //根据允许字段获取表单数据
            $data = array();
            foreach($this->_insertFields as $k=>$v){
                $data[$v] = $this->input->post($v, true);
            }
            //调用添加前的钩子函数
            if(method_exists($this, '_before_insert')){
                if($this->_before_insert($data) === false){
                    return false;
                }
            }
            //添加进数据库
            $this->db->insert($this->_tableName, $data);
            //获取新添加的数据的id
            $data['id'] = $this->db->insert_id();
            //调用添加后的钩子函数
            if(method_exists($this, '_after_insert')){
                $this->_after_insert($data);
            }

            return $data['id'];
        }
        /**************修改信息****************/
        public function save(){
            /**获取允许接收的表单数据*/
            $data = array();
            foreach($this->_updateFields as $k=>$v){
                $data[$v] = $this->input->post($v, true);
            }
//        获取要修改的记录的id，需要表单隐藏域传入
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            /**调用修改前的钩子函数*/
            if(method_exists($this, '_before_update')){
                if($this->_before_update($data) === false){
                    return false;
                }
            }
            /**修改数据*/
            $res = $this->db->update($this->_tableName, $data);
            /**调用修改后的钩子函数*/
            if(method_exists($this, '_after_update')){
                $this->_after_update($data);
            }
            return $res;
        }
    }