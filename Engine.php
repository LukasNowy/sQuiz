<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <script src="jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="engine.css">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>

    <link href="bootstrap-toggle-master/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>

    

</head>

<body id="body" onload="load()">


        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "squiz";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT a_id, Angabe, fragen.Antwort AS 'r_antwort', antworten.antwort AS 'ant' FROM antworten JOIN fragen USING (f_id) JOIN kategorie USING(k_id) WHERE kategorie.k_id = 1 GROUP BY Angabe";
        $result = $conn->query($sql);
        $zaehler = 0;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $frage[$zaehler] = $row["Angabe"];
                $richtig[$zaehler] = $row["r_antwort"];
                $ant[$zaehler] = $row["ant"];

                $zaehler++;
                
                
            }

            
        } 
        
        else 
        {
            echo "0 results";
        }
       

        $conn->close();
        ?>




    <div id="menue">
        <div id="logo_div">
            <p id="logo">sQuiz</p>
        </div>

        <div id="r_menue">
            <div class="btn-group" role="group" id="navbar">
                <button type="button" class="btn btn-default" onclick="location.href='Startseite.html'">HOME</button>
                <button type="button" class="btn btn-default" onclick="location.href='Kategorien.html'">KATEGORIEN</button>
                <button type="button" class="btn btn-default" onclick="location.href='Ueber_Uns.html'">ÜBER UNS</button>
            </div>
        </div>
    </div>

    <div id="container">
        <div class="row">

            <div id="d_left" class="col-lg-3">

                <center>
                    <p id="t_left">Korrekte Antworten anzeigen?</p>
                    <input data-toggle="toggle" data-on="An" data-off="Aus" type="checkbox" id="toggle-btn">
                </center>

                <script>
                    $(function () {
                        $('#toggle-two').bootstrapToggle({
                            on: 'An',
                            off: 'Aus'
                        });
                    })
                </script>
            </div>


            <div id="d_middle" class="col-lg-6">
                <p id="Frage"></p>

                <div id="ant1" class="antwort" name="1">
                    <p class="ant_text ant1" ></p>
                </div>
                <div id="ant2" class="antwort" name = "2">
                    <p class="ant_text ant2" ></p>
                </div>
                <div id="ant3" class="antwort" name = "3">
                    <p class="ant_text ant3" ></p>
                </div>
                <div id="ant4" class="antwort" name = "4">
                    <p class="ant_text ant4" ></p>
                </div>


                <div id="start">
                    <button class="btn btn-danger" id="btn_weiter" onclick="prüfen()">WEITER</button>
                </div>

                <div id="div_star">
                    <img src="img/star_icon.png" width="40">
                </div>

                <div id="div_punkte">
                    <p>0</p>
                </div>

            </div>

            <div id="d_right" class="col-lg-3">
                <p id="r_text">Frage 3 von 25</p>
            </div>
        </div>
    </div>

    <script src="engine.js"></script>

    
    <script language="Javascript">
        
       
        var richtig = <?php echo json_encode($richtig); ?>;
        var anz = <?php echo json_encode($zaehler); ?>;
        var frage = <?php echo json_encode($ant); ?>;
        var selected;
        var akt_frage = 0;

        function load()
        {
            $("#Frage").html(frage[akt_frage]);
            $("#r_text").html("Frage " + akt_frage + " von " + anz);
        }

        function prüfen()
        {
            if(richtig[akt_frage] == selected)
            {
                alert("Richtig");
                akt_frage++;
            }
        }

        $(".antwort").click ( function() {
            selected = this.getAttribute('name');
        });

    </script>


</body>

</html>