<h3>新增校園映象資料</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>校園映象圖片</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <!-- <tr>
            <td>動態文字廣告</td>
            <td>
                <input type="text" name="text" id="">
            </td>
        </tr> -->
    </table>
    <input type="hidden" name="table" value="Image">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>