<?php
include_once "base.php";
foreach($_POST['id'] as $idx=>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Menu->del($id);
    }else{
        $row=$Menu->find($id);
        $row['name']=$_POST['name'];
        $row['href']=$_POST['href'];
        $Menu->save($row);
    }
}

if(isset($_POST['add_name'])){
    foreach($_POST['add_name'] as $idx=>$name){
        if(!empty($name)){
            $Menu->save([
                        'name'=>$name,
                        'href'=>$_POST['add_href'][$idx],
                        'parent'=>$_POST['parent'],
                        'sh'=>1
            ]);
        }
    }
}
to("../back.php?do=menu");
?>