<br>
        <div class="alert mycolor1" role="alert">구분</div>

<form name="form1" method="POST">
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
                    <input type="text" name="name" size="20" maxlength="20" value="<?= set_value("name", $row->name12, TRUE); ?>" class="form-control form-control-sm">
                    <? if (form_error("name") == true) echo form_error("name"); ?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <input type="submit" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>