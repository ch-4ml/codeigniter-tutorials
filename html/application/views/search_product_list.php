<br>   
        <div class="alert mycolor1" role="alert">제품찾기</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-6" align="left">            
                    <div class="input-group  input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">제품명</span>
                        </div>
                        <input type="text" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary mycolor1" type="button" onclick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
        <table class="table  table-bordered  table-sm  mymargin5">
            <tbody><tr class="mycolor2">
                <td width="10%">번호</td>			
                <td width="20%">구분명</td>
                <td width="40%">제품명</td>
                <td width="20%">단가</td>
                <td width="10%">재고</td>
            </tr>
            <?
                foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
                {
                    $no = $row->no12;                               // 사용자번호
            ?>
                <tr>
                <td><?= $no; ?></td>
                <td><?= $row->category_name ?></td>
                <td align="left"><a href="javascript:void(0);" onclick="send_product(<?=$no?>,'<?=$row->name12?>',<?=$row->price12?>, <?=$type?>)"><?=$row->name12?></a></td>
                <td align="right"><?= number_format($row->price12) ?></td>
                <td align="right"><?= number_format($row->stock12) ?></td>
            </tr>
            <?
                }
            ?>
        
        </tbody></table>
    
        <?= $pagination ?>

<script>
// Product SelectByCondition
function find_text() {
    if(!form1.text1.value) form1.action = "/~four12/search_product/lists";
    else form1.action = "/~four12/search_product/lists/text1/" + form1.text1.value;
    form1.submit();
}

function send_product(no, name, price, type) {
    opener.form1.product_no.value = no;
    opener.form1.product_name.value = name;
    opener.form1.price.value = price;
    if (type == "0") opener.form1.prices.value = Number(price) * Number(opener.form1.pq.value);
    else opener.form1.prices.value = Number(price) * Number(opener.form1.sq.value);
    self.close();
}

</script>