<br>   
        <div class="alert mycolor1" role="alert">매출장</div>
    
        <!-- 검색 -->
        <form id="form1" name="form1" action="" method="post">
            <div class="row">
                <div class="col-6" align="left" style="display: inline;">            
                    <div class="input-group input-group-sm table-sm date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">날짜</span>
                        </div>
                        <input type="text" id="text1" name="text1" class="form-control" value="<?=$text1?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                            </div>
                        </div> &nbsp; - &nbsp;
                        <input type="text" id="text2" name="text2" class="form-control" value="<?=$text2?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <select id="text3" name="text3" class="form-control form-control-sm" onchange="javascript:find_text();">
                            <option value="0">전체</option>
                            <?
                                foreach ($list_product as $row) {
                                    if ($row->no12 == $text3) echo("<option value='$row->no12' selected>$row->name12</option>");
                                    else echo("<option value='$row->no12'>$row->name12</option>");
                                }
                            ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" value="EXCEL" class="form-control btn btn-sm mycolor1" onClick="if(confirm('엑셀파일로 저장할까요?')) make_excel();">
                    </div>
                </div>
            </div>
        </form>
    
        <table class="table table-bordered table-sm mymargin5">
            <tbody><tr class="mycolor2">		
                <td width="16%">날짜</td>
                <td width="30%">제품명</td>
                <td width="10%">단가</td>
                <td width="7%">매입수량</td>
                <td width="7%">매출수량</td>
                <td width="15%">금액</td>
                <td width="15%">비고</td>
            </tr>
            <?
                foreach ($list as $row)                                  // 연관배열 list를 row를 통해 출력한다.
                {
                    $no = $row->no12;                                    // 사용자번호
                    $pq = $row->pq12 ? number_format($row->pq12) : "";
                    $sq = $row->sq12 ? number_format($row->sq12) : "";
            ?>
            <tr>
                <td><?= $row->date12 ?></td>
                <td align="left"><?=$row->product_name?></td>
                <td align="right"><?= number_format($row->price12) ?></td>
                <td align="right"><?= $pq ?></td>
                <td align="right"><?= $sq ?></td>
                <td align="right"><?= number_format($row->prices12) ?></td>
                <td><?= $row->remarks12 ?></td>
            </tr>
            <?
                }
            ?>
        
        </tbody></table>
    
        <?= $pagination ?>

        <script>
        // Product SelectByCondition
        function find_text() {
            form1.action = "/~four12/ledger/lists"
                         + "/text1/" + form1.text1.value
                         + "/text2/" + form1.text2.value
                         + "/text3/" + form1.text3.value
                         + "/page";
            form1.submit();
        }       

        $(function() {
            $('#text1').datetimepicker({
                locale: 'ko',
                format: 'YYYY-MM-DD',
                defaultDate: moment()
            });

            $('#text2').datetimepicker({
                locale: 'ko',
                format: 'YYYY-MM-DD',
                defaultDate: moment()
            });

            $('#text1').on("dp.change", function(e) { find_text(); });
            $('#text2').on("dp.change", function(e) { find_text(); });
        });

        function make_excel() {
            form1.action= "/~four12/ledger/excel"
                         + "/text1/" + form1.text1.value
                         + "/text2/" + form1.text2.value
                         + "/text3/" + form1.text3.value
                         + "/page";
            form1.submit();
        }
        </script>