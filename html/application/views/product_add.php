<br>
        <div class="alert mycolor1" role="alert">제품</div>

<form name="form1" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered table-sm mymargin5">
        <tbody>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 구분명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <select name="category_no" class="form-control form-control-sm">
                        <option value="">선택하세요.</option>
                        <?
                            $category_no = set_value("category_no");
                            foreach ($list as $row) {
                                if($row->no12 == $category_no) echo("<option value='$row->no12' selected>$row->name12</option>");
                                else echo("<option value='$row->no12'>$row->name12</option>");
                            }
                        ?>
                    </select>
                </div>
                <? if(form_error("category_no") == TRUE) echo form_error("category_no"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 제품명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="name" size="20" maxlength="20" value="<?= set_value("name"); ?>" class="form-control form-control-sm">
                    <? if (form_error("name") == true) echo form_error("name"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 단가
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="price" class="form-control form-control-sm" value="<?= set_value("price"); ?>">
                    <? if (form_error("price") == true) echo form_error("price"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 재고
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="stock" class="form-control form-control-sm" value="<?= set_value("stock"); ?>">
                    <? if (form_error("stock") == true) echo form_error("stock"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                    사진
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="file" name="image" class="form-control form-control-sm" value="<?= set_value("image"); ?>">
                    <? if (form_error("image") == true) echo form_error("image"); ?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <input type="submit" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>