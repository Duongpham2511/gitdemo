<?php

require '../config/database.php';
require_once '../models/sanpham.php';
$sanpham_db = new Sanpham_db();
$allsanpham = $sanpham_db->layTatCaSanPham();
?>
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        foreach ($allsanpham as $sanpham) :
        ?>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="./image/<?php echo $sanpham['hinh'] ?>" alt="..."
                    style="width: 100px;" />
                <div class="card-body">
                    <h5 class="card-title"><a
                            href="chitietsanpham.php?id=<?php echo $sanpham['ma'] ?>"><?php echo $sanpham['ten'] ?></a>
                    </h5>
                    <p><?php echo $sanpham['gia'] ?></p>
                    <?php   
                        $description = trim(strip_tags($sanpham['mota']));
                        if (strlen($description) >= 100) {
                            $description = mb_substr($description, 0, mb_strpos($description, ' ', 100));
                        }
                        ?>
                    <p class="card-text"><?php echo $description ?></p>
                </div>
            </div>
        </div>
        <?php
        endforeach
        ?>
    </div>
</div>