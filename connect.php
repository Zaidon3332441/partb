
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Assignment 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
        
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="http://54.79.105.226/assign1/" class="navbar-brand">Assignment 1 - Zaidon Al-Suhayli</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <!--<ul class="nav navbar-nav">
            <li>
              <a href="#">Search</a>
            </li>
          </ul>-->
        </div>
      </div>
    </div>
    
    <br/>
    <br/>
    
    <div class="container">

      <!-- Navbar
      ================================================== -->
      <div class="bs-docs-section clearfix">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="navbar">Search</h1>
            </div>

            <div class="bs-component">
              
              <?php
                require_once('db.php');
                if(!$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME)) {
                    echo 'Could not connect to mysql on ' . DB_HOST . '\n';
                    exit;
                }

                // sql logic
                $wine_name = $_GET["winename"];
                $winery_name = $_GET["wineryname"];
                $region = $_GET["region"];
                $grape_variety = $_GET["grapevariety"];
                $minrange_year = $_GET["minrangeofyear"];
                $maxrange_year = $_GET["maxrangeofyear"];
                $min_wine_stock = $_GET["minwinestock"];
                $min_wine_order = $_GET["minwineorder"];
                $min_cost = $_GET["mincostrange"];
                $max_cost = $_GET["maxcostrange"];
                
                $result = mysqli_query($dbconn,"select w.wine_name, gv.variety, w.year,
                                       wr.winery_name, r.region_name from wine as w,
                                       grape_variety as gv, winery as wr,
                                       wine_variety as wv, region as r,
                                       inventory as v, items as i
                                       where w.winery_id=wr.winery_id AND
                                       w.wine_id=wv.wine_id AND wv.variety_id=gv.variety_id
                                       AND r.region_id=wr.region_id AND w.wine_id=v.wine_id
                                       AND i.wine_id=w.wine_id AND w.wine_name like '%" . $wine_name . "%' AND wr.winery_name like '%" . $winery_name . "%' AND r.region_name = '" . $region . "' AND w.year between " . $minrange_year . " AND " . $maxrange_year . ";");
                
                echo "<table class='table' border='1'>
                <tr>
                <th>Wine Name</th>
                <th>Grape Varieties</th>
                <th>Year</th>
                <th>Winery</th>
                <th>Region</th>
                </tr>";
                
                if (mysqli_num_rows($result)==0) {
                    echo "</table>";
                    echo "<h4 style='text-align:center'>Your search did not return any data.</h4>";
                    exit;
                }
                
                while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['wine_name'] . "</td>";
                  echo "<td>" . $row['variety'] . "</td>";
                  echo "<td>" . $row['year'] . "</td>";
                  echo "<td>" . $row['winery_name'] . "</td>";
                  echo "<td>" . $row['region_name'] . "</td>";
                  echo "</tr>";
                }
                
                echo "</table>";
                
                ?>
              
            </div>

          </div>
        </div>
      </div>
      
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validation.js"></script>
  </body>
</html>


