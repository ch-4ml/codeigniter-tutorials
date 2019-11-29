<br>   
        <div class="alert mycolor1" role="alert">Best 제품</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-4" align="left" style="display: inline;">            
                    <div class="input-group input-group-sm table-sm date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">날짜</span>
                        </div>
                        <input type="text" id="text1" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                            </div>
                        </div> &nbsp; - &nbsp;
                        <input type="text" id="text2" name="text2" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text2?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
        <table class="table table-bordered table-sm mymargin5">
            <tbody><tr class="mycolor2">		
                <td width="60%">제품명</td>
                <td width="20%">총 판매수량</td>
                <td width="20%">판매 횟수</td>
            </tr>
            <?
                foreach ($list as $row)                                  // 연관배열 list를 row를 통해 출력한다.
                {
            ?>
            <tr>
                <td align="left"><?=$row->product_name?></td>
                <td align="right"><?= number_format($row->total_sq) ?></td>
                <td align="right"><?= number_format($row->count_sq) ?></td>
            </tr>
            <?
                }
            ?>
        
        </tbody></table>
    
        <?= $pagination ?>

        <script>
        function find_text() {
            form1.action = "/~four12/best/lists"
                         + "/text1/" + form1.text1.value
                         + "/text2/" + form1.text2.value
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
        </script>