
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
              <form class="form-horizontal" name="frmsearch" action="connect.php" onsubmit="return validateForm()" method="get">
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Wine Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="zaidon" name="winename" id="txtwinename" placeholder="Wine Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Winery Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="hello" name="wineryname" id="txtwineryname" placeholder="Winery Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Region</label>
                    <div class="col-lg-10">
                      <select id="cboregion" name="region">
                        
                        <?php
                          require_once('db.php');
                          if(!$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME)) {
                            echo 'Could not connect to mysql on ' . DB_HOST . '\n';
                            exit;
                          }
                          
                          $result = mysqli_query($dbconn,"Select region_name from region;");
                          
                          while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['region_name'] . "'>" . $row['region_name'] . "</option>";
                          }
                          
                          ?>     
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" name="grapevariety" class="col-lg-2 control-label">Grape Variety</label>
                    <div class="col-lg-10">
                      <select id="cbograpevariety" name="grapevariety">
                        
                        <?php
                          require_once('db.php');
                          if(!$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME)) {
                            echo 'Could not connect to mysql on ' . DB_HOST . '\n';
                            exit;
                          }
                          
                          $result = mysqli_query($dbconn,"SELECT variety FROM grape_variety;");
                          
                          while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['variety'] . "'>" . $row['variety'] . "</option>";
                          }
                          
                          ?>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label"> Min Range of Year</label>
                    <div class="col-lg-10">
                      <select id="cbominrangeofyear" name="minrangeofyear">
                        
                        <?php
                          require_once('db.php');
                          if(!$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME)) {
                            echo 'Could not connect to mysql on ' . DB_HOST . '\n';
                            exit;
                          }
                          
                          $result = mysqli_query($dbconn,"SELECT year FROM wine group by year;");
                          
                          while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                          }
                          
                          ?>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Max Range of Year</label>
                    <div class="col-lg-10">
                      <select id="cbomaxrangeofyear" name="maxrangeofyear">
                        
                        <?php
                          require_once('db.php');
                          if(!$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME)) {
                            echo 'Could not connect to mysql on ' . DB_HOST . '\n';
                            exit;
                          }
                          
                          $result = mysqli_query($dbconn,"SELECT year FROM wine group by year;");
                          
                          while($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                          }
                          
                          ?>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Minimum wines in stock</label>
                    <div class="col-lg-10">
                      <input type="text" name="minwinestock" value="2" class="form-control" id="txtminwinestock" placeholder="Minimum wine stock">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Minimum wines ordered</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" value="3" name="minwineorder" id="txtminwinesordered" placeholder="Minimum wines ordered">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Cost Range (Min - Max)</label>
                    <div class="col-lg-10">
                      <input type="text" name="mincostrange" value="4" class="form-control" style="float: left;" id="txtmincost" placeholder="Min Cost">
                      <input type="text" name="maxcostrange" value="5" class="form-control" id="txtmaxcost" placeholder="Max Cost">
                    </div>
                  </div>
                  <div style="display: none;color: red;margin-bottom: 5px;" id="lblerrordescription" role="alert">The data you have entered is incorrect. Try again.</div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  </div>
              </form>
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
