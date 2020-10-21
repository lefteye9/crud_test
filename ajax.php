<?php

if(!empty($_POST['ajax_check'])){
    try{
        $dbh = dbConnect();
        $sql = 'SELECT ajax_item FROM id = :id';
        $data = array(':id' => 1);
        $stmt = queryPost($dbh, $sql, $data);
        return $rst = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($rst)){
            echo json_encode(array(
                'errorFlg' => true,
                'msg' => 'ajax処理できるかな'
            ));
        }else{
            echo json_encode(array(
                'errorFlg' => 'false',
                'msg' => 'ajaxは成功しています。'
            ));
        }
        exit();
    }catch(Exception $e){
        error_log('エラー発生：'.$e->getMessage());
    }
}

?>