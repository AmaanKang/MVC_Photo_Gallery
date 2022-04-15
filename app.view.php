<!DOCTYPE html>
<?php
include 'app.ctrl.php'
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <style>

        </style>
    </head>
    <body>
    <div class="container">
        <a href="app.view.php" class="text-decoration-none"><h1 class="text-center text-primary">My Photo Galleries</h1></a>
        <div class="row border border-5 p-5 my-5 bg-dark text-white">
            <?php
            if ($_REQUEST['act'] == 'allphotos'){
                ?>
                <h2><?=$desc?></h2>
                <p>Click on a photo to start a slide show!</p>
                <?php
                foreach ($photos as $photo => $photo_pic){
                    ?>
                    <div class="card">
                        <div><a href='app.view.php?act=onephoto&dir=<?=$dir?>&id=<?=$photo?>'><img class="card-img-top img-fluid" src="photos/d<?=$dir?>/<?=$photo_pic?>"></a></div>
                    </div>
                    <?php
                }
            }
            elseif ($_REQUEST['act'] == 'onephoto'){
                $id = $_REQUEST['id'];
                if($id == 0){
                    $previd = 0;
                }else{
                    $previd = $id-1;
                }
                if($id == (count($photoData[$dir+1]["photos"])) - 1){
                    $nextid = (count($photoData[$dir+1]["photos"])) - 1;
                }else{
                    $nextid = $id+1;
                }
                ?>
                <div class="col-md-1">
                    <a href='app.view.php?act=onephoto&dir=<?=$dir?>&id=<?=$previd?>' class="btn btn-info">Prev</a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <a href='app.view.php?act=onephoto&dir=<?=$dir?>&id=<?=$nextid?>' class="btn btn-info">Next</a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <a href='app.view.php?act=allphotos&dir=<?=$dir?>' class="btn btn-info">Show all photos</a>
                </div>
                <div><h3><?=$id+1?>/<?=count($photoData[$dir+1]["photos"])?></h3></div>
                <img class="onephoto img-fluid" src="photos/d<?=$dir?>/<?=$photo?>">
                <?php
            }
            else{
                $gal = 1;
                foreach ($photoData as $data){
                ?>
                    <div class="card">
                        <a href='app.view.php?act=allphotos&dir=<?=$gal?>'><img class="card-img-top img-fluid" src="photos/<?=$data["directory"]?>/thumbs/<?=$data["photos"][count($data["photos"])-1]?>"></a>
                        <div class="card-body">
                            <p class="card-title text-info">
                                <?=$data["description"]?>
                            </p>
                        </div>
                    </div>
                <?php
                    $gal++;
                }
            }
            
            ?>
        </div>
    </div>
    </body>
</html>