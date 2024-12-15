
<?php
session_start();
include("../includes/connection.php");
include("../functions/function.php");
?>
<?php
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else {
    ?>
    <!DOCTYPE html>
    <html>
<head>
    <title>Welcome Users!</title>
    <link rel="stylesheet" type="text/css" href="styles/home_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">

        <div id ="content_timeline">
            <form action ="livecoments.php?id=<?php echo $user_id; ?>" method="post" id="f">
                <textarea cols="83" rows="4" name="content" placeholder="What's in your mind?"></textarea>
                    <br>
                    <input type="submit" name="sub" value="Post" style="width:100px;">
            </form>
            <?php insertPost(); ?>
            <center><h2>News Feed</h2></center>
            <?php get_posts(); ?>
        </div>

    </div>
</div>

</body>

    <?php
}
?>