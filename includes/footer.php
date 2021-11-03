            <div id="footerText" class="container mt-5">
                <p>
                    <small>
                        <?php echo 'Copyright &copy; ' . date("Y") . ' PopcornTV.ca' ?>
                    </small>
                </p>
            </div>
        </div>
        <div class="toast-container posToast">
            <div id="toast" class="toast  align-items-center text-white bg-danger border-0" data-bs-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                <img src="<?php echo $root ?>client/public/images/message.png" width=24 height=24 class="rounded me-2" alt="message">
                <strong class="me-auto">Messages</strong>
                <small class="text-muted"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div id="textToast" class="toast-body">
            </div>
        </div>
        
        <script src="<?php echo $root ?>client/public/utilities/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>
        <script src="<?php echo $root ?>client/public/js/app.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#inputDate").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+0",
                    dateFormat: "yy-mm-dd"
                });
            });
            $(function() {
                $("#inputBd").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+0",
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
    </body>
</html>