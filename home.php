<!DOCTYPE html>
<?php
session_start();
include("includes/connection.php");
include("functions/function.php");
?>
<?php
if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
else {
    ?>
    <html>
<head>
    <title>Welcome Users!</title>
    <link rel="stylesheet" type="text/css" href="styles/home_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div id="head_wrap">
        <div id="header">
            <ul id="menu">
                <li><a class="fa fa-user" href="profile.php">&nbspProfile</a></li>
                <li><a class="fa fa-home" href="home.php">&nbspHome</a></li>
                <li><a class="fa fa-group" href="members.php">&nbsp;Find People</a></li>
                <li><a class="fa fa-envelope" href="my_messages.php?inbox">&nbsp;Inbox</a></li>
                <li><a class="fa fa-paper-plane" href="my_messages.php?sent">&nbsp;Sent Messages</a></li>
                <li><a class="fa fa-envelope" href="request.php">&nbsp;See Requests</a></li>
                <li><a class="fa fa-envelope" href="live_share.php">&nbsp;live Share</a></li>
            </ul>
            <form method="post" action="results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search">
                <input type="submit" name="search" value="Search">
            </form>
        </div>
    </div>
    <div class="content">
        <div id="user_timeline">
            <div id="user_details">
                <?php
                $user = $_SESSION['user_email'];
                $get_user = "select * from  users where user_email='$user'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $describe_user = $row['describe_user'];
                $user_image = $row['user_image'];

                $user_posts = "select * from posts where user_id ='$user_id'";
                $run_posts =mysqli_query($con,$user_posts);
                $posts =mysqli_num_rows($run_posts);

                $sel_msg = "select * from messages where receiver ='$user_id' AND status='unread' ORDER by 1 DESC";
                $run_msg = mysqli_query($con,$sel_msg);
                $count_msg =mysqli_num_rows($run_msg);
                echo "
                    <center>
                    <img src='users/$user_image' width='200px' height='200px'/>
                    </center> 
                    <div id ='user_mention'>
                    <p><center><h2>$user_name</h2></center>
                    <center><strong>$describe_user</strong></center></p>
                    <p class='fa fa-group'>&nbsp;<a href ='my_messages.php?inbox&u_id=$user_id'>Messages($count_msg)</a></p>
                    <p class='fa fa-user-o'>&nbsp;<a href='my_post.php?u_id=$user_id'>My Posts ($posts)</a> </p>
                    <p class='fa fa-paint-brush'>&nbsp;<a href ='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>
                    <p class='fa fa-mouse-pointer'>&nbsp;<a href='logout.php'>Logout</a> </p>
                    </div>
                    ";

                ?>
            </div>
        </div>
        <div id ="content_timeline">
            <form action ="home.php?id=<?php echo $user_id; ?>" method="post" id="f">
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