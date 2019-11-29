<br>
        <div class="alert mycolor1" role="alert">사용자</div>

<form name="form1" method="POST">
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
                    <input type="text" name="name" size="20" maxlength="20" value="<?= set_value("name", $row->name12, TRUE); ?>" class="form-control form-control-sm">
                    <? if (form_error("name") == true) echo form_error("name"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 아이디
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="uid" class="form-control form-control-sm" value="<?= set_value("uid", $row->uid12, TRUE); ?>">
                    <? if (form_error("uid") == true) echo form_error("uid"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 암호
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="pwd" class="form-control form-control-sm" value="<?= set_value("pwd", $row->pwd12, TRUE); ?>">
                    <? if (form_error("pwd") == true) echo form_error("pwd"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                    전화
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>" class="form-control form-control-sm">-
                    <input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>" class="form-control form-control-sm">-
                    <input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>" class="form-control form-control-sm">
                </div>
            </td>
        </tr>

        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                    등급
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                <? if ($rank == "직원") {
                    ?>
                    <label><input type="radio" name="rank" value="0" checked="">&nbsp;직원</label>&nbsp;&nbsp;
                    <label><input type="radio" name="rank" value="1">&nbsp;관리자</label>
                    <?
                    } else {
                    ?>
                    <input type="radio" name="rank" value="0"> 직원
                    <input type="radio" name="rank" value="1" checked> 관리자
                <? } ?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <input type="submit" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>