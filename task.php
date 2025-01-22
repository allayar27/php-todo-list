<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="main rounded-4 p-5">
        <header class="todoHeader">
            <h1 class="title display-1">to<span id="title1">do.</span></h1>
            <div class="profile">
                <h6>
                    UserName
                </h6>
                <img src="/public/images/profile.png" width="45">
            </div>
        </header>

        <div class="container1">

            <!-- ___________section 1______  -->
            <div class="part1 mx-1 rounded-4">

                <!-- _________________Filters part____________________  -->
                <div>
                    <h4 class="title2 mb-3">Filters</h4>
                    <ul class="list1 fw-semibold">
                        <li class="mb-2 list_item rounded ">
                            <a href="/todo/tasks"><i class="bi bi-inboxes"></i> All</a>
                        </li>
                    </ul>
                </div>
                <!-- _________________End of Filters____________________  -->
            </div>
            <!-- ___________End of section 1______  -->

            <!-- ___________section 2______  -->
            
            <!-- ___________End of section 2______  -->
            <div>
            <h4 class="title2 mb-3">Tasks</h4>
            <form name="taskList">
                <ul class="taskList">
                            
                                <li>
                                    <a href="./task/">
                                        <input type="checkbox" name="check" id="check" value="">
                                        <div>
                                            <label for="check">
                                                
                                            </label>
                                            <p>
                                              
                                            </p>
            
                                            <div class="--date">
                                                <i class="bi bi-calendar-check"></i>
                          
                                            </div>
                                        </div>
                                    </a>
                                </li>

            
                    </ul>
                </form>
            </div>

        </div>

    </div>

    <script src="/public/js/script.js"></script>

</body>

</html>