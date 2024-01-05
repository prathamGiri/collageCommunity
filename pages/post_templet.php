

                            <?php
while ($row2 = mysqli_fetch_assoc($res2)) {
                        echo '<div class="ind_post post-id" id="'; echo $row2['post_id']; echo '">';
                                $circle_id = $row2['circleId'];
                                $circle_sql = "SELECT circleId, circleName, circleLogo 
                                                FROM staticcircleinfo
                                                WHERE circleId = $circle_id";
                                $circle_res = mysqli_query($conn, $circle_sql);
                                $circle_row = mysqli_fetch_assoc($circle_res);
                        echo '<div class="head_post" id="'; echo $circle_row['circleId']; echo '">
                                <img src="/collageCommunity/images/profile_img/'; echo $circle_row['circleLogo']; echo '">
                                <span>'; echo $circle_row['circleName']; echo '</span>
                            </div>
                            <hr>
                            <h3>'; echo $row2['title']; echo '</h3>
                            <p>'; echo $row2['content']; echo '</p>';
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
                                        echo '<div class = "post-image">
                                            <img src="/collageCommunity/images/post_images/'.$row5['imageName'].'" alt="image">
                                        </div>';
                                        }
                                    } echo '</div>';
                            } ?>

