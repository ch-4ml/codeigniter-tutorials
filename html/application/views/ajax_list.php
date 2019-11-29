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
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        추가
                    </button>
                </div>
            </div>
        </form>
    
        <table class="table table-bordered table-sm mymargin5" id="table_list">
            <tr class="mycolor2">
                <td class="align-middle" width="10%">번호</td>			
                <td class="align-middle" width="20%">이름</td>
                <td class="align-middle" width="1%">삭제</td>
            </tr>
            <?
                foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
                {
                    $no=$row->no12;                                 // 사용자번호
            ?>
            <tr id="rowno<?=$no?>">
                <td class="align-middle"><?= $no; ?></td>
                <td class="align-middle"><a href="/~four12/ajax/view/no/<?=$no;?><?=$tmp;?>"><?=$row->name12; ?></a></td>
                <td class="align-middle"><a href="#" class="btn btn-sm mycolor1" onClick="javascript:confirm('삭제할까요?');" id="ajax_del" rowno="<?=$no?>">삭제</a></td>
            </tr>
            <?
                }
            ?>
        
        </table>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="d-flex flex-row-reverse">
                    <div class="col-6 p-2">            
                        <div class="input-group">
                            <input class="form-control form-control-sm" type="text" id="name">&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-primary" id="ajax_add">저장</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    
        <?= $pagination ?>

        <script>
        // category SelectByCondition
        function find_text() {
            if(!form1.text1.value) form1.action = "/~four12/category/lists";
            else form1.action = "/~four12/category/lists/text1/" + form1.text1.value;
            form1.submit();
        }

        $(function() {
            $("#ajax_add").click(function() {
                var name = $("#name").val();
                $.ajax({
                    url: "/~four12/ajax/ajax_insert",
                    type: "POST",
                    data: {
                        "name": name
                    },
                    dataType: "html",
                    complete: function(xhr, textStatus) {
                        var no = xhr.responseText;
                        $("#table_list").append(
                            "<tr id='rowno" + no + "'>" +
                            "<td class='align-middle'>" + no + "</td>" +
                            "<td class='align-middle'><a href='/~four12/ajax/view/no/" + no + "<?= $tmp ?>'>" + name + "</a></td>" + 
                            "<td class='align-middle'><a href='#' class='btn btn-sm mycolor1' onClick='javascript:confirm(\"삭제할까요?\");' id='ajax_del' rowno='" + no + "'>삭제</a></td>" +
                            "</tr>"
                        );
                        $("#name").val('');
                    }
                });
            });
        });

        $(function() {
            $("#table_list").on("click", "#ajax_del", function() {
                $.ajax({
                    url: "/~four12/ajax/ajax_delete",
                    type: "POST",
                    data: {
                        "no": $(this).attr("rowno")
                    },
                    dataType: "text",
                    complete: function(xhr, textStatus) {
                        var no = xhr.responseText;
                        $("#rowno" + no).remove();
                    }
                });
            });
        });
        </script>