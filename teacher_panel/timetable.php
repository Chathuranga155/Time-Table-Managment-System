
<?php include("../assets/noSessionRedirect.php"); ?>
<?php include("./verifyRoleRedirect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="../images/1.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>School Management</title>
    <link rel="icon" type="image/x-icon" href="images/1.png">

   


</head>

<body>

    <div class='toast-container position-fixed text-success bottom-0 end-0 p-3'>
        <div id='liveToast' class='toast' role='alert' aria-live='assertive' aria-atomic='true' style="color:black;">
            <div class='d-flex'>
                <div class='toast-body' id="toast-alert-message">

                </div>
                <button type='button' class='btn-close me-2 m-auto text-danger' data-bs-dismiss='toast'
                    aria-label='Close'></button>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    <?php include('partials/_sidebar.php') ?>
    <input type="hidden" value="5" id="checkFileName">
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <?php include("partials/_navbar.php"); ?>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Time Table</h1>
                </div>
            </div>

            <!-- Body -->
            <div class="bottom-data">

                <div class="orders">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="container">
                                <br>

                                <div class="attendenceTable" style="display: block;">
                                    <div class="header">
                                        <i class='bx bx-receipt'></i>
                                        <h3>Time Table</h3>
                                        <!-- <i class='bx bx-filter'></i>
                                        <i class='bx bx-search'></i> -->
                                    </div>
                                    <hr>

                                    <!--find time table-->
                                    <br>
                                    <div class="container timetable-form">
                                        <div class="container" style="display: flex;">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <label for="inputPassword6"
                                                        class="col-form-label">&nbsp;&nbsp;Class&nbsp;&nbsp; </label>
                                                </div>
                                                <div class="col-auto">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="search-class">
                                                        <!-- <option selected>12</option>
                                                        <option>11</option>
                                                        <option>10</option>
                                                        <option>9</option>
                                                        <option>8</option>
                                                        <option>7</option>
                                                        <option>6</option>
                                                        <option>5</option>
                                                        <option>4</option>
                                                        <option>3</option>
                                                        <option>2</option>
                                                        <option>1</option>
                                                        <option>pg</option>
                                                        <option>lkg</option>
                                                        <option>ukg</option> -->
                                                        <?php include('partials/select_classes.php') ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="container" style="display: flex;">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <label for="inputPassword6" class="col-form-label">Section </label>
                                                </div>
                                                <div class="col-auto">
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="search-section">
                                                        <option selected>A</option>
                                                        <option>B</option>
                                                        <option>C</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <br>


                                        <div class="container">

                                            <button class="find" id="findTimeTableBtn" style="border:none;">
                                                <i class='bx bx-search-alt'></i>
                                                <span>Find</span>
                                            </button>
                                        </div>
                                    </div>


                                    <!-- end of find time table-->
                                    <br>
                                    <hr><br>
                                    <!-- Time table -->
                                    <div class="container pt-3 time-table-container"
                                        style="display: flex; flex-direction:column; justify-content:center;align-item:center;">
                                        <div class="timeTableHeading">
                                            <div class="heading">
                                                <h3 id="timeTableClassSection"></h3>
                                            </div>


                                        </div>
                                    </div>

                                  

                                    <iframe src="./c.php" frameborder="0" width="100%" height="500px" id="myIframe"></iframe>


                                    




                                    
                                    </div>
                                    <hr>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>

                <!-- end of body -->

        </main>

    </div>




    <script src="../assets/js/timetable.js"></script>
    <?php include('partials/_footer.php'); ?>