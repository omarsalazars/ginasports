<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis:200,300|Open+Sans|Raleway" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/chatStyle.css">
        <script type="text/javascript"> 
            var user = 
            <?php
                if(isset($_GET['user']))
                    echo "'".$_GET['user']."'";
                else
                    echo "'".$_SESSION['user']."'";
            ?>;
            var sender = <?php echo "'".$sender."'"?>;
            var receiver = <?php echo "'".$receiver."'"?>;
            var isAdmin = <?php echo $_SESSION['admin']?'true':'false'?>;
            if(isAdmin) user="";
	    </script>
	    <script type="text/javascript" src="js/ajaxChat.js"></script>
    </head>
    <body>
        <div class="row" id="container">

        </div>
    </body>
</html>