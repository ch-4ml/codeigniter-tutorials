<? $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
<br>   
        <div class="alert mycolor1" role="alert">제품</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-3" align="left">            
                    <div class="input-group  input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">제품명</span>
                        </div>
                        <input type="text" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
                        <div class="input-group-append">
                            <button class="btn  btn-primary mycolor1" type="button" onclick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
    
                <div class="col-9" align="right">           
                      <a href="/~four12/product/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
                      <a href="/~four12/product/cal_stock" class="btn btn-sm mycolor1">재고계산</a>
                </div>
            </div>
        </form>
    
        <table class="table  table-bordered  table-sm  mymargin5">
            <tbody><tr class="mycolor2">
                <td width="10%">번호</td>			
                <td width="20%">구분명</td>
                <td width="30%">제품명</td>
                <td width="20%">단가</td>
                <td width="20%">재고</td>
            </tr>
            <?
                foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
                {
                    $no = $row->no12;                                    // 사용자번호
            ?>
                <tr>
                <td><?= $no; ?></td>
                <td><?= $row->category_name ?></td>
                <td align="left"><a href="/~four12/product/view/no/<?=$no?><?=$tmp?>"><?=$row->name12?></a></td>
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
            if(!form1.text1.value) form1.action = "/~four12/product/lists";
            else form1.action = "/~four12/product/lists/text1/" + form1.text1.value;
            form1.submit();
        }
        </script>