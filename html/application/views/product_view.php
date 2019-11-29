<? $tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
<br>
        <div class="alert mycolor1" role="alert">제품</div>

<form name="form1" method="product_insert.html">
    <?
        $no = $row->no12;
    ?>
    <table class="table table-bordered table-sm mymargin5">
        <tbody><tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">번호</td>
            <td width="80%" align="left">
                <div class="form-inline"><?=$no?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                구분명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->category_name;?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                제품명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->name12;?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                단가
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                   <?=$row->price12?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                재고
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                   <?=$row->stock12?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                    사진
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?
                        if($row->image12) echo("<img src='/~four12/product_img/$row->image12' width='200' class='img-fluid img-thumbnail'>");
                        else echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
                    ?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <a href="/~four12/product/edit<?=$tmp?>" class="btn btn-sm mycolor1">수정</a>
        <a href="/~four12/product/del<?=$tmp?>" class="btn btn-sm mycolor1" onClick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
        <input type="button" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>