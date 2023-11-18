<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ISPMS";

// <-- -------------- ADDING FUNCTIONALITIES ADDING FUNCTIONALITIES ADDING FUNCTIONALITIES ADDING FUNCTION ALITIESADDING FUNCTIONALITIES ----------- -->


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              PARENT FUNCTIONALITIES 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/// ALL SESSIONS WILL BE HANDLED HERE
if (!isset($_SESSION)) {
    session_start();
}


// Connecting Variable___________________________________________
$conn = new mysqli($servername, $username, $password, $dbname);

// need to review
function checkerror($fullname, $address, $nid, $email, $phone, $password)
{

    $sql = "SELECT cid FROM Customer WHERE cemail='$email'";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        return "Email already exists";
    }

    $sql = "SELECT cid FROM Customer WHERE cphone='$phone'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return "Phone number already exists";
    }

    $sql = "SELECT cid FROM Customer WHERE cnid='$nid'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return "NID already exists";
    }
    header("Location:OTPverification.php");


}


// ROUTED
function customerReg($fullname, $address, $nid, $email, $phone, $password)
{

    $sql = "SELECT cid FROM Customer WHERE cemail='$email'";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        return "Email already exists";
    }

    $sql = "SELECT cid FROM Customer WHERE cphone='$phone'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return "Phone number already exists";
    }

    $sql = "SELECT cid FROM Customer WHERE cnid='$nid'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return "NID already exists";
    }

    $sql = "INSERT INTO Customer (cname, caddress, cnid, cemail, cphone, cpassword)
    VALUES ('$fullname','$address', '$nid','$email','$phone','$password')";


    if ($GLOBALS['conn']->query($sql) === TRUE) {
        header("Location:userlogin.php");
        return "Registration Successful";
    }
    return "Registration Unsuccessful";

}

function getProfile($email, $password)
{

    $sql = "SELECT * FROM Customer WHERE cemail='$email' AND cpassword='$password' ";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows == 0) {
        return "Wrong Email or Password";
    }

    $row = $result->fetch_assoc();
    // cname, caddress, cnid, cemail, cphone, cpassword
    $_SESSION['cname'] = $row['cname'];
    $_SESSION['caddress'] = $row['caddress'];
    $_SESSION['cnid'] = $row['cnid'];
    $_SESSION['cemail'] = $row['cemail'];
    $_SESSION['cphone'] = $row['cphone'];
    $_SESSION['cid'] = $row['cid'];

    return 'ok';

}
function updateProfile($email)
{
    $name = $_SESSION['cname'];
    $address = $_SESSION['caddress'];
    $nid = $_SESSION['cnid'];

    $phone = $_SESSION['cphone'];

    $sql = "UPDATE Customer SET cname='$name', caddress='$address', cnid='$nid', cphone='$phone' WHERE cemail='$email' ";
    // $result = $GLOBALS['conn']->query($sql);


    if ($GLOBALS['conn']->query($sql) === TRUE) {

        header("Location:userprofile.php");
        return "Record Updated";
    }
    return "Unable to Update";

}

function deleteProfile($email)
{
    $sql = "DELETE FROM Customer WHERE cemail = '$email' ";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        session_destroy();
        header("Location:index.php");
        return "Account Deleted";
    }
    return "Unable to Delete";
}

// $cname = 
// $caddress = 
// $cnid = 
// $cemail = 
// $cphone = 
// $issuetype = 
// $time = 
// $descriptions = 

function makeComplain($cname, $caddress, $cnid, $cemail, $cphone, $issuetype, $time, $descriptions)
{

    $sql = "INSERT INTO Complains (cname, caddress, cnid, cemail, cphone, issuetype, ctime, descriptions)
    VALUES('$cname','$caddress','$cnid','$cemail','$cphone','$issuetype', '$time','$descriptions')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        header("Location:usercomplain.php");
        return "Complain Added Successful";
    }
    return "Complain Unsuccessful";


}

