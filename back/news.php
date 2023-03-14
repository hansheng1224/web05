<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <!-- <td width="23%">替代文字</td> -->
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $all = $News->count();
                $div = 4;
                $pages = ceil($all / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;

                $rows = $News->all(" limit $start,$div");
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                ?>
                    <tr>
                        <!-- <td>
                            <img src="./upload/<?= $row['img']; ?>" alt="" style="width:100x;height:68px">
                        </td> -->
                        <td>
                            <textarea name="text[]" id="" style="width:95%;height:62px"><?= $row['text']; ?></textarea>
                        <!-- <input type="text" name="text[]" id="" value="<?= $row['text']; ?>" style="width:95%"> -->
                    </td>
                        <td>
                            <input type="checkbox" name="sh[]" id="" value="<?= $row['id']; ?>" <?= $checked; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <!-- <input type="button" value="更換圖片" onclick="op('#cover','#cvr','./modal/upload_image.php?id=<?= $row['id']; ?>')"> -->
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
                <?php
                if(($now-1)>0){
                    $prev=$now-1;
                    ?>
                    <a href="?do=news&p=<?=$prev;?>"> < </a>
                    <?php
                }
                ?>

                <?php
                for($i=1;$i<=$pages;$i++){
                    $size=($i==$now)?'26px':'16px';
                    ?>
                    <a href="?do=news&p=<?=$i;?>" style="font-size:<?=$size;?>"> <?=$i;?> </a>
                    <?php
                }
                ?>

                <?php
                if(($now+1)<=$pages){
                    $next=$now+1;
                    ?>
                    <a href="?do=news&p=<?=$next;?>"> > </a>
                    <?php
                }
                ?>
            </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/news.php')" value="新增最新消息資料"></td>
                    <td class="cent">
                        <input type="hidden" name="table" value="News">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
</div>