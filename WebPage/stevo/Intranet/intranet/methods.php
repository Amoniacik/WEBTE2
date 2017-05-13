<?php

require_once('config.php');

function isWeekend($date) {
    return (date('N', strtotime($date)) >= 6);
}

function build_modals()
{
    
}

function build_table($yy, $mm) {
    $conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);

    if ($conn->connect_error)
        die("Napicu error: " . $conn->connect_error);

    echo "<table oncontextmenu='return false' class='table table-striped table-bordered'>";
    $d = cal_days_in_month(CAL_GREGORIAN, $mm, $yy);
    echo "<thead>\n";
    echo "<tr>\n";
    echo "<th>Pracovník</th>\n";
    for ($x = 1; $x <= $d; $x++) {

        if (date('N', mktime(0, 0, $yy, $mm, $x)) >= 6) {
            echo "<th class='danger th_tab'>" . $x . "</th>\n";
        } else {
            echo "<th class='th_tab'>" . $x . "</th>\n";
        }
    }
    echo "</tr>\n";
    echo "</thead>\n";
    echo "<tbody>\n";
    echo "    <tr>\n";
    $d = cal_days_in_month(CAL_GREGORIAN, $mm, $yy);
    $datumMin = '' . $yy . '-' . ($mm<10 ? '0' : '') . $mm . '-01';
    $datumMax = '' . $yy . '-' . ($mm<10 ? '0' : '') . $mm . '-' . $d . '';
    $sql = "SELECT p.id as pid, p.meno, p.priezvisko, d.id_nepritomnost, d.datum FROM pracovnici p LEFT JOIN dochadzka d ON p.id = d.id_pracovnik LEFT JOIN nepritomnosti n ON d.id_nepritomnost = n.id ORDER BY p.priezvisko, d.datum";
    $result = $conn->query($sql);

    $user_id = 0;
    $done = false;
    if ($result->num_rows > 0) {
        $d = cal_days_in_month(CAL_GREGORIAN, $mm, $yy);
        $end = 1;
        for ($i = 0; $i < $result->num_rows; $i++) {
            if (!mysqli_data_seek($result, $i))
                continue;

            if (!$row = mysqli_fetch_assoc($result))
                continue;

            $nextSame = false;
            $prevSame = $user_id == $row["pid"];
            $user_id = $row["pid"];
            if ($result->num_rows - 1 > $i) {
                if (mysqli_data_seek($result, $i + 1)) {
                    if ($row2 = mysqli_fetch_assoc($result))
                        $nextSame = ($row["pid"] == $row2["pid"]);
                }
            }

            if (!$prevSame) {
                if ($i != 0)
                {
                    echo "    </tr>\n";
                    echo "    <tr>\n";
                }
                echo "        <td><a id='pid".$row["pid"]."' href='#' data-toggle='modal' data-target='#modal".$row["pid"]."'>" . $row["priezvisko"] . " " . $row["meno"] . "</a></td>\n";
                $end = 1;
                $done = false;
            }
            else if ($done)
                continue;

            for ($x = $end; $x <= $d; $x++) {
                $datum = '' . $yy . '-' . ($mm<10 ? '0' : '') . $mm . '-' . ($x<10 ? '0' : '') . $x . '';
                $tdclass = " class='btn-default td_tab'";
    
                $found = false;
                if ($datum == $row["datum"]) {
                    switch ($row["id_nepritomnost"]) {
                        case 1:
                            $tdclass = " class='btn-success td_tab'";
                            break;
                        case 2:
                            $tdclass = " class='btn-warning td_tab'";
                            break;
                        case 3:
                            $today = date("Y-m-d");
                            if (strtotime($datum) > strtotime($today))
                                $tdclass = " class='btn-info td_tab'";
                            else
                                $tdclass = " class='btn-primary td_tab'";
                            break;
                        case 4:
                            $tdclass = " class='btn-danger td_tab'";
                            break;
                    }

                    $found = true;
                }

                echo "        <td onmousedown=OnFieldClick(this) onmouseup=OnFieldRelease(this) onmouseover=OnFieldOver(this)" . $tdclass . " id='" . $row["pid"] . "x" . $x . "'>";
                echo "</td>\n";
                
                $end++;

                if ($x == $d)
                {
                    $done = true;
                    $nextSame = false;
                    break;
                }

                if ($found)
                {
                    if ($nextSame)
                        break;
                }
            }
        }
    }
    echo "        </tr>\n";
    echo "    </tbody>\n";
    echo "</table>\n";
    echo "<div>\n";
    echo "    <button id='attx1' onclick='OnAttSel(this)' class='btn btn-success disabled'>Sluzobná Cesta</button>\n";
    echo "    <button id='attx2' onclick='OnAttSel(this)' class='btn btn-warning disabled'>Práce Neschopnosť</button>\n";
    echo "    <button id='attx3' onclick='OnAttSel(this)' class='btn btn-primary disabled'>Dovolenka</button>\n";
    echo "    <button id='attx4' onclick='OnAttSel(this)' class='btn btn-danger disabled'>OCR</button>\n";
    echo "</div>\n";
    echo "<br>\n";
    echo "<div>\n";
    echo "    <button id='editx' onclick='ToggleEditMode(this)' class='btn btn-danger'>Editovací Režim</button>\n";
    echo "</div>\n";

    if ($result->num_rows > 0) {
        $d = cal_days_in_month(CAL_GREGORIAN, $mm, $yy);
        $user_id = 0;
        $end = 1;
        $done = false;
        for ($i = 0; $i < $result->num_rows; $i++) {
            if (!mysqli_data_seek($result, $i))
                continue;

            if (!$row = mysqli_fetch_assoc($result))
                continue;

            $nextSame = false;
            $prevSame = $user_id == $row["pid"];
            $user_id = $row["pid"];
            if ($result->num_rows - 1 > $i) {
                if (mysqli_data_seek($result, $i + 1)) {
                    if ($row2 = mysqli_fetch_assoc($result))
                        $nextSame = ($row["pid"] == $row2["pid"]);
                }
            }

            if (!$prevSame) {
                $done = false;
                $end = 1;
                echo "<div class='modal fade' id='modal".$user_id."' role='dialog'>\n";
                echo "    <div class='modal-dialog'>\n";
                echo "        <div class='modal-content'>\n";
                echo "          <div class='modal-header'>\n";
                echo "              <button type='button' class='close' data-dismiss='modal'>&times;</button>\n";
                echo "              <h4 class='modal-title'>".$row["priezvisko"] . " " . $row["meno"]."</h4>\n";
                echo "          </div>\n";
                echo "          <div class='modal-body'>\n";
                echo "              <p>Some text in the modal.</p>\n";
                echo "              <table oncontextmenu='return false' class='table table-striped table-bordered'>\n";
                echo "                  <tbody>\n";
                echo "                      <tr>\n";
            }
            else if ($done)
                continue;

            for ($x = $end; $x <= $d; $x++) {
                $datum = '' . $yy . '-' . ($mm<10 ? '0' : '') . $mm . '-' . ($x<10 ? '0' : '') . $x . '';
                $tdclass = " class='btn-default td_tab";

                $found = false;
                if ($datum == $row["datum"]) {
                    switch ($row["id_nepritomnost"]) {
                        case 1:
                            $tdclass = " class='btn-success td_tab";
                            break;
                        case 2:
                            $tdclass = " class='btn-warning td_tab";
                            break;
                        case 3:
                            $today = date("Y-m-d");
                            if (strtotime($datum) > strtotime($today))
                                $tdclass = " class='btn-info td_tab";
                            else
                                $tdclass = " class='btn-primary td_tab";
                            break;
                        case 4:
                            $tdclass = " class='btn-danger td_tab";
                            break;
                    }

                    $found = true;
                }
                
                $bold = date('N', mktime(0, 0, $yy, $mm, $x)) >= 6;
                if (date('N', mktime(0, 0, $yy, $mm, $x)) >= 6) {
                    $tdclass = $tdclass." bordd'";
                }
                else
                    $tdclass = $tdclass."'";

                echo "                          <td onmousedown=OnFieldClick(this) onmouseup=OnFieldRelease(this) onmouseover=OnFieldOver(this)" . $tdclass . " id='" . $row["pid"] . "m" . $x . "'>".$x."</td>\n";

                if ($x % 7 == 0)
                {
                    echo "                      </tr>\n";
                    echo "                      <tr>\n";
                }

                $end++;

                if ($x == $d)
                {
                    $done = true;
                    $nextSame = false;
                    break;
                }

                if ($found)
                {
                    if ($nextSame)
                        break;
                }
            }

            if (!$nextSame) {
                echo "                      </tr>\n";
                echo "                  </tbody>\n";
                echo "              </table>\n";
                echo "          </div>\n";
                echo "          <div class='modal-footer'>\n";
                echo "              <button id='att".$user_id."m1' onclick='OnAttSel(this)' class='btn btn-success disabled'>Sluzobná Cesta</button>\n";
                echo "              <button id='att".$user_id."m2' onclick='OnAttSel(this)' class='btn btn-warning disabled'>Práce Neschopnosť</button>\n";
                echo "              <button id='att".$user_id."m3' onclick='OnAttSel(this)' class='btn btn-primary disabled'>Dovolenka</button>\n";
                echo "              <button id='att".$user_id."m4' onclick='OnAttSel(this)' class='btn btn-danger disabled'>OCR</button>\n";
                echo "              <br><br>\n";
                echo "              <button id='editm".$user_id."' onclick='ToggleEditMode(this)' class='btn btn-danger'>Editovací Režim</button>\n";
                echo "              <button type='button' class='btn btn-default' data-dismiss='modal'>Zavoriť</button>\n";
                echo "          </div>\n";
                echo "          <br>\n";
                echo "      </div>\n";
                echo "  </div>\n";
                echo "</div>\n";
            }
        }
    }
}


?>