function addnewplan($pname, $pspeed, $fee)
{
    $sql = "INSERT INTO Packages (pname, pspeed, fee)
    VALUES('$pname', '$pspeed',' $fee')";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        header("Location:allpackages.php");
        return "New Package Added Successful";
    }
    return "Query Unsuccessful";
}

function getAllpackages()
{
    $sql = "SELECT * FROM Packages";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows == 0) {
        return "NO PACKAGES AVAILABLE";
    }

    $listofpackages = "";

    while ($row = $result->fetch_assoc()) {
        $listofpackages .= '
        
        <div class="package">
                <div class="package-info">
                    <div class="package-title">' . $row['pname'] . '</div>
                    <div class="package-details">' . $row['pspeed'] . 'Mbps</div>
                    <div class="package-price">' . $row['fee'] . 'Tk/month</div>
                </div>
                <form action="" method="post">
    
                    <div class="modify">
                        <button class="package-button" name="m' . $row['pid'] . '">Modify</button>
    
                    </div>
                    <div class="modify delete">
                        <button class="package-button" name="d' . $row['pid'] . '">Delete</button>
    
                    </div>
                </form>
            </div>
        
        
        ';
    }

    return $listofpackages;
}


function deletepackage($pid)
{

    $sql = "DELETE FROM Packages WHERE pid='$pid'";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        return "Package Deleted";
    }
    return "Unable to Delete";

}

function getinfo($pid)
{

    $sql = "SELECT * FROM Packages WHERE pid='$pid'";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();

    $_SESSION['pname'] = $row['pname'];
    $_SESSION['pspeed'] = $row['pspeed'];
    $_SESSION['fee'] = $row['fee'];

    echo 'working';


}

function modifypackage($pname, $pspeed, $fee, $pid)
{

    $sql = "UPDATE Packages SET pname='$pname',pspeed='$pspeed',fee = '$fee' WHERE pid='$pid'";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        return "Package Modified";
    }
    return "Unable to Modify";

}

function showpackages()
{

    $sql = "SELECT * FROM Packages ";
    $result = $GLOBALS['conn']->query($sql);

    $count = 1;

    // $list = "";

    while ($row = $result->fetch_assoc()) {
        echo '
        <option value=' . $row['pid'] . '>Plan ' . $count++ . ' - ' . $row['pspeed'] . ' Mbps (' . $row['fee'] . 'TK/month) ' . $row['pname'] . '</option>
        ';

        // echo $row['pid'];

    }

    // <option value="plan2">Plan 2 - 100 Mbps ($39.99/month)</option>
    // <option value="plan3">Plan 3 - 200 Mbps ($49.99/month)</option>


}

function getpackagedetais($pid)
{

    $sql = "SELECT * FROM Packages WHERE pid = '$pid'";

    $result = $GLOBALS['conn']->query($sql);

    $row = $result->fetch_assoc();

    //pname, ptype, pspeed, fee

    $_SESSION['pname'] = $row['pname'];
    // $_SESSION['ptype'] = $row['ptype'];
    $_SESSION['ptype'] = ' Standard';
    $_SESSION['pspeed'] = $row['pspeed'];
    $_SESSION['fee'] = $row['fee'];


}

function setnewconnectionreq($pname, $cstatus, $currentplan, $requestedplan, $ptype, $pspeed, $fee, $cdate, $caddress, $CID)
{
    //[upid(pk),pname,cstatus,currentplan, requestedplan, ptype, pspeed, fee, cdate,caddress, CID(FK)]
    $cemail = $_SESSION['cemail'];
    $cphone = $_SESSION['cphone'];
    $sql = "INSERT INTO UserPackages (CID, pname, cstatus, currentplan, requestedplan, ptype, pspeed, fee, cdate, caddress,cemail, cphone )
    VALUES ('$CID', '$pname', '$cstatus', '$currentplan', '$requestedplan', '$ptype', '$pspeed', '$fee', '$cdate', '$caddress','$cemail','$cphone' )";


    if ($GLOBALS['conn']->query($sql) === TRUE) {
        // header("Location:allpackages.php");
        return "New Package Added Successful";
    }
    return "Query Unsuccessful";

}

