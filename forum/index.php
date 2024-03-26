<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <style>
        #ques{
            min-height: 340px;
        }
     </style>
</head>

<body>
    <?php include "partials/_header.php"; ?>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_coursel.php"; ?>

    <div class="container my-3" id="ques">
        <h2 class="text-center">iForum - Categories</h2>
        <div class="row">
            <!-- Fetch all the records using loops -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                $id = $row['category_id'];
                echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="img/card1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadslist.php?catid=' . $id . '">' . $cat . '</a></h5>
                        <p class="card-text">' . substr($desc, 0, 90) . '...' . '</p>
                        <a href="threadslist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php include "partials/_footer.php"; ?>
</body>

</html>