<?php
session_start();
require('sets.php');

$setObj = new Set($_SESSION['set1'], $_SESSION['set2']);


$arr= array('re_fun'=>'','arg'=>array(),'class'=>'errMsg','msg'=>'Server error occured.','redirect'=>'','data'=>'');

if(isset($_POST['step1'])){

    $opertion = $_POST['opertion'];
    $number = (int) $_POST['number'];
    $set = $_POST['set'];

   if($opertion==1){
    $res = $setObj->addNumber($set, $number);
   }

   else if($opertion==2){
    $res = $setObj->exists($set, $number);
   }

   else if($opertion==3){
    $res = $setObj->addNumber($set, $number);
   }

   else if($opertion==4){
    $res = true;
   }


   $_SESSION[$set] = $setObj->getSet($set);

   $arr['msg'] = 'success.';
   $arr['class']='sucMsg';
   $arr['data']=$setObj->getSet($set);
   $arr['arg']=[$res, $set];
   $arr['re_fun']='showresult';


    echo json_encode($arr);
    exit;

}
else if(isset($_POST['step2'])){
    
    $opertion = $_POST['opertion'];

   if($opertion=='union'){
    $res = $setObj->union($setObj->set1, $setObj->set2);
   }

   else if($opertion=='intersection'){
    $res = $setObj->intersection($setObj->set1, $setObj->set2);
   }

   $arr['msg'] = 'success.';
   $arr['class']='sucMsg';
   $arr['data']=array_values($setObj->printSet());
   $arr['re_fun']='showresul2';

    echo json_encode($arr);
    exit;

}

else{

}
