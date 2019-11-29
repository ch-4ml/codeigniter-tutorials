<? $tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
<br>
        <div class="alert mycolor1" role="alert">사용자</div>

<form name="form1" method="member_insert.html">
    <?
        $no=$row->no12;
        $tel1 = trim(substr($row->tel12,0,3));
        $tel2 = trim(substr($row->tel12,3,4));
        $tel3 = trim(substr($row->tel12,7,4));
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
        $rank = $row->rank12 == 0 ? '직원' : '관리자';
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
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 아이디
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                   <?=$row->uid12?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 암호
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                   <?=$row->pwd12?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                    전화
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?=$tel1?>-<?=$tel2?>-<?=$tel3?>
                </div>
            </td>
        </tr>

        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                    등급
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <?
                    if ($rank == "직원") {
                    ?>
                        직원
                    <?
                    } else {
                    ?>
                        관리자
                    <?
                    }
                    ?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <a href="/~four12/member/edit<?=$tmp?>" class="btn btn-sm mycolor1">수정</a>
        <a href="/~four12/member/del<?=$tmp?>" class="btn btn-sm mycolor1" onClick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
        <input type="button" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>