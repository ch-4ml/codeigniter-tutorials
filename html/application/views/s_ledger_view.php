<? $tmp = "/no/$no/text1/$text1/page/$page"; ?>
<br>
        <div class="alert mycolor1" role="alert">매출장</div>

<form name="form1" method="s_ledger_insert.html">
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
                날짜
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->date12;?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                제품명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->product_name;?>
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
                수량
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                   <?=$row->sq12?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                금액
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->prices12?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                비고
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$row->remarks12?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <a href="/~four12/s_ledger/edit<?=$tmp?>" class="btn btn-sm mycolor1">수정</a>
        <a href="/~four12/s_ledger/del<?=$tmp?>" class="btn btn-sm mycolor1" onClick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
        <input type="button" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>