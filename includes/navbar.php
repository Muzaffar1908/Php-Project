<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white">Navbar</a>

    <div class="d-flex">

        <!-- Button to open the modal login form -->
        <button class="btn btn-success btnn" onclick="document.getElementById('id01').style.display='block'">Login</button>

        <!-- The Modal -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'"
            class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="/action_page.php">
                <div class="imgcontainer">
                  <img src="../image/avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

        <!-- Button to open the modal login form -->
        <button class="btn btn-success" onclick="document.getElementById('id02').style.display='block'">Register</button>

        <!-- The Modal -->
        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'"
            class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="/action_page.php">
                <div class="imgcontainer">
                  <img src="../image/avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="fname"><b>First Name</b></label>
                    <input type="text" placeholder="Enter Username" name="fname" required>

                    <label for="lname"><b>Last Name</b></label>
                    <input type="text" placeholder="Enter Username" name="lname" required>

                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Register</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

    </div>

  </div>
</nav>