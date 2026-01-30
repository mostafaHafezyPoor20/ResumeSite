<?php
$id=$_GET['id'];
require_once ("app/Config/connDB.php");
$getBlog=$conn->query("SELECT * FROM `blog` WHERE `id`='$id'")->fetch_row();
$getCountViewBlog=$getBlog[6]+1;
$conn->query("UPDATE `blog` SET `view`='$getCountViewBlog' WHERE `id`='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $getBlog[2];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f4;
        }

        .blog-card {
            max-width: 850px;
            margin: auto;
            border-radius: 14px;
            overflow: hidden;
        }

        .blog-image {
            width: 100%;
            height: 380px;
            object-fit: cover;
        }

        .blog-title {
            font-weight: bold;
        }

        .blog-date {
            font-size: 14px;
            color: #777;
        }

        .like-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #555;
        }

        .like-btn.liked {
            color: #e1306c;
        }

        .back-btn {
            position: sticky;
            top: 10px;
            z-index: 1000;
        }

        @media (max-width: 576px) {
            .blog-image {
                height: 230px;
            }
        }
    </style>
</head>
<body>

<!-- BACK BUTTON -->
<a href="index.php" class="btn bg-whte">
    <div class="container my-3 back-btn">
        <button  class="btn btn-outline-secondary d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i>
            بازگشت
        </button>
    </div>
</a>


<!-- BLOG CONTENT -->
<div class="container my-4">
    <div class="card blog-card shadow-sm">

        <!-- Blog Image -->
        <img src="<?php echo $getBlog[1]; ?>"
             alt="Blog Image"
             class="blog-image">

        <!-- Content -->
        <div class="card-body">

            <h3 class="blog-title mb-1">
              <?php echo $getBlog[2]; ?>
            </h3>

            <div class="blog-date mb-3">
                <i class="bi bi-calendar-event"></i>
                <?php echo $getBlog[2]; ?>
            </div>

            <p>
               <?php echo  $getBlog[4]; ?>
            </p>

            <!-- LIKE SECTION -->
            <div class="d-flex align-items-center gap-2 mt-4">
                <button id="likeBtn" class="like-btn">
                    <i class="bi bi-heart"></i>
                </button>
                <span id="likeCount">0</span> likes
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- LIKE BUTTON SCRIPT -->
<script>
    const likeBtn = document.getElementById("likeBtn");
    const likeCount = document.getElementById("likeCount");

    let liked = false;
    let count = <?php echo $getBlog[5]; ?>;
    likeCount.textContent=count;
    likeBtn.addEventListener("click", () => {
        liked = !liked;
        likeBtn.classList.toggle("liked");

        likeBtn.innerHTML = liked
            ? '<i class="bi bi-heart-fill"></i>'
            : '<i class="bi bi-heart"></i>';

        count = liked ? count + 1 : count - 1;
        likeCount.textContent = count;
        if (liked){
            const xhttp=new XMLHttpRequest();
            xhttp.open("POST","app/Controllers/API/Site/addLikeBlog.php");
            xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhttp.send("id="+encodeURIComponent(<?php echo $id?>));
            xhttp.onload=function (){

            }
        }else{
            const xhttp=new XMLHttpRequest();
            xhttp.open("POST","app/Controllers/API/Site/disLikeBlog.php");
            xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhttp.send("id="+encodeURIComponent(<?php echo $id?>));
            xhttp.onload=function (){

            }
        }
    });
</script>

</body>
</html>