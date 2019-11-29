<br>   
        <div class="alert mycolor1" role="alert">차트</div>
    
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

        <?
            $str_label = "";
            $str_data  = "";
            foreach ($list as $row) {
                $str_label .= "'$row->category_name', ";
                $str_data  .= $row->count_sq . ',';
            }
        ?>
        <script src="/my/js/Chart.js"></script>
        <script src="/my/js/utils.js"></script>

        <br><br>

        <style>
            canvas {
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
            }
        </style>

        <div id="canvas-holder" style="width: 60%">
            <canvas id="chart-area"></canvas>
        </div>

        <script>
        var config = {
            type: "doughnut",
            data: {
                datasets: [{
                    data: [<?=$str_data;?>],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                        window.chartColors.gray,
                        window.chartColors.purple,
                        "rgba(255, 99, 132, 0.7)",
                        "rgba(255, 159, 64, 0.7)",
                        "rgba(255, 205, 86, 0.7)",
                        "rgba(75, 192, 192, 0.7)",
                        "rgba(153, 102, 255, 0.7)",
                        "rgba(201, 203, 207, 0.7)",
                        "rgba(54, 162, 235, 0.7)"
                    ],
                }],
                labels: [<?=$str_label;?>]
            },
            options: {
                responsive: true,
                legend: {
                    position: "top",
                },
                title: {
                    display: false,
                    text: "구분 별 분포도"
                },
                animation: {
                    animateRotate: true
                }
            }
        };
        
        var ctx = $('#chart-area');
        var chart = new Chart(ctx, config);

        // Product SelectByCondition
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