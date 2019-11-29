<br>   
        <div class="alert mycolor1" role="alert">월별 제품별 매출현황</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-2" align="left" style="display: inline;">            
                    <div class="input-group input-group-sm table-sm date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">날짜</span>
                        </div>
                        <input type="text" id="text1" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
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
                <td width="40%">제품명</td>
                <td width="5%">1월</td>
                <td width="5%">2월</td>
                <td width="5%">3월</td>
                <td width="5%">4월</td>
                <td width="5%">5월</td>
                <td width="5%">6월</td>
                <td width="5%">7월</td>
                <td width="5%">8월</td>
                <td width="5%">9월</td>
                <td width="5%">10월</td>
                <td width="5%">11월</td>
                <td width="5%">12월</td>
            </tr>
            <?
                foreach ($list as $row)                                  // 연관배열 list를 row를 통해 출력한다.
                {
            ?>
            <tr>
                <td align="left" class="mycolor3"><?=$row->product_name?></td>
                <td align="right"><?= number_format($row->s1) ?></td>
                <td align="right"><?= number_format($row->s2) ?></td>
                <td align="right"><?= number_format($row->s3) ?></td>
                <td align="right"><?= number_format($row->s4) ?></td>
                <td align="right"><?= number_format($row->s5) ?></td>
                <td align="right"><?= number_format($row->s6) ?></td>
                <td align="right"><?= number_format($row->s7) ?></td>
                <td align="right"><?= number_format($row->s8) ?></td>
                <td align="right"><?= number_format($row->s9) ?></td>
                <td align="right"><?= number_format($row->s10) ?></td>
                <td align="right"><?= number_format($row->s11) ?></td>
                <td align="right"><?= number_format($row->s12) ?></td>
            </tr>
            <?
                }
            ?>
        
        </tbody></table>
    
        <?= $pagination ?>

        <script>
        // Product SelectByCondition
        $(function() {
            $('#text1').datetimepicker({
                locale: 'ko',
                format: 'YYYY',
                viewMode: 'years',
                defaultDate: moment()
            });

            $('#text1').on("dp.change", function(e) { find_text(); });
        });
        </script>