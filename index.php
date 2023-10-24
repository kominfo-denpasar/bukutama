<?php include("./config/config.php");

// menampilkan waktu indonesia
date_default_timezone_set('Asia/Makassar');

$perpage = 10;
if (isset($_GET['page']) & !empty($_GET['page'])) {
    $curpage = $_GET['page'];
} else {
    $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$PageSql = "SELECT * FROM data_user";
$pageres = mysqli_query($con, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres / $perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$ReadSql = "SELECT * FROM data_user ORDER BY id_user DESC LIMIT $start, $perpage";
$res = mysqli_query($con, $ReadSql);
?>

<?php
$query = "SELECT kepuasan, count(*) as number FROM data_user GROUP BY kepuasan";
$result = mysqli_query($con, $query) or die("error kepuasan");

?>
<html>

<head>
    <title>Buku Tamu</title>

    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="loader.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="style.css" rel="stylesheet">

    <!-- sweetalert -->
    <!-- <script src="dist/sweetalert.js"></script> -->
    <!-- <link rel="stylesheet" href="dist/sweetalert.css"> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- end sweetalert -->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/kota.png">

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Kepuasan', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "['" . $row["kepuasan"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);
            var options = {
                title: 'Persentase Kepuasan Pengunjung',
                titleTextStyle: {
                    color: 'white',
                },
                //is3D:true,  
                pieHole: 0.4,
                backgroundColor: 'transparent',
                legend: {
                    textStyle: {
                        color: 'white'
                    }
                }
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);

        }
    </script>
    <style>

    </style>
</head>

<body>
    <div id="particles-js">
        <div class="test" id="top">
            <br> </br>
            <center><img src="img/kota.png" alt="" height="200" width="200"></center>

            <h1>Pemerintah Kota Denpasar</h1>
        </div>
    </div>

    <div id="form" method="post">

        <form id="waterform" method="post">

            <div class="formgroup" id="name-form">
                <input type="text" id="name" name="nama" placeholder="Enter Name" required />
            </div>
            <br>
            <div class="formgroup" id="email-form">
                <input type="text" id="email" name="email" placeholder="Enter Email" required />
            </div>
            <br>
            <div class="formgroup" id="message-form">
                <textarea id="message" name="pesan" placeholder="Enter Message" required></textarea>
            </div>
            <br>
            <input type="hidden" value="<?php echo date("h:i:sa"); ?>" name="jam">
            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="tgl">

            <table border="0" align="center" width="800px">
                <tr>
                    <td colspan="5" id="specialtext" colspan="5">
                        <center>
                            <div class="kepuasan">Kepuasan</div>
                        </center>
                    </td>
                </tr>
                <tr align="center">
                    <td><button name="veryhappy"><img src="img/veryhappy.png" width="107px" height="107px"></button></td>
                    <td><button name="happy" class="sweet-3"><img src="img/happy.png" width="107px" height="107px"></button></td>
                    <td><button name="decent"><img src="img/decent.png" width="107px" height="107px"></button></td>
                    <td><button name="nothappy"><img src="img/nothappy.png"></button></td>
                    <td><button name="verybad"><img src="img/verybad.png" width="107px" height="107px"></button></td>

                </tr>
                <tr align="center">
                    <td colspan="5" id="specialtext">Pilih salah satu gambar untuk men-submit jawaban anda</td>
                </tr>
                <tr align="center">
                    <td colspan="5" id="specialtext"><a href="#two" id="link">Lihat Hasil Polling</a></td>
                </tr>
            </table>
        </form>
    </div>
    </div>


    <div id="two"></div>
    <div class="test" id="page2" style="padding-bottom:  100px;">
        <div id="piechart" style="width: 1400px; height: 500px;" class="pages"><a href="#top">Isi Buku Tamu</a></div>
        <div class="link"><a href="#top" id="link2">
                <center>Isi Buku Tamu</center>
            </a></div>

    </div>

    <div class="test" id="page3" style="height:100%">

        <table align="center" class="responstable">
            <tr>
                <th></th>
                <th>Nama</th>
                <th>E-Mail</th>
                <th>Tujuan</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td>
                        <?php
                        $smiley = $row['kepuasan'];
                        if ($smiley == 'Senang') {

                            echo '<img src="img/happy.png" width="50px" height="50px">';
                        } else if ($smiley == 'Biasa') {
                            echo '<img src="img/decent.png" width="50px" height="50px">';
                        } else if ($smiley == 'Sangat Senang') {
                            echo '<img src="img/veryhappy.png" width="50px" height="50px">';
                        } else if ($smiley == 'Sangat Buruk') {
                            echo '<img src="img/verybad.png" width="50px" height="50px">';
                        } else {
                            echo '<img src="img/nothappy.png" width="50px" height="50px">';
                        }

                        ?>

                    </td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pesan']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="pagination">
            <?php if ($curpage != $startpage) { ?>

                <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">First</span>
                </a>

            <?php } ?>
            <?php if ($curpage >= 2) { ?>
                <a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a>
            <?php } ?>
            <a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a>
            <?php if ($curpage != $endpage) { ?>
                <a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a>

                <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Last</span>
                </a>

            <?php } ?>
        </div>
    </div>

    <!-- post process start here -->
    <?php

    if (isset($_POST["happy"])) {

        $nama   = $_POST['nama'];
        $email = $_POST['email'];
        $pesan  = $_POST['pesan'];
        $tgl    = $_POST['tgl'];
        $jam    = $_POST['jam'];

        $kepuasan = "Senang";
        $sql = mysqli_query($con, "INSERT INTO data_user(id_user,nama,email,pesan,kepuasan,tgl,jam) VALUES (null, '$nama', '$email', '$pesan', '$kepuasan', '$tgl', '$jam') ") or die("error");
        if ($sql) {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
                swal("Terima Kasih!", "Pesan Anda Telah Kami Terima!", "success");
            });
            
            </script>
            ';
        }
    }

    if (isset($_POST["decent"])) {

        $nama   = $_POST['nama'];
        $email = $_POST['email'];
        $pesan  = $_POST['pesan'];
        $tgl    = $_POST['tgl'];
        $jam    = $_POST['jam'];

        $kepuasan = "Biasa";
        $sql = mysqli_query($con, "INSERT INTO data_user(id_user,nama,email,pesan,kepuasan,tgl,jam) VALUES (null, '$nama', '$email', '$pesan', '$kepuasan', '$tgl', '$jam') ") or die("error");
        if ($sql) {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
                swal("Terima Kasih!", "Pesan Anda Telah Kami Terima!", "success");
            });
            
            </script>
            ';
        }
    }
    if (isset($_POST["nothappy"])) {

        $nama   = $_POST['nama'];
        $email = $_POST['email'];
        $pesan  = $_POST['pesan'];
        $tgl    = $_POST['tgl'];
        $jam    = $_POST['jam'];

        $kepuasan = "Tidak Senang";
        $sql = mysqli_query($con, "INSERT INTO data_user(id_user,nama,email,pesan,kepuasan,tgl,jam) VALUES (null, '$nama', '$email', '$pesan', '$kepuasan', '$tgl', '$jam') ") or die("error");
        if ($sql) {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
                swal("Terima Kasih!", "Pesan Anda Telah Kami Terima!", "success");
            });
            
            </script>
            ';
        }
    }
    if (isset($_POST["veryhappy"])) {

        $nama   = $_POST['nama'];
        $email = $_POST['email'];
        $pesan  = $_POST['pesan'];
        $tgl    = $_POST['tgl'];
        $jam    = $_POST['jam'];

        $kepuasan = "Sangat Senang";
        $sql = mysqli_query($con, "INSERT INTO data_user(id_user,nama,email,pesan,kepuasan,tgl,jam) VALUES (null, '$nama', '$email', '$pesan', '$kepuasan', '$tgl', '$jam') ") or die("error");
        if ($sql) {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
                swal("Terima Kasih!", "Pesan Anda Telah Kami Terima!", "success");
            });
            
            </script>
            ';
        }
    }
    if (isset($_POST["verybad"])) {

        $nama   = $_POST['nama'];
        $email = $_POST['email'];
        $pesan  = $_POST['pesan'];
        $tgl    = $_POST['tgl'];
        $jam    = $_POST['jam'];

        $kepuasan = "Sangat Buruk";
        $sql = mysqli_query($con, "INSERT INTO data_user(id_user,nama,email,pesan,kepuasan,tgl,jam) VALUES (null, '$nama', '$email', '$pesan', '$kepuasan', '$tgl', '$jam') ") or die("error");
        if ($sql) {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
                swal("Terima Kasih!", "Pesan Anda Telah Kami Terima!", "success");
            });
            
            </script>
            ';
        }
    }
    ?>
    <!-- post process end here -->

    <script>
        //jump to div script
        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    </script>


    <script src="js/particles.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        particlesJS.load('particles-js', 'particles.json', function() {
            console.log('particles.js loaded - callback');
        });
    </script>
</body>

</html>