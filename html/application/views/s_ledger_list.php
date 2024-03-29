<? $tmp = "/text1/$text1/page/$page"; ?>
<br>   
        <div class="alert mycolor1" role="alert">매출장</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-3" align="left">            
                    <div class="input-group input-group-sm table-sm date" id="text1">
                        <div class="input-group-prepend">
                            <span class="input-group-text">날짜</span>
                        </div>
                        <input type="text" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-9" align="right">           
                      <a href="/~four12/s_ledger/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
                </div>
            </div>
        </form>
    
        <table class="table table-bordered table-sm mymargin5">
            <tbody><tr class="mycolor2">
                <td width="5%">번호</td>			
                <td width="15%">날짜</td>
                <td width="30%">제품명</td>
                <td width="10%">단가</td>
                <td width="5%">수량</td>
                <td width="20%">금액</td>
                <td width="15%">비고</td>
            </tr>
            <?
                foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
                {
                    $no = $row->no12;                               // 사용자번호
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row->date12 ?></td>
                <td align="left"><a href="/~four12/s_ledger/view/no/<?=$no?><?=$tmp?>"><?=$row->product_name?></a></td>
                <td align="right"><?= number_format($row->price12) ?></td>
                <td align="right"><?= number_format($row->sq12) ?></td>
                <td align="right"><?= number_format($row->prices12) ?></td>
                <td><?= $row->remarks12 ?></td>
            </tr>
            <?
                }
            ?>
        
        </tbody></table>
    
        <?= $pagination ?>

        <!-- <nav aria-label="page navigation example">
            <ul class="pagination pagination-sm justify-content-center mymargin5">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link active" href="#">2</a></li>
                <li class="page-item"><a class="page-link active" href="#">3</a></li>
                <li class="page-item"><a class="page-link active" href="#">4</a></li>
                <li class="page-item"><a class="page-link active" href="#">5</a></li>				
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">NEXT</span>
                  </a>
                </li>
            </ul>
        </nav> -->

        <script>
        // Product SelectByCondition
        function find_text() {
            form1.action = "/~four12/s_ledger/lists/text1/" + form1.text1.value;
            form1.submit();
        }

        $(function() {
            $('#text1').datetimepicker({
                locale: 'ko',
                format: 'YYYY-MM-DD',
                defaultDate: moment()
            });

            $('#text1').on("dp.change", function(e) {
                find_text();
            });
        });
        </script>