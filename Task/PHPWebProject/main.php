<?php
include('session.php');
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./scripts/style.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {

            document.getElementById("allbooks").onclick = function () {
                window.location.href = "books.php";
            };

            document.getElementById("logout").onclick = function () {
                window.location.href = "logout.php";
            };

        };

          $(document).ready(function(){
            $("#form01").submit(function() {
        var title = $("#title").val();
        var author = $("#author").val();
        var format = $("#format").val();
        var pdate = $("#pdate").val();
        var pspan = parseInt($("#pspan").val(), 10);
        var isbn = parseInt($("#isbn").val(),10);
        var resume = $("#resume").val();
        var pic = $('input[type=file]').val().split('\\').pop();
                
        if (title === null || title === "") {
            alert("Please enter a title.");
            return;
        }
        if (title.length > 100) {
            alert("Title name is too long.");
            return;
        }
        if (author === null || author === "") {
            alert("Please enter an author.");
            return;
        }
        if (author.length > 100) {
            alert("Author name is too long.");
            return;
        }
        if (format === null || format === "") {
            alert("Please select a format.");
            return;
        }
        if (pdate === null || pdate === "") {
            alert("Please select a publish date.");
            return;
        }
        if (pspan === null || pspan === "" | isNaN(pspan) || pspan<1) {
            alert("Please enter correct number of pages.");
            return;
        }
        if (isbn === null || isbn === "" || isNaN(isbn)) {
            alert("Please enter an ISBN.");
            return;
        }
        if (!(isbn.toString().length === 13 || isbn.toString().length === 10)) {
            alert("ISBN must be 10 or 13 digits.");
            return;
        }
        
        if (resume === null || resume === "") {
            alert("Please enter a resume.");
            return;
        }
        if (resume.length > 1000 ) {
            alert("Resume is too long.");
            return;
        }
        if (pic === null || pic === "") {
            alert("Please upload a cover.");
            return;
        }
        
        var isOk = true;

     $.ajax({
            url: 'isbn.php',
            type: 'POST',
            data: "isbn=" + isbn,
            async: false,
            success: function (data) {
                if (data >0) {
                    isOk = false;
                    alert("A book with this ISBN already exists.");
                }
            }
     });
     if (!isOk) {
         return;
     }

     var formData = new FormData($(this)[0]);

     $.ajax({
         url: 'upload.php',
                        type: 'POST',
                        data: formData,
                        async: false,
                        success: function (data) {
                            if (data !== "Cover uploaded.") {
                                isOk = false;
                                alert(data);
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });

          if (!isOk) {
                        return;
                    }
        
        $.ajax({
            async: false,
            type: "POST",
            url: "insert.php",
            data: "isbn=" + isbn + "&title=" + title + "&author=" + author + "&pdate=" + pdate + "&pspan=" + pspan + "&format=" + format + "&resume=" + resume + "&pic=" + pic,
            success: function (data) {
                alert("Book added.");
            }
        });
            });

    });
    </script>
</head>
<body>
    <div id="inner">
        <form id="form01">
            <table id="t01">
                <tr>
                    <td>
                        <img src="./img/logo.png" />
                    </td>
                    <td>
                        <button id="allbooks" type="button" name="allbooks" ><img src="./img/books.png"/></button>
                    </td>
                    <td>
                        <button type="button"  id="logout" name="LogOut"><img src="./img/logout.png" /></button>

                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="title" type="text" name="title" placeholder="Book Title"  maxlength="100"/>
                    </td>
                    <td>
                        <input id="pdate" class="textbox-n" type="text" onfocus="(this.type='date')" name="pdate" placeholder="Publish Date"  />
                    </td>
                </tr>
                <tr class="spu">
                    <td>
                        <input id="author" type="text" name="author" placeholder="Author"  maxlength="100"/>
                    </td>
                    <td>                        
                        <select id="format" name="format">
                            <option disabled selected value=""> Select Format </option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                            <option value="A5">A6</option>
                            <option value="B4">B4</option>
                            <option value="B5">B5</option>
                            <option value="B6">B6</option>
                            <option value="C4">C4</option>
                            <option value="C5">C5</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input id="pspan" type="number" name="pspan" placeholder="Page Span"  />
                    </td>
                    <td>
                        <input id="isbn" type="number" name="isbn" placeholder="ISBN"  />
                    </td>
                </tr>

                <tr class="spu">
                    <td>
                        <input id="resume" type="text" name="Resume" placeholder="Resume"  maxlength="1000"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="./img/upload.png"/> <input type="file" name="pic"  id="pic"/>
                    </td>
                    <td>
                        <button type="submit" id="sub01" name="Submit" ><img src="./img/submit.png"/></button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>