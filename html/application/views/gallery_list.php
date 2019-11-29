<br>   
    <div class="alert mycolor1" role="alert">제품사진</div>
    
        <!-- 검색 -->
        <form name="form1" action="" method="post">
            <div class="row">
                <div class="col-3" align="left">            
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">제품명</span>
                        </div>
                        <input type="text" name="text1" class="form-control" onkeydown="if (event.keyCode == 13) {find_text();}" value="<?=$text1?>">
                        <div class="input-group-append">
                            <button class="btn  btn-primary mycolor1" type="button" onclick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
        <?
            foreach ($list as $row) {
                $image = $row->image12 ? $row->image12 : "";
                $product = $row->name12;
        ?>
            <div class="col-3">
                <div class="mythumb_box">
                    <a href="javascript:zoom('<?= $image ?>', '<?= $product ?>');">
                        <img src="/~four12/product_img/thumb/<?= $image ?>" class="mythumb_image">
                    </a>
                    <div class="mythumb_text"><?= $product ?></div>
                </div>
            </div>
        <? 
            } 
        ?>
        </div>
        <?= $pagination ?>

        <script>
        // Product SelectByCondition
        function find_text() {
            if(!form1.text1.value) form1.action = "/~four12/gallery/lists";
            else form1.action = "/~four12/gallery/lists/text1/" + form1.text1.value;
            form1.submit();
        }

        function zoom(image, product) {
            w = window.open('/~four12/gallery/zoom/image/' + image + '/product/' + product,
                "image view", "resizable=yes, scrollbars=yes, status=no, width=800, height=600");
            w.focus();
        }
        </script>