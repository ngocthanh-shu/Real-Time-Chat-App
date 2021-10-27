<?php 
    include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-text">This is an error message!</div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>

            </form>
            <div class="link">Not yet signed up? <a href="/Real-Time-Chat-App/index.php">Create account</a></div>
        </section>
    </div>
    <script src="/Real-Time-Chat-App/assets/js/pass-show-hide.js"></script>
    <script src="/Real-Time-Chat-App/assets/js/login.js"></script>
</body>

</html>