<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$sid = $_SESSION['sid'];
$sname = $_SESSION['sname'];
if (!$user->getsession()) {
    header('Location: st_login.php');
    exit();
}
if (isset($_REQUEST['vr'])) {
    $stid = $_REQUEST['vr'];
    $name = $_REQUEST['vn'];
}
?>

<?php
$pageTitle = "Student Result";
include "php/headertop.php";
?>
<div class="all_student fix">
    <?php

    function credit_hour($x)
    {
        if ($x == "DBMS") return 3;
        elseif ($x == "CSE299") return 1;
        elseif ($x == "CSE327") return 3;
        elseif ($x == "EEE299") return 1;
        elseif ($x == "ETE299") return 1;
        elseif ($x == "ETE331") return 3;
        elseif ($x == "CSE215") return 3;
        elseif ($x == "EEE312") return 3;
        elseif ($x == "CSE327") return 3;
        elseif ($x == "CSE115") return 3;
    }

    function grade_point($gd)
    {
        if ($gd < 60) return 0;
        elseif ($gd >= 60 && $gd < 70) return 1;
        elseif ($gd >= 70 && $gd < 80) return 2;
        elseif ($gd >= 80 && $gd < 90) return 3;
        elseif ($gd >= 90 && $gd <= 100) return 4;
    }
    ?>

    <div>
        <font color="#000000">
            <p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Name: " . $name . "<br>Student ID: " . $stid; ?></p>
    </div>
    <p style="float:left;margin:0 0 3px 0;width:100%;text-align:center;"><a href="view_single_cgpa.php?vr=<?php echo $stid; ?>&vn=<?php echo $name; ?>"><button class="editbtn"><font color="#000000">View CGPA & Complete Course</button></a></p>
    </div>

    <form action="" method="post" style="width:25%;margin:0 auto;padding-bottom:5px;">
        <select name="seme" id=""><font color="#000000">
                <option value="1st"><font color="#000000">1st Semester</option>
                <option value="2nd"><font color="#000000">2nd Semester</option>
                <option value="3rd"><font color="#000000">3rd Semester</option>
                <option value="4th"><font color="#000000">4th Semester</option>
                <option value="5th"><font color="#000000">5th Semester</option>
                <option value="6th"><font color="#000000">6th Semester</option>
                <option value="7th"><font color="#000000">7th Semester</option>
                <option value="8th"><font color="#000000">8th Semester</option>
                <option value="9th"><font color="#000000">9th Semester</option>
                <option value="10th"><font color="#000000">10th Semester</option>
                <option value="11th"><font color="#000000">11th Semester</option>
                <option value="12th"><font color="#000000">12th Semester</option>
            </select>
            <font color="#000000"> <input type="submit" value="view Result" />
    </form>

    <div class="fix">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $semester = $_POST['seme'];

            $i = 0;
            $ch = 0;
            $gp = 0;

            $get_result = $user->show_marks($stid, $semester);
            if ($get_result) {
        ?>
                <br>
                <p><?php echo "<p style='text-align:center;background:black;color:#01C3AA;padding:5px;width:84%;margin:0 auto'>" . $semester . " Semester Result" ?></p><br>
                <table class="tab_two" style="text-align:center;width:85%;margin:0 auto">
                    <style>
                        table {
                            border: 1px;
                            font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 86%;
                            margin: auto;
                        }

                        td,
                        th {
                            border: 1px solid black !important;
                            padding: 5px;
                        }

                        tr:nth-child(even) {
                            background-color: white;
                        }
                    </style>
                    <th>Subjects</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <th>Credit hr.</th>
                    <th>Status</th>
                    <?php
                    while ($rows = $get_result->fetch_assoc()) {
                        $i++;
                        $ch = $ch + credit_hour($rows['sub']);
                    ?>
                        <tr>
                            <td><font color="#000000"><?php echo $rows['sub']; ?></td>
                            <td><font color="#000000"><?php echo $rows['marks']; ?></td>
                            <td><font color="#000000">
                                <?php
                                $mark = $rows['marks'];
                                if ($mark < 60) {
                                    echo "F";
                                } elseif ($mark >= 60 && $mark < 70) {
                                    echo "D";
                                } elseif ($mark >= 70 && $mark < 80) {
                                    echo "C";
                                } elseif ($mark >= 80 && $mark < 90) {
                                    echo "B";
                                } elseif ($mark >= 90 && $mark <= 100) {
                                    echo "A";
                                }

                                $gp = $gp + (credit_hour($rows['sub']) * grade_point($rows['marks']));
                                ?>
                                </td>
                                <td><?php echo credit_hour($rows['sub']); ?></td>
                                <td>
                                    <?php
                                    $stat = $rows['marks'];
                                    if ($stat < 60) {
                                        echo "<span style='background:red;padding:3px 11px;color:#fff;'>Fail</span>";
                                    } elseif ($stat >= 60 && $stat < 70) {
                                        echo "<span style='background:yellow'>Retake</span>";
                                    } else {
                                        echo "<span style='background:green;padding:3px 6px;color:#fff;'>Pass</span>";
                                    }
                                    ?>
                                </td>
                        </tr>
                <?php }
                ?>
                <tr>
                    <td colspan="2"><font color="#000000">CGPA :</td>
                    <td colspan="2">
                        <?php
                        $sg = $gp / $ch;
                        echo "<span style='color:black;padding:3px 6px;font-size:20px'>" . round($sg, 2) . "</span>";
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($sg >= 3.5) {
                            echo "<span style='background:purple;padding:3px 6px;color:#fff;'>Excellent";
                        } elseif ($sg >= 3.0 && $sg < 3.5) {
                            echo "<span style='background:green;padding:3px 6px;color:#fff;'>Good";
                        } elseif ($sg >= 2.5 && $sg < 3.0) {
                            echo "<span style='background:gray;padding:3px 6px;color:#fff;'>Average";
                        } else {
                            echo "<span style='background:red;padding:3px 6px;color:#fff;'>Probation";
                        }
                        ?>
                    </td>
                </tr>
        </table>
    <?php
            } else {
                echo  "<p style='color:red;text-align:center'>Nothing Found</p>";
            }
        }
    ?>

    <p style="float:right;text-align:left;margin:20px 0;width:58%"><a href="st_profile.php"><button class="editbtn"><font color="#000000">Back to profile</button></a></p>

</div>
<?php ; ?>
<?php ob_end_flush(); ?>
