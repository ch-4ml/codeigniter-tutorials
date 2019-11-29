<? $tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
<br>
        <div class="alert mycolor1" role="alert">구분</div>

<form name="form1" method="category_insert.html">
    <?
        $no=$row->no12;
    ?>
    <table class="table table-bordered table-sm mymargin5">
        <tbody><tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
            <td width="80%" align="left">
                <div class="form-inline"><?=$no?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 이름
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->name12;?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <a href="/~four12/category/edit<?=$tmp?>" class="btn btn-sm mycolor1">수정</a>
        <a href="/~four12/category/del<?=$tmp?>" class="btn btn-sm mycolor1" onClick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
        <input type="button" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>