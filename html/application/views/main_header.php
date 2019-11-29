<html lang="kr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>판매관리</title>
        <link href="/~four12/my/css/bootstrap.min.css" rel="stylesheet">
        <link href="/~four12/my/css/my.css" rel="stylesheet">
        <script src="/~four12/my/js/jquery-3.3.1.min.js"></script>
        <script src="/~four12/my/js/popper.min.js"></script>
        <script src="/~four12/my/js/bootstrap.min.js"></script>
        <script src="/~four12/my/js/moment-with-locales.min.js"></script>
        <script src="/~four12/my/js/bootstrap-datetimepicker.js"></script>
        <link href="/~four12/my/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="/~four12/my/css/fontawesome-all.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">	<!-- container:고정된 가로 폭 / container-fluid:화면 전체 가로 폭 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/~four12/">판매관리</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto"> <!-- mr-auto: 양쪽 정렬 -->
                    <li class="nav-item">
                        <a class="nav-link" href="/~four12/p_ledger">매입</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/~four12/s_ledger">매출</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/~four12/ledger">기간조회</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/~four12/best" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                             통계
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/~four12/best">BEST제품</a>
                            <a class="dropdown-item" href="/~four12/monthly">월별제품별현황</a>
                            <a class="dropdown-item" href="/~four12/chart">종류별분포도</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                             기초정보
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/~four12/category">구분</a>
                            <a class="dropdown-item" href="/~four12/ajax">구분 Ajax</a>
                            <a class="dropdown-item" href="/~four12/product">제품</a>
                            <a class="dropdown-item" href="/~four12/gallery">제품사진</a>
                            <?
                                if ($this->session->userdata('rank') == 1) echo("<div class='dropdown-divider'></div><a class='dropdown-item' href='/~four12/member'>사용자</a>");
                            ?>
                        </div>
                    </li>
                </ul>
    
        <?
            if (!$this->session->userdata('uid'))
                echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-sm btn-outline-secondary btn-dark'>로그인</a>");
            else
                echo("<a href='/~four12/login/logout' class='btn btn-sm btn-outline-secondary btn-dark'>로그아웃</a>");
        ?>
            </div>
        </nav>

        <!-- Modal Login -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="form2" id="form2" method="POST" action="/~four12/login/check">
                            <div class="form-group">
                                <label for="uid" class="col-form-label">ID: </label>
                                <input type="text" class="form-control" id="uid" name="uid">
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="col-form-label">PW: </label>
                                <input type="text" class="form-control" id="pwd" name="pwd">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submit();">Login</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2500">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/my/img/main1.jpg" height="150" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/my/img/main2.jpg" height="150" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/my/img/main3.jpg" height="150" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"> </span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <script>
        function submit() {
            $('#form2').submit();
        }
        </script>