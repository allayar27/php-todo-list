<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@8.0.0/themes/reset-min.css"
        integrity="sha256-2AeJLzExpZvqLUxMfcs+4DWcMwNfpnjUeAAvEtPr0wU=" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div id="todo-form" style="float: right">
                            <div class="input-group mb-3">
                                <a href="/tasks/create" class="btn btn-primary" type="submit">
                                    Add Task
                                </a>
                            </div>
                        </div>
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" width="2%">#</th>
                                        <th scope="col" width="7%">title</th>
                                        <th scope="col" width="7%">date</th>
                                        <th scope="col" width="3%">status</th>
                                        <th scope="col" width="1%" colspan="3">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tasks as $task): ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $task['id'] ?>
                                            </th>
                                            <td>
                                                <?= $task['title'] ?>
                                            </td>
                                            <td>
                                                <?php $date = new DateTime($task['created_at']);
                                                echo $date->format('d/m/Y'); ?>
                                            </td>
                                            <td>
                                                <?php if ($task['status'] === 'completed'): ?>
                                                    <div class="badge bg-success">Completed</div>
                                                <?php else: ?>
                                                    <div class="badge bg-warning">Uncompleted</div>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <form action="/tasks/complete" method="POST"
                                                    style="display:inline;">
                                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                                    <button class="btn btn-success btn-sm success-btn" type="submit">
                                                        complete
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="/tasks/edit?id=<?php echo $task["id"]; ?>"class="btn btn-primary btn-sm primary-btn">
                                                    edit 
                                                </a>
                                            </td>
                                            <form method="POST" action="/tasks/delete" style="display:inline;">
                                                <td>
                                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                                    <button class="btn btn-danger btn-sm danger-btn" type="submit">
                                                        delete
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>