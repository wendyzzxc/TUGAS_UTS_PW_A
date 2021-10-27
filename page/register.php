<?php
include '../component/navbar2.php'
?>
<div class="bg bg-light text-dark">
    <div class="container min-vh-100 mt-5 d-flex align-items-center justify-content-center">
        <div class="card text-dark bg-light ma-5 shadow " style="min-width: 25rem;">
            <div class="card-header fw-bold" style="background-color: aqua;">Register</div>
            <div class="card-body">
                <form action="../registerProcess.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="register" style="width: 100%;">Register</button>
                    </div>
                </form>
                <p class="mt-2 mb-0" style="color: black;">Sudah punya akun ? <a href="./login.php" class="text-primary">Login Disini!</a></p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>