<!DOCTYPE html>
<html>
<head>

    <!--font-->
    <link href='http://fonts.googleapis.com/css?family=Stardos+Stencil:400,700' rel='stylesheet' type='text/css'>

    <!--define viewport for responsiveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!--jQuery-->
    <script src="ExternalFrameworks/jquery/jquery-2.0.1.min.js"></script>

    <!--bootstrap-->
    <link rel="stylesheet" href="../ExternalFrameworks/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../ExternalFrameworks/bootstrap/css/bootstrap-responsive.css">
    <script src="../ExternalFrameworks/bootstrap/js/bootstrap.js"></script>

    <!--user css-->
    <link rel="stylesheet" href="index.css">

    <!--submit script-->
    <script type="text/javascript">
        function submitform()
        {
            document.myform.submit();
        }
    </script>

    <!--read file php function-->
    <?php function readFromFile()
    {
        $filename = "counter.dat";

        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        return $contents;
    }?>

</head>
<body>

<div class="container">

    <!--upper column-->
    <div class="row">
        <div style="background-color: rgb(255,0,25); height: 30px">
        </div>
    </div>

    <!--content column-->
    <div class="row" style="overflow: hidden">

        <!--download span-->
        <div class="span4 col">

            <div style="padding-top: 50%">

                <h2><a href="javascript: submitform()"><u>Download</u></a> it, eh?!</h2>

            </div>
        </div>

        <!--image span-->
        <div class="span4 col">
            <div style="padding: 10px">
                <a href="javascript: submitform()"><img src="img/pic_600x694.jpg"></a>
            </div>
        </div>

        <!--counter span-->
        <div class="span4 col">

            <div style="padding-top: 50%">

                <h2>Total Dowloads: <?php echo readFromFile()?></h2>

            </div>
        </div>
    </div>

    <!--lower column-->
    <div class="row">
        <div style="background-color: rgb(255,0,25); height: 30px">
        </div>
    </div>

    <form name="myform" method="POST" action="script.php">
        <input type="hidden" name="nw_update" value=""/>

</div>

</body>
</html>