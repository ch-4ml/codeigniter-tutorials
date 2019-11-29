<br>
        <div class="alert mycolor1" role="alert">매출장</div>

<form name="form1" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered table-sm mymargin5">
        <tbody>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 날짜
            </td>
            <td width="80%" align="left"> 
                <div class="form-inline input-group input-group-sm table-sm date" id="text1">
                    <input type="text" name="date" size="20" maxlength="20" value="<?= set_value("date"); ?>" class="form-control form-control-sm">
                    <? if (form_error("date") == true) echo form_error("date"); ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 제품명
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="hidden" name="product_no">
                    <input type="text" name="product_name" class="form-control form-control-sm" readonly>
                    <input type="button" value="제품찾기" onClick="search_product();" class="btn btn-sm mycolor1">
                </div>
                <? if(form_error("product_no") == TRUE) echo form_error("product_no"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 단가
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="price" class="form-control form-control-sm" value="<?= set_value("price"); ?>" readonly>
                    <? if (form_error("price") == true) echo form_error("price"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 수량
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="sq" class="form-control form-control-sm" value="<?= set_value("sq"); ?>" onChange="cal_prices();">
                    <? if (form_error("sq") == true) echo form_error("sq"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 금액
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="prices" class="form-control form-control-sm" value="<?= set_value("prices"); ?>" readonly>
                    <? if (form_error("prices") == true) echo form_error("prices"); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="mycolor2" style="vertical-align:middle">
                <font color="red">*</font> 비고
            </td>
            <td width="80%" align="left">
                <div class="form-inline">
                    <input type="text" name="remarks" class="form-control form-control-sm" value="<?= set_value("remarks"); ?>">
                    <? if (form_error("remarks") == true) echo form_error("remarks"); ?>
                </div>
            </td>
        </tr>
    </tbody></table>
    <div align="center">
        <input type="submit" value="저장" class="btn btn-sm mycolor1">
        <input type="button" value="이전버튼" class="btn btn-sm mycolor1">
    </div>
</form>

<script>
$(function() {
    $('#text1').datetimepicker({
        locale: 'ko',
        format: 'YYYY-MM-DD',
        defaultDate: moment()
    });
});

function select_product() {
    var str;
    str = form1.sel_product_no.value;
    if (str == "") {
        form1.product_no.value = "";
        form1.price.value = "";
        form1.prices.value = "";
    } else {
        str = str.split("^^");
        form1.product_no.value = str[0];
        form1.price.value = str[1];
        form1.prices.value = Number(form1.price.value) * Number(form1.sq.value);
    }
}

function cal_prices() {
    form1.prices.value = Number(form1.price.value) * Number(form1.sq.value);
    form1.remarks.focus();
}

function search_product()
{
    window.open("/~four12/search_product/lists/type/1","","resizable=yes,scrollbars=yes,width=500,height=600");
}
</script>