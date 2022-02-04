<?php

include 'config.php';
$inserted = false;
$updated = false;
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `inotes` WHERE `inotes`.`id` = $sno";
    $result = $con->query($sql);
    header("location:/clg/assignment/crud/index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['snoEdit'])) {
        $updated = true;
        $id = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descEdit'];

        $sql = "UPDATE inotes SET nTitle = '$title' , nDescription = '$description' where id ='$id'";
        $result = $con->query($sql);
    } else {
        $nTitle = $_POST['title'];
        $nDescription = $_POST['desc'];

        $sql = "INSERT INTO `inotes` (`id`, `nTitle`, `nDescription`, `nTime`) VALUES (null, '$nTitle', '$nDescription', current_timestamp())";

        $result = $con->query($sql);
        if ($result) {
            $inserted = true;
        } else {
            echo "something went to wrong " . mysqli_error($con);
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" class="scc">
    <title>iNotes!</title>
</head>

<body>
    <!-- Edit sModal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/clg/assignment/crud/index.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit" />
                        <div class="form-group">
                            <label for="titleEdit">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="descEdit">Note Description</label>
                            <textarea class="form-control" id="descEdit" name="descEdit" rows="3" placeholder="write description"></textarea>
                        </div>>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">iNotes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if ($inserted) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Your note has been inserted successfully.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
    }
    if ($updated) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Your note has been updated successfully.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
    }
    ?>

    <div class="container my-3">
        <h2>Add a Note to iNote app</h2>
        <form action="/clg/assignment/crud/index.php" method="post">
            <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="desc">Note Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="write description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>

        <div class="container my-3">

            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM inotes";
                    $result = $con->query($sql);
                    $sno = 0;
                    if ($result->num_rows > 0) {
                        while ($rows = $result->fetch_assoc()) {
                            $sno++;
                            echo " <tr>
                            <th scope='row'>" . $sno . "</th>
                            <td>" . $rows['nTitle'] . "</td>
                            <td>" . $rows['nDescription'] . "</td>
                            <td> <button id=" . $rows['id'] . " class='edit btn btn-primary btn-sm'>Edit</button> <button id=d" . $rows['id'] . " class='delete btn btn-danger btn-sm'>Delete</button></td>
                        </tr>";
                        }
                    } else {
                        echo " <tr colspam='4'>
                            <th style='text-align:center;'>No notes available</th>
                        </tr>";
                    }

                    ?>


                </tbody>
            </table>


        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            edits = document.getElementsByClassName('edit');
            Array.from(edits).forEach((element) => {
                element.addEventListener("click", (e) => {

                    tr = e.target.parentNode.parentNode;
                    title = tr.getElementsByTagName("td")[0].innerText;
                    description = tr.getElementsByTagName("td")[1].innerText;
                    snoEdit.value = e.target.id;
                    titleEdit.value = title;
                    descEdit.value = description;
                    $('#editModal').modal('toggle');
                })
            })

            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    sno = e.target.id.substr(1, );
                    if (confirm("Are you sure you want to delete this note..!")) {

                        window.location = `/clg/assignment/crud/index.php?delete=${sno}`;
                    }
                })
            })
        </script>
</body>

</html>