function getnewreqplans($cstatus)
{

    $sql = "SELECT * FROM UserPackages where  cstatus = '$cstatus' ";
    $result = $GLOBALS['conn']->query($sql);

    $count = 1;

    $list = "";

    while ($row = $result->fetch_assoc()) {
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date	

        $accept = 'a' . $row['upid'];
        $reject = 'r' . $row['upid'];

        $list .= '
        <tr>
            <td>' . $count++ . '</td>
            <td>' . 'C' . $row['cid'] . '</td>
            <td>' . $row['ptype'] . '</td>
            <td>' . $row['requestedplan'] . '</td>
            <td>' . $row['caddress'] . '</td>
            <td>' . $row['cphone'] . '</td>
            <td>' . $row['cemail'] . '</td>

            <td>' . $row['fee'] . '</td>


            <form method="post">
                <td><button class="accept-button" name= ' . "$accept" . '>Accept</button></td>
                <td><button class="reject-button" name=' . "$reject" . '>Reject</button></td>
                
            </form>
            
            </tr>
            ';

    }

    return $list;

}
function getupgradereq($cstatus)
{

    $sql = "SELECT * FROM UserPackages where  cstatus = '$cstatus' ";
    $result = $GLOBALS['conn']->query($sql);

    $count = 1;

    $list = "";


    // <tr>
    //                 <td>1</td>
    //                 <td>C001</td>
    //                 <td>Personal</td>
    //                 <td>Plan 1</td>
    //                 <td>Plan 1</td>
    //                 <td>City A</td>
    //                 <td>123-456-7890</td>
    //                 <td>xxxxxxx@gmail.com</td>
    //                 <td>1000TK/M</td>
    //                 <td><button class="accept-button">Accept</button></td>
    //                 <td><button class="reject-button">Reject</button></td>
    //             </tr>

    while ($row = $result->fetch_assoc()) {
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date	

        $accept = 'a' . $row['upid'];
        $reject = 'r' . $row['upid'];

        $list .= '
        <tr>
            <td>' . $count++ . '</td>
            <td>' . 'C' . $row['cid'] . '</td>
            <td>' . $row['ptype'] . '</td>
            <td>' . $row['currentplan'] . '</td>
            <td>' . $row['requestedplan'] . '</td>
            <td>' . $row['caddress'] . '</td>
            <td>' . $row['cphone'] . '</td>
            <td>' . $row['cemail'] . '</td>
            <td>' . $row['fee'] . '</td>


            <form method="post">
                <td><button class="accept-button" name= ' . "$accept" . '>Accept</button></td>
                <td><button class="reject-button" name=' . "$reject" . '>Reject</button></td>
                
            </form>
            
            </tr>
            ';

    }

    return $list;

}
function getdeletereqplans($cstatus)
{

    $sql = "SELECT * FROM UserPackages where  cstatus = '$cstatus' ";
    $result = $GLOBALS['conn']->query($sql);

    $count = 1;

    $list = "";

    while ($row = $result->fetch_assoc()) {
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date	

        $delete = $row['upid'];


        $list .= '
        <tr>
            <td>' . $count++ . '</td>
            <td>' . 'C' . $row['cid'] . '</td>
            <td>' . $row['ptype'] . '</td>
            <td>' . $row['requestedplan'] . '</td>
            <td>' . $row['caddress'] . '</td>
            <td>' . $row['cphone'] . '</td>
            <td>' . $row['cemail'] . '</td>

            <td>' . $row['fee'] . '</td>


            <form method="post">
                <td><button class="reject-button" name= ' . "$delete" . '>Delete</button></td>

            </form>
            
            </tr>
            ';

    }

    return $list;

}



