
<?php
/**
 * Created by PhpStorm.
 * User: Jojo
 * Date: 20.11.2018
 * Time: 20:30
 */


$from = "";
$to="";
$single="single";
$return="return";
$dateSingle="";
$dateReturn="";
$time="";
$timeReturn="";
$adults="";
$children="";
$students="";
$ressource_link="";
$newDateSingle="";
$newDateReturn="";
$link="";
$newDate="";
$iframe="";




if(isset($_GET['submit'])) {
    if ((!empty($_GET['REQ1JourneyDate']))) {

        $from = $_GET['HFS_from'];
        $to = $_GET['HFS_to'];
        $single = "";
        $return = "return";
        $dateSingle = $_GET['REQ0JourneyDate'];
        $dateReturn = $_GET['REQ1JourneyDate'];
        $newDateSingle = date("d/m/Y", strtotime($dateSingle));
        $newDateReturn = date("d/m/Y", strtotime($dateReturn));
        $time = $_GET['REQ0JourneyTime'];
        $timeReturn = $_GET['REQ1JourneyTime'];
        $adults = $_GET['Number_adults'];
        $children = $_GET['Number_children'];
        $students = $_GET['Number_students'];
        $ressource_link = 'http://journeyplanner.irishrail.ie/webapp/?HWAI%3DJS%21js=yes&HWAI%3DJS%21ajax=yes&#!start|1!REQ0JourneyStopsS0G|' .
            $from . "!REQ0JourneyStopsZ0G|" .
            $to . "!journey_mode|" .
            $return . "!REQ0JourneyDate|" .
            $dateSingle . "!REQ1JourneyDate|" .
            $dateReturn . "!REQ0JourneyTime|" .
            $time . "!REQ1JourneyTime|" .
            $timeReturn . "!Number_adults|" .
            $adults . "!Number_children|" .
            $children . "!Number_students|" .
            $students;

       // echo ('return');
        echo("<a href='$ressource_link'>TRANSPORTATION BOOKING LINK</a>");
        echo("<div> If you want to book the transportation from ".$from." to ".$to." on ".$dateSingle." please click the following link : <a href='$ressource_link'>TRANSPORT BOOKING LINK</a>");
    }
    if ((empty($_GET['journey_mode_return'])) && (empty($_GET['REQ1JourneyDate']))) {
        $from = $_GET['HFS_from'];
        $to = $_GET['HFS_to'];
        $single = "";
        $return = "return";
        $dateSingle = $_GET['REQ0JourneyDate'];
        $newDate = $_GET['REQ0JourneyDate'];
        $newDate1 = date("d/m/Y", strtotime($newDate));
        $time = $_GET['REQ0JourneyTime'];
        $adults = $_GET['Number_adults'];
        $children = $_GET['Number_children'];
        $students = $_GET['Number_students'];
        //$newDate = $_GET['REQ0JourneyDate'];
        //$newDate = $newDateSingle = date("dmY", strtotime($dateSingle));
        $ressource_link = 'http://journeyplanner.irishrail.ie/webapp/?HWAI%3DJS%21js=yes&HWAI%3DJS%21ajax=yes&#!start|1!REQ0JourneyStopsS0G|' .
            $from . "!REQ0JourneyStopsZ0G|" .
            $to . "!journey_mode|" .
            'single' . "!REQ0JourneyDate|" .
            $newDate . "!REQ0JourneyTime|" .
            $time . "!Number_adults|" .
            $adults . "!Number_children|" .
            $children . "!Number_students|" .
            $students;
        $link=
            "https://journeyplanner.transportforireland.ie/nta/XSLT_TRIP_REQUEST2?inclMOT_0=1&inclMOT_4=1&inclMOT_5=1&inclMOT_9=1&name_origin=".$from."%2C+".$from."&name
            Info_origin=suburbID%3A57102020%3A10822013%
            3A".$from."%3A715807%3A265257%3AITMR&
            name_destination=".$to."%2C+".$to."&name
            Info_destination=suburbID%3A57202170%3A10837068%3A".
            $to."%3A567846%3A427928%
            3AITMR&itdTripDateTimeDepArr=dep&qqueryMacro=true&itdDate=".
            $newDate."
            &itdTime=
            0600&language=en&useProxFootSearch=on&custom_suggestMacro=true&std3_commonMacro
            =trip&std3_customMacro=true&inclMOT_8=1";

        echo("<a href='$ressource_link'>TRANSPORTATION BOOKING LINK</a>");
        echo("<div> If you want to book the transportation from ".$from." to ".$to." on ".$dateSingle." please click the following link : <a href='$ressource_link'>TRANSPORTATION BOOKING LINK</a>");
        //echo ($link);

        }
    }
    ?>


<meta http-equiv="refresh" content="3; url=http://sarojbartaula.com.np">