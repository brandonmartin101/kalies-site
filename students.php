<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kalie Martin Voice Studio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="css/style.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="page-header">
        <h1>
          Kalie Martin <small>Voice Studio</small>
        </h1>
      </div>
      <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.html">Excellence in Singing</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="about.html">About Me</a>
            </li>
            <li>
              <a href="recordings.html">Recordings &amp; Events</a>
            </li>
            <li>
              <a href="study.php">Prospective Students</a>
            </li>
            <li class="active">
              <a href="students.php">Current Students</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div>
      </nav>
      <div class="row clearfix">
        <div class="col-md-10 col-md-offset-1 column">
          <div>
            <h3>
              Practice Report
            </h3>
            <p id="send-message">
              <?php
                // check if the form was posted
                if($_POST['submit']) {
                  // pull the form values
                  $emailTo = "kaliemartinvoicestudio@gmail.com";
                  $subject = "Student Report: ".$_POST["singerName"]." ".date('l jS \of F Y h:i:s A');
                  $body = $_POST["singerName"]." has just submitted a practice report.
They practiced ".$_POST["numberHoursPracticed"]." hours.
Exercises done: ".$_POST["exercisesDone"]." fdsa
Repertoire they worked on: ".$_POST["repertoireDone"]."
They rated their repertoire: ".$_POST["repertoireScale"]."
They want to work on: ".$_POST["toWorkOn"]."
They had this concern:".$_POST["openQuestion"];
                  $headers = "from: studentreport@kaliemartinvoicestudio.com";

                  // check if the form was filled out correctly.
                  if (mail($emailTo, $subject, $body, $headers)) {
                    echo "The email sent successfully to me. See you at our lesson!";
                  } else {
                    echo "Mail not sent.";
                  }
                }

              ?>
            </p>
          </div>
          <form role="form" method="post">
            <p>
              Please fill out this form before every lesson. This will allow me to review how your week went before you arrive, so that we can maximize our time together.
            </p>
            <div class="form-group">
              <label for="singerName">Full name:</label><input type="text" class="form-control" id="singerName" name="singerName" />
              <label for="numberHoursPracticed">Number of hours practiced:</label><input type="text" class="form-control" id="numberHoursPracticed" name="numberHoursPracticed">
              <label for="exercisesDone"> What exercises did you do to practice your singing technique this week?  Were you successful with these exercises?</label><textarea rows='3' class="form-control" name="exercisesDone"></textarea>
              <label for="repertoireDone">What repertoire did you work on in the past week?</label><textarea rows='3' class="form-control" name="repertoireDone"></textarea>
              <label for="repertoireScale">On the 1-4 scale, how learned are you with each piece of your repertoire? Remember:<br />
                <ol>
                  <li>Learning stage</li>
                  <li>Learned and working to memorize</li>
                  <li>memorized</li>
                  <li>Expression-filled masterpiece</li>
                </ol>
              </label><textarea rows='3' class="form-control" name="repertoireScale"></textarea>
              <label for="toWorkOn">What would you like to work on in your next lesson?  Think about specific things you are finding yourself struggling with.</label><textarea rows='3' class="form-control" name="toWorkOn"></textarea>
              <label for="openFeedback">Any concerns/problems?</label><textarea rows='3' class="form-control" name="openQuestion"></textarea>
            </div>
            <button type="submit" name="submit" value="Send in your report" class="btn btn-default">Submit</button>
          </form>
          <br />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="fixed-side-social-container">
  <a class="social-icon facebook-icon" href="https://www.facebook.com/KalieMartinVoiceStudio" target="_blank" title="Like me on Facebook"></a>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center" id="footer">
      <p class="text-muted">This site built by <a href="http://brandonpmartin.com" class="text-info">Brandon Martin</a> using Bootstrap — &#169;2014 Brandon Martin</p>
    </div>
  </div>
</div>
</body>
<!-- CDN of jQuery, load at end of page load -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Site-specific JS scripts -->
<script type="text/javascript" src="js/scripts.js"></script>
</html>