function updatestatus($status, $temp)
{
    $datenow = date("h:i:sa");

    $sql = "UPDATE UserPackages SET cstatus='$status',currentplan=requestedplan, cdate = '$datenow'  WHERE upid = '$temp' ";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        return "Package Modified";
    }
    return "Unable to Modify";


}


function getCurrentPlans($cstatus, $cid)
{

    $sql = "SELECT * FROM UserPackages where  cstatus = '$cstatus' and cid='$cid' ";
    $result = $GLOBALS['conn']->query($sql);

    $count = 1;

    $list = "";

    while ($row = $result->fetch_assoc()) {
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date	

        $update = 'u' . $row['upid'];
        $delete = 'd' . $row['upid'];

        // echo $update . ' - ' . $delete . '<br>';

        $list .= '
        <div class="package">
                <div class="package-details">
                    <div class="package-title"> ' . $count++ . '. Basic Package</div>
                    <div class="package-info">Up to ' . $row['pspeed'] . ' Mbps</div>
                    <div class="package-info">Type: ' . $row['ptype'] . '</div>
                    <div class="package-info">Location: ' . $row['caddress'] . '</div>
                    <div class="package-info">' . $row['fee'] . 'TK/month</div>
                </div>
                <div class="buttons">
            <form method="post">
                    <button class="upgrade-button" name= ' . $update . '>Upgrade</button>
                    <button class="delete-button" name=' . $delete . '>Delete</button>
                    </form>
                </div>
                </div>
                
                
                
               
            
        
            ';

    }

    return $list;

}

function deletereq($upid)
{

    $sql = "DELETE FROM UserPackages WHERE upid = '$upid'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        // session_destroy();
        // header("Location:index.php");
        return "Request Deleted";
    }
    return "Unable to Delete the req";


}

function getpaymentplans($cid)
{

    $sql = "SELECT * FROM UserPackages where  cstatus = 'accepted' and cid='$cid' ";
    $result = $GLOBALS['conn']->query($sql);

    $count = 1;

    $list = "";

    $totalbill = 0;

    while ($row = $result->fetch_assoc()) {
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	fee	cdate	caddress	reg_date
        // upid	cid	pname	cstatus	currentplan	requestedplan	ptype	pspeed	$totalbill 	cdate	caddress	reg_date	

        $totalbill += $row['fee'];

        $list .= '
        <div class="package">
                <div class="package-details">
                    <div class="package-title"> ' . $count++ . '. Basic Package</div>
                    <div class="package-info">Up to ' . $row['pspeed'] . ' Mbps</div>
                    <div class="package-info">Type: ' . $row['ptype'] . '</div>
                    <div class="package-info">Location: ' . $row['caddress'] . '</div>
                    <div class="package-info">' . $row['fee'] . 'TK/month</div>
                </div>
        </div>
        
        
        
        
        
        
        ';

    }

    $list .= '  
    <div class="package">
    
    
    <div class="package-details">
    <div class="package-title"> Total Payable Amount - ' . $totalbill . '</div>
    
    </div>
    <div class="buttons">
    <form method="post">
    <button class="delete-button" name=' . 'paybill' . '>Pay Bill</button>
    </form>
    </div>
    </div>
    
    ';

    $_SESSION['totalbill'] = $totalbill;

    return $list;

}

//     $now = time(); // Get the current timestamp

// // Convert your date string to a timestamp
// $yourDate = strtotime("2023-08-20"); // Replace with your date

// // Calculate the difference in seconds
// $timeDifference = $yourDate - $now;

// if ($timeDifference > 0) {




// }


function upgradepackage($reqplan, $upid)
{
    $stat = "upgrade";
    $sql = "UPDATE UserPackages SET requestedplan='$reqplan', cstatus='$stat' WHERE upid='$upid' ";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        return "Package Modified";
    }
    return "Unable to Modify";

}


