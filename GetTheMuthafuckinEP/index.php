<!DOCTYPE html>
<html>
<head>

    <!--font-->
    <link href='http://fonts.googleapis.com/css?family=Stardos+Stencil:400,700' rel='stylesheet' type='text/css'>

    <!--jQuery-->
    <script src="../ExternalFrameworks/jquery/jquery-2.0.1.min.js"></script>

    <!--define viewport for responsiveness-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!--bootstrap-->
    <link rel="stylesheet" href="../ExternalFrameworks/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../ExternalFrameworks/bootstrap/css/bootstrap-responsive.css">
    <script src="../ExternalFrameworks/bootstrap/js/bootstrap.js"></script>

    <!--user css-->
    <link rel="stylesheet" href="../StallionMain.css">

    <!--submit script-->
    <script type="text/javascript">

        function submitForm()
        {
            document.myForm.submit();
        }

        function resizeHandler()
        {
            var borderDivArray = $(".borders");
            var screenWidth = $(window).width();

            for (var i = 0; i < borderDivArray.size(); i++)
            {
                if (screenWidth > 767)
                {
                    $(borderDivArray[i]).height(screenWidth / 105);
                }
                else
                {
                    $(borderDivArray[i]).height(0);
                }
            }
        }

        $(document).ready(resizeHandler);
        $(window).resize(resizeHandler);

    </script>

</head>
<body>

<div class="container-fluid">

    <!--upper column-->
    <div class="row-fluid">
        <div class="borders" style="background-color: white"/>
    </div>
    <div class="row-fluid">
        <div class="borders" style="background-color: white"/>
    </div>
    <div class="row-fluid">
        <div class="borders" style="background-color: rgb(255,0,25)"/>
    </div>

    <!--content column-->
    <div class="row-fluid" style="overflow: hidden">

        <!--download span, hidden on mobile-->
        <div class="span4 col hidden-phone">

            <div style="padding-top: 50%">

                <h2 align="center"><a href="javascript: submitForm()"><u>Download</u></a> it, eh?!</h2>

            </div>
        </div>

        <!--image span-->
        <div class="span4 col">
            <div style="padding: 7%">

                <a href="javascript: submitForm()"><img src="img/pic_600x694.jpg"></a>

                <!--label for mobile layout-->
                <h2 class="visible-phone" align="center"><a href="javascript: submitForm()"><u>Download</u></a> it, eh?!
                </h2>

            </div>
        </div>

        <!--counter span, hidden on mobile-->
        <div class="span4 col hidden-phone">

            <div style="padding-top: 50%">

                <h2 align="center">Total Downloads: <?php include 'fileIO.php'; echo readFromFile()?></h2>

            </div>
        </div>
    </div>

    <!--lower column-->
    <div class="row-fluid">
        <div class="borders" style="background-color: rgb(255,0,25)"/>
    </div>

    <form name="myForm" method="POST" action="script.php">
        <input type="hidden" name="nw_update" value=""/>
    </form>

</div>

</body>
</html>