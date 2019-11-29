<? $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
<br>   
        <div class="alert mycolor1" role="alert">구분</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-3" align="left">            
                    <div class="input-group  input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">구분명</span>
                        </div>
                        <input type="text" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
                        <div class="input-group-append">
                            <button class="btn  btn-primary mycolor1" type="button" onclick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
    
                <div class="col-9" align="right">           
                      <a href="/~four12/category/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
                </div>
            </div>
        </form>
    
        <table class="table table-bordered table-sm mymargin5" id="table_list">
            <tbody><tr class="mycolor2">
                <td width="10%">번호</td>			
                <td width="20%">이름</td>
            </tr>
            <?
                foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
                {
                    $no=$row->no12;                                    // 사용자번호
            ?>
                <tr>
                <td><?= $no; ?></td>
                <td><a href="/~four12/category/view/no/<?=$no;?><?=$tmp;?>"><?=$row->name12; ?></a></td>
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
        // category SelectByCondition
        function find_text() {
            if(!form1.text1.value) form1.action = "/~four12/category/lists";
            else form1.action = "/~four12/category/lists/text1/" + form1.text1.value;
            form1.submit();
        }
        </script>