function getallcomplains()
{

    $sql = "SELECT * FROM Complains ";
    $result = $GLOBALS['conn']->query($sql);


    $list = "";

    while ($row = $result->fetch_assoc()) {
        //  [ComplainID(PK), cname, caddress, cnid, cemail, cphone, issuetype, ctime, descriptions]

        $list .= '
        <tr>
        <td>' . $row['complainid'] . '</td>
        <td>' . $row['cname'] . '</td>
        <td>' . $row['caddress'] . '</td>
        <td>' . $row['cphone'] . '</td>
        <td>' . $row['ctime'] . '</td>
        <td>' . $row['descriptions'] . '</td>
        <td><button class="solved-button" name=' . $row['complainid'] . '>Solved</button></td>
    </tr>
        
        
        
        
        
        ';

    }

    return $list;


}

function deletecomplain($temp)
{

    $sql = "DELETE FROM Complains WHERE complainid = '$temp'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {

        return "Request Deleted";
    }
    return "Unable to Delete the req";


}

function setEmployee($ename, $eaddress, $ephone, $eemail, $designation, $salary, $cv)
{

    $sql = "INSERT INTO employee ( ename,	eaddress,	ephone,	eemail,	designation,	salary,	cv)
    VALUES ('$ename',	'$eaddress',	'$ephone',	'$eemail',	'$designation',	'$salary',	'$cv')";


    if ($GLOBALS['conn']->query($sql) === TRUE) {
        // header("Location:userlogin.php");
        return "Registration Successful";
    }
    return "Registration Unsuccessful";


}



function setpayment($amount, $paymentdate, $paymenttime, $transactionid, $paymentmethod, $cid)
{
    $sql = "INSERT INTO payment ( amount, paymentdate, paymenttime, transactionid, paymentmethod, cid)
    VALUES ('$amount', '$paymentdate', '$paymenttime', '$transactionid', '$paymentmethod', '$cid')";


    if ($GLOBALS['conn']->query($sql) === TRUE) {
        // header("Location:userlogin.php");
        return "Registration Successful";
    }
    return "Registration Unsuccessful";
}


function getpaymentinfos()
{
    $sql = "SELECT * FROM Payment";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows == 0) {
        return "NO Payment History AVAILABLE";
    }

    $listofpackages = "";

    // [paymentid(pk),amount, paymentdate, paymenttime, transactionid, paymentmethod,cid]
    while ($row = $result->fetch_assoc()) {
        $listofpackages .= '
        
       <tr>
            <td> ' . $row['paymentid'] . ' </td>
            <td> ' . $row['amount'] . ' </td>
            <td> ' . $row['paymentdate'] . ' </td>
            <td> ' . $row['paymenttime'] . ' </td>
            <td> ' . $row['transactionid'] . ' </td>
            <td> ' . $row['paymentmethod'] . ' </td>
            <td> ' . $row['cid'] . ' </td>
       </tr>
        
        
        ';
    }

    return $listofpackages;
}

function getEmpList()
{

    $sql = "SELECT * FROM Employee";
    $result = $GLOBALS['conn']->query($sql);

    $str = "";

    while ($row = $result->fetch_assoc()) {

        $str .= '
        <tr>
        <form action="" method="post">
                    
        <td><button class="employee-profile-button" name = ' . $row['eid'] . ' >' . 'E' . $row['eid'] . '</button></td>
        </form>
    <td>' . $row['ename'] . '</td>
    <td>' . $row['designation'] . '</td>
    <td>
    
    <select id="allocation">
    <option value="allocate">Allocate</option>
    <option value="deallocate">Deallocate</option>
    </select>

   
    
    
    </td>
    </tr>
            ';
    }

    return $str;

}


function getEmpProfile($eid)
{
    $sql = "SELECT * FROM Employee WHERE eid = '$eid' ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();

    $_SESSION['ename'] = $row['ename'];
    $_SESSION['eaddress'] = $row['eaddress'];
    $_SESSION['ephone'] = $row['ephone'];
    $_SESSION['eemail'] = $row['eemail'];
    $_SESSION['designation'] = $row['designation'];
    $_SESSION['salary'] = $row['salary'];
    $_SESSION['cv'] = $row['cv'];
}


?>