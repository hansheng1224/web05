<h3>更新動畫圖片</h3>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>動畫圖片</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <!-- <tr>
            <td>標題區替代文字</td>
            <td>
                <input type="text" name="text" id="">
            </td>
        </tr> -->
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="hidden" name="table" value="Mvim">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
</form>