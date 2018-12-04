<!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="index.php">lifesadventure</a> <br>Template by Colorlib
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
    <!-- Dropdown Slide JS -->
    <script src="js/dropdown.js"></script>
    <!-- Echo result JS -->
    <script src="js/echo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
        $(document).ready(function(){
            $('[data-toggle="popover"]').click(function() {
                $('[data-toggle="tooltip"]').tooltip('hide');
            });
        });
    </script>
    <script type="text/javascript">
        var expanded = false;
        var expanded1 = false;
        var expanded2 = false;
        var expanded3 = false;

        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }

        function showCheckboxes1() {
            var checkboxes1 = document.getElementById("checkboxes1");
            if (!expanded1) {
                checkboxes1.style.display = "block";
                expanded1 = true;
            } else {
                checkboxes1.style.display = "none";
                expanded1 = false;
            }
        }

        function showCheckboxes2() {
            var checkboxes2 = document.getElementById("checkboxes2");
            if (!expanded2) {
                checkboxes2.style.display = "block";
                expanded2 = true;
            } else {
                checkboxes2.style.display = "none";
                expanded2 = false;
            }
        }

        function showCheckboxes3() {
            var checkboxes3 = document.getElementById("checkboxes3");
            if (!expanded3) {
                checkboxes3.style.display = "block";
                expanded3 = true;
            } else {
                checkboxes3.style.display = "none";
                expanded3 = false;
            }
        }
    </script>
</body>

</html>