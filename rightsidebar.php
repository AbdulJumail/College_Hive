<?php
$admin = new Admin();

$lid = $_SESSION['lid'];
?>

<div class="fixed-sidebar right">
    <div class="chat-friendz">
        <ul class="chat-users">

            <?php
            $stmt = $admin->ret("SELECT DISTINCT `to_id` FROM `chat` WHERE `from_id`='$lid'");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $flid = $row['to_id'];

                $stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$flid'");
                while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a href="chatpage.php?flid=<?php echo $row2['l_id'] ?>">
                        <li style="margin-bottom: 20px;">
                            <div class="author-thmb" style="width: 50px;">

                                <img src="controller/<?php echo $row2['img'] ?>" alt="" style="height:50px;object-fit:cover;border-radius:100px">
                                <span class=""></span>
                            </div>

                        </li>
                    </a>
            <?php }
            } ?>


        </ul>













    </div>
</div>