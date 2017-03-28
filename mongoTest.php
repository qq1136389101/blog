<?php

    $mongo = new MongoClient();
    $goods = $mongo->test->goods->find();

    foreach($goods as $k=>$v){
        echo $v['name'];
    }
