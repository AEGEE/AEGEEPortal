<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AEGEE PORTAL</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-eq-height.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background:url('images/background.png');">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <style>
    @font-face{
        font-family: "Bebas Neue";
        src: url('fonts/Bebas Neue.ttf'),
        url('Thonburi-Bold.eot'); /* IE */
    }

    a:hover {
        text-decoration: none;
    }
    .panel:hover {
        background: #F5F5F5;
    }

    h1, h2, h3, h4, h5 {
        font-family: "Bebas Neue", "sans serif";
    }

    h4 {
        font-size: 25px;
    }
    h1 {
        font-size: 40px;
    }
    </style>

<div class="container-fluid">


<!-- HEADER -->
<div class='row'>
    <div class='col-md-12'>
        <div style='text-align:center;'>
        </div>
    </div>
</div>

<?php
    include "portal_data.php";
    $categories = array_keys($portal_data);
    //var_dump($categories);
    foreach ($categories as $category) {
        $format = "<div class='row row-eq-height'>
            <div class='col-md-0'></div>
            <div class='col-md-12'>
            <!-- <h1><span class='label label-danger'>%s</span></h1> -->
            <br>
            <div class='row'>";
        printf($format, $category, $category);

        $items = $portal_data[$category];
        $clearfix = 0;
        foreach ($items as $item) {
            //var_dump($item);
            $format = "<div class='col-md-3'>
                <a href=%s style=''>
                <div class='panel panel-primary' style='border-color:%s;'>
                    <div class='panel-heading' style='border-color:%s;background-color:%s;'><h4>%s</h4></div>
                    <div class='panel-body'>
                        <div class='row row-eq-height'>
                            <div class='col-xs-3'>
                                <img src='images/%s' alt='%s' class = 'img-responsive'>
                            </div>
                            <div class='col-xs-9' style='text-align:center;'>
                                %s
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>";
            printf($format, $item['url'], $item['color'], $item['color'], $item['color'], $item['title'], $item['img'], $item['title'], $item['description']);
            $clearfix++;
            if ($clearfix == 4) {
                printf("<div class='clearfix'></div>");
                $clearfix = 0;

                $format = "</div>
                    </div>
                    <div class='col-md-0'></div>
                    </div>

                    <div class='row'>
                    <div class='col-md-0'></div>
                    <div class='col-md-12'>
                    <div class='row'>";
                printf($format, $category, $category);
            }
        }

        $format = "</div>
        </div>
        <div class='col-md-0'></div>
    </div>";
        printf($format);
    }
    ?>

<?php require 'aegee_footer.php'; ?>
</body>
</html>
