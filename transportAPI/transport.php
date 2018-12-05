

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="formvalidation.js"></script>
    <link rel="icon" href="../assets/logo.png">
    <link rel="stylesheet" type="text/css" href="transport.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <meta charset="UTF-8">
    <title>lifesadventure | Transportation</title>
</head>
<body>
    <h2 class="text-uppercase text-center mt-4">Search for Transportation</h2>
    <a href="../index.php" class="ml-5" style="font-size: 18px;">Back to Index</a>
        <form class="submission-form" name="journey"action="transportScrapping.php" method="get">

            <div class="form-group">
                <label for="HFS_from">From</label>
                <input id="HFS_from" type="text" name="HFS_from" required placeholder="Dublin">
            </div>
            <div class="form-group">
                <label for="HFS_to">To</label>
                <input id="HFS_to" type="text" name="HFS_to" required placeholder="Cork (Kent)" >
            </div>
            <div class="form-group"> <!-- Radio group !-->
                <div class="radio">
                    <label>
                        <input type="radio" name="fav_foods" value="single" required onclick="transportSingle()">
                        Single
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio"  name="fav_foods" value="return" onclick="transportReturn()">
                        Return
                    </label>
                </div>
            </div>
            <div  class="form-group">
                <label for="HFS_date_REQ0" class="accessible-hide">Outward Date</label>
                <input id="HFS_date_REQ0" type="text" class="form-control" required  name="REQ0JourneyDate" placeholder="Outbound date"/>
            </div>
                <script>
                    $('#HFS_date_REQ0').datepicker({
                        format: 'dd/mm/yyyy',
                        startDate: new Date(),
                        onSelect: function(formattedDate, date, inst) {
                            $(inst.el).trigger('change');
                        }

                    });
                </script>

                <div id="return-date" class="form-group">
                    <label for="HFS_date_REQ1" class="accessible-hide">Return Date</label>
                    <div class="input-group input-append date">
                    <input id="HFS_date_REQ1" type="text" class="form-control" name="REQ1JourneyDate" >
                    </div><script>
                        $('#HFS_date_REQ1').datepicker({
                            startDate: new Date(),
                            format: 'dd/mm/yyyy'
                        });
                    </script>
            </div>
            <div class="form-group">
                    <label for="HFS_time_REQ0" class="accessible-hide">Outward Time</label>
                    <select id="HFS_time_REQ0" name="REQ0JourneyTime" >
                        <option value="0">All Day</option>
                        <option value="00">Before 10AM</option>
                        <option value="9">9AM to 3PM</option>
                        <option value="14">2PM to 8PM</option>
                        <option value="18">6PM to 12AM</option>
                    </select>
            </div>
            <div id="return-time" class="form-group">
                    <label for="HFS_time_REQ1" class="accessible-hide">Return Time</label>
                    <select id="HFS_time_REQ1" name="REQ1JourneyTime" >
                        <option value="0">All Day</option>
                        <option value="00">Before 10 Am</option>
                        <option value="9">9AM to 3PM</option>
                        <option value="14">2PM to 8PM</option>
                        <option value="18">6PM to 12AM</option>
                    </select>
            </div>
            <div class="form-group">
                    <label for="HFS_adults" class="accessible-hide">Number of adults</label>
                    <select id="HFS_adults" name="Number_adults" >
                        <option value="0">0 adults</option>
                        <option value="1" selected="">1 adult</option>
                        <option value="2">2 adults</option>
                        <option value="3">3 adults</option>
                        <option value="4">4 adults</option>
                        <option value="5">5 adults</option>
                        <option value="6">6 adults</option>
                        <option value="7">7 adults</option>
                        <option value="8">8 adults</option>
                        <option value="9">9 adults</option>
                        <option value="10">10 adults</option>
                        <option value="11">11 adults</option>
                        <option value="12">12 adults</option>
                        <option value="13">13 adults</option>
                        <option value="14">14 adults</option>
                        <option value="15">15 adults</option>
                        <option value="16">16 adults</option>
                        <option value="17">17 adults</option>
                        <option value="18">18 adults</option>
                        <option value="19">19 adults</option>
                        <option value="20">20 adults</option>
                        <!--<option value="21">21 adults</option>
                        <option value="22">22 adults</option>
                        <option value="23">23 adults</option>
                        <option value="24">24 adults</option>
                        <option value="25">25 adults</option>
                        <option value="26">26 adults</option>
                        <option value="27">27 adults</option>
                        <option value="28">28 adults</option>
                        <option value="29">29 adults</option>
                        <option value="30">30 adults</option> -->
                    </select>
            </div>
            <div class="form-group">
                    <label for="HFS_children" class="accessible-hide">Number of children</label>
                    <select id="HFS_children" name="Number_children" >
                        <option value="0">0 children</option>
                        <option value="1">1 child</option>
                        <option value="2">2 children</option>
                        <option value="3">3 children</option>
                        <option value="4">4 children</option>
                        <option value="5">5 children</option>
                        <option value="6">6 children</option>
                        <option value="7">7 children</option>
                        <option value="8">8 children</option>
                        <option value="9">9 children</option>
                        <option value="10">10 children</option>
                        <option value="11">11 children</option>
                        <option value="12">12 children</option>
                        <option value="13">13 children</option>
                        <option value="14">14 children</option>
                        <option value="15">15 children</option>
                        <option value="16">16 children</option>
                        <option value="17">17 children</option>
                        <option value="18">18 children</option>
                        <option value="19">19 children</option>
                        <option value="20">20 children</option>
                        <!-- <option value="21">21 children</option>
                         <option value="22">22 children</option>
                         <option value="23">23 children</option>
                         <option value="24">24 children</option>
                         <option value="25">25 children</option>
                         <option value="26">26 children</option>
                         <option value="27">27 children</option>
                         <option value="28">28 children</option>
                         <option value="29">29 children</option>
                         <option value="30">30 children</option>-->
                    </select>
            </div>
            <div class="form-group">
                    <label for="HFS_students" class="accessible-hide">Number of students</label>
                    <select id="HFS_students" name="Number_students" >
                        <option value="0">0 students</option>
                        <option value="1">1 student</option>
                        <option value="2">2 students</option>
                        <option value="3">3 students</option>
                        <option value="4">4 students</option>
                        <option value="5">5 students</option>
                        <option value="6">6 students</option>
                        <option value="7">7 students</option>
                        <option value="8">8 students</option>
                        <option value="9">9 students</option>
                        <option value="10">10 students</option>
                        <option value="11">11 students</option>
                        <option value="12">12 students</option>
                        <option value="13">13 students</option>
                        <option value="14">14 students</option>
                        <option value="15">15 students</option>
                        <option value="16">16 students</option>
                        <option value="17">17 students</option>
                        <option value="18">18 students</option>
                        <option value="19">19 students</option>
                        <option value="20">20 students</option>
                        <!--<option value="21">21 students</option>
                        <option value="22">22 students</option>
                        <option value="23">23 students</option>
                        <option value="24">24 students</option>
                        <option value="25">25 students</option>
                        <option value="26">26 students</option>
                        <option value="27">27 students</option>
                        <option value="28">28 students</option>
                        <option value="29">29 students</option>
                        <option value="30">30 students</option>-->
                    </select>
            </div>
            <div class="form-group">
                <label for="submit"></label>
                <input type="submit" id="submit" name="submit" value="Submit" onclick="getValues()">
            </div>



        </form>
</body>
</html>