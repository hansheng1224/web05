<?php
include_once "../api/base.php";
?>
<h3>編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table id="sub">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows=$Menu->all(['parent'=>$_GET['id']]);
        foreach($rows as $row){
            ?>
            <tr>
            <td>
                <input type="text" name="name[]" id="" value="<?=$row['name'];?>">
            </td>
            <td>
                <input type="text" name="href[]" id="" value="<?=$row['href'];?>">
            </td>
            <td>
                <input type="checkbox" name="del[]" id="" value="<?=$row['id'];?>">
            </td>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>
            <?php
        }
        ?>
        
    </table>
    <input type="hidden" name="table" value="Menu">
    <input type="hidden" name="parent" value="<?=$_GET['id'];?>">
    <input type="submit" value="確定修改">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</form>
<script>
    function more(){
        let html=`<tr>
            <td>
                <input type="text" name="add_name[]" id="" value="">
            </td>
            <td>
                <input type="text" name="add_href[]" id="" value="">
            </td>
            </tr>`
            $("#sub").append(html)
    }
</script>