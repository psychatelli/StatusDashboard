<!-- <!DOCTYPE html> -->

  

 <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/charts/RepsBilling/repsBillingData.php";
    include_once($path);
  ?>




  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <link type='text/css' rel="stylesheet" href="css/styles.css"/>

      <!-- Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
       
        <?php 
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/charts/repChartObjects.php";
            include_once($path);
        ?>

    </head>

    <body>

        <div class="Wrapper"> 


        <?php include 'nav.php';?>


      <div class="row"> 
        <div class="DashboardWrapper col s12"> 




        <div class="card col s12 m3">
          <div class="card-content">
              <div class="row">
                  <div class="col s12" style="margin-bottom: 20px;">
                    <ul id="tabs-swipe-demo" class="tabs" >
                      <li class="tab col s4"><a class="active" href="#test1">Day</a></li>
                      <li class="tab col s4"><a href="#test2">Week</a></li>
                      <li class="tab col s4"><a href="#test3">Month</a></li>
                    </ul>
                  </div>

                  <div id="test1" class="col s12">
                    <div id="rep1Div" style="height: 370px; width: 100%;"> </div>
                  </div>

                  <div id="test2" class="col s12">
                    This si item
                  </div>

                  <div id="test3" class="col s12">
                    This si item
                  </div>


              </div>
          </div>
        </div>


       
        

        </div>
      </div>




    </div> <!--  END wrapper -->









<!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    

<!-- Canvas Script -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




<!-- START Tabs Script -->
<script>
 $(document).ready(function(){
    // $('.tabs').tabs();
    $('.tabs').tabs({ 'swipeable': true });

  });
       


</script>
<!-- END Tabs Script -->

<!-- <script type="text/javascript" src="js/charts.js"></script> -->



<script type="module">
  // import { CompanyBilling } from './js/CompanyBilling.js';
  // import { Chart1 } from './js/chart1.js';
  // import { Chart2 } from './js/chart2.js';
  // import { Chart3} from './js/IndividualMonthlyBilled.js';
  // Chart1();
  // Chart2();
  // Chart3();

</script>

<script type="module">
  // import { IndividualBilledWeekly } from './charts/IndividualBilledWeekly/individualBilledWeekly.js';
  // IndividualBilledWeekly();




</script>

 <!-- START Side Nav Script -->
      <script>
        (function($){
          $(function(){
            $('.sidenav').sidenav();
          }); 
        })(jQuery); 
      </script>
 <!-- START Side Nav Script -->


    </body>
  </html>