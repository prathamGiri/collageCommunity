<?php
while ($row2 = mysqli_fetch_assoc($res2)) {
                ?>
                        <div class="ind_post post-id" id="<?php echo $row2['post_id']; ?>">
                            <div class="head_post">
                                <img src="/collageCommunity/images/logo.png" alt="">
                                <span>Titel of the circle</span>
                            </div>
                            <hr>
                            <h3><?php echo $row2['title']; ?></h3>
                            <p><?php echo $row2['content']; ?></p>
                            <?php
                                $post_id = $row2['post_id'];
                                $sql5 ="SELECT ir.post_id,
                                                ir.image_Id,
                                                i.imageName
                                        FROM image_rel AS ir
                                        JOIN images AS i
                                        ON ir.image_Id = i.imageId
                                        WHERE ir.post_id =  '$post_id'";
                                $res5 = mysqli_query($conn, $sql5);
                                if (mysqli_num_rows($res5) > 0) {
                                    while ($row5 = mysqli_fetch_assoc($res5)) {
                            ?>
                                        <div class = "post-image">
                                            <img src="/collageCommunity/images/post_images/<?php echo $row5['imageName']; ?>" alt="image">
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                <?php } ?>