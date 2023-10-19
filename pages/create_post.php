<!-- crate-post             -->

<head>
    <link rel="stylesheet" href="/collageCommunity/css/create_post.css">
    <script src="/collageCommunity/javascript/create_post.js">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</script>
</head>
<body>
    
<?php
                if (isset($_SESSION['login_status'])) {
                    $sql3 = "SELECT * FROM staticcustomerinfo
                                WHERE user_id = '$user_id'";
                    $res3 = mysqli_query($conn, $sql3);
            ?>
            <div class="createpost" id="createpost">
                <?php if (mysqli_num_rows($res3) > 0) { 
                    $row3 = mysqli_fetch_assoc($res3);
                ?>
                <img src="<?php echo '/collageCommunity/images/profile_img/'.$row3['profile_img']?>" alt="profile image">
                
                <button>Create a Post</button>
            </div>

            <div class="postblock" id="postblock">
                <div class="posthead">
                    <h1>Create a Post</h1>
                    <a id="closepostblock"><i class="ri-close-line"></i></a>
                </div>
                <hr>
                <div class="postprofile">
                    <img src="<?php echo '/collageCommunity/images/profile_img/'.$row3['profile_img']?>" alt="profile image">
                    <span><?php echo base64_decode($row3['user_name']) ?></span> 
                </div>
                <?php } ?>
                <!-- <input type="text" placeholder="What do you want to post"> -->
                <!--  action="/collageCommunity/pages/back/save_post.php" "  -->
                <form id="post_form" method="post" enctype="multipart/form-data">

                    <textarea id="freeform" name="freeform" placeholder = "Enter Text Here..."></textarea>
                    <div id = "file-preview-wrapper">
                        <div class = "file-preview" id="filepreview">
                            <img id="uploadPreview">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="medianpost">
                        <div>
                            <label>
                                <i class="ri-image-line"></i>
                                <input type="file" id="image_file" name="image_file" accept="image/*" onchange="PreviewImage();">
                            </label>
                            <label>
                                <i class="ri-video-line"><input type="file" id="video_file" name="video_file"></i>
                            </label>
                            
                        </div>
                        <button type="submit" id="post_submit">Post</button>
                    </div>
                </form>
            </div>
            <?php } ?>
</body>
