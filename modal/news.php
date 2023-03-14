<h3>新增消息資料管理</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <!-- <tr>
            <td>最新消息資料:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr> -->
        <tr>
            <td>最新消息資料:</td>
            <td>
                <textarea name="text" id="" cols="30" rows="10"></textarea>
                <!-- <input type="text" name="text" id=""> -->
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="News">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>