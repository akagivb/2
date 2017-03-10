<?php
include('session.php');
$results_per_page = 5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
$sbooks = "SELECT *,DATE_FORMAT(publishdate,'%d %b %Y') as pdate FROM books ORDER BY createdon desc LIMIT $start_from, $results_per_page";
$rs_result = $mysqli->query($sbooks);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./scripts/books.css" />
    <script type="text/javascript">
        window.onload = function () {

            document.getElementById("main").onclick = function () {
                window.location.href = "main.php";
            };

            document.getElementById("logout").onclick = function () {
                window.location.href = "logout.php";
            };
        };
    </script>
</head>
<body>
    <div id="div03">
        <button id="main" type="button" name="main"><img src="./img/addbook.png" /></button>

        <button type="button" id="logout" name="LogOut"><img src="./img/logout.png" /></button>

        <table id="t03" border="1" cellpadding="4">
            <tr id="head">
                <td>
                    Cover
                </td>
                <td>
                    ISBN
                </td>
                <td>
                    Title
                </td>
                <td>
                    Author
                </td>
                <td>
                    Publish Date
                </td>
                <td>
                    Page Count
                </td>
                <td>
                    Format
                </td>
                <td>
                    Resume
                </td>
            </tr>
            <?php
            while($row = $rs_result->fetch_assoc()) {
            ?>
            <tr id="tbl">
                <td>
                    <img src="uploaded/<?php echo $row["cover"]; ?>" height=100 width=100/ />
                </td>
                <td>
                    <?php echo $row["isbn"]; ?>
                </td>
                <td>
                    <?php echo $row["title"]; ?>
                </td>
                <td>
                    <?php echo $row["author"]; ?>
                </td>
                <td>
                    <?php echo $row["pdate"]; ?>
                </td>
                <td>
                    <?php echo $row["pages"]; ?>
                </td>
                <td>
                    <?php echo $row["formats"]; ?>
                </td>
                <td>
                    <?php echo $row["resume"]; ?>
                </td>

            </tr>
            <?php
            };
            ?>
        </table>
        <?php
        $count = "SELECT COUNT(*) AS total FROM books";
        $result = $mysqli->query($count);
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $results_per_page);
        for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='books.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> ";
        };
        ?>
    </div>
</body>
</html>

