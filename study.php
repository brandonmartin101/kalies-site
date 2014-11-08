<?php
  // check if the form was posted
  if($_POST['submit']) {

    // verify CAPTCHA form
    require_once('recaptchalib.php');
    $privatekey = "6LdcY_0SAAAAAJgcrpdw2LSSM9q0hhESqmZc00KF";
    $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
      // What happens when the CAPTCHA was entered incorrectly
      $message = "<p id='send-message'>The reCAPTCHA wasn't entered correctly. Go back and try it again.</p>";
      // die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
      //    "(reCAPTCHA said: " . $resp->error . ")");
    } else {
      // successful verification

      // pull the form values
      $emailTo = "kaliemartinvoicestudio@gmail.com";
      $subject = "Prospective Student: ".$_POST["firstName"]." ".$_POST["lastName"]." ".date('l jS \of F Y h:i:s A');
      //populate message body
      $body = $_POST["firstName"]." ".$_POST["lastName"]." has asked to be contacted about lessons.
Email address: ".$_POST["emailAddress"]."
Phone number: ".$_POST["phoneNumber"]."
Preferred contact method: ".$_POST["preferContact"]."
Voice type: ".$_POST["voiceType"]."
Questions: ".$_POST["questions"];
      $headers = "from: prospectivestudent@kaliemartinvoicestudio.com";

      // check if the email sent correctly.
      if (mail($emailTo, $subject, $body, $headers)) {
        $message = "<p id='send-message'>The email sent successfully to me. I'll get in touch with you soon!</p>";
      } else {
        $message = "<p id='send-message'>Mail not sent for some reason. Try again?</p>";
      }
    }
  } else {
    // form hasn't been submitted
    $message = "<p>Fill out the form below to get in touch with Kalie.</p>";
  }

?>

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

  <!-- script to customize reCAPTCHA -->
  <script type="text/javascript">
  var RecaptchaOptions = {
    theme : 'white'
  };
 </script>

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
            <li class="active">
              <a href="study.php">Prospective Students</a>
            </li>
            <li>
              <a href="students.php">Current Students</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="row clearfix">
        <div class="col-md-8 column">
          <h3>
            Prospective Students
          </h3>
          <p>
            Kalie offers weekly 30, 45, or 60 minute voice lessons, depending on the level and needs of each student.  Her lessons focus on improving technique through vocal exercises, assigned repertoire, and goal setting.  She understands that each student is unique.  Because of this, each lesson is catered towards that specific student's needs.  They will be coached in technique, language diction, and stage presence/character development.
<br /><br />
            Practice is an essential role towards improvement while taking lessons.  Kalie sets high expectations for each of her students, challenging them to learn about themselves and their voice.  Lessons are a partnership set between a teacher and a student.  As Kalie works to improve the voice of the student by giving them the proper tools, she expects each student to be invested in their learning through practicing.  Now this may sound dauntingly serious, but spending time rehearsing and preparing for each lesson is just like learning any skill.  The only way to improve is to try, fail, and then try again until you reach an understanding of a concept.
<br /><br />
            Kalie works to make the learning process more simple, fun, and effective for each student.  To learn more about her and what she can offer you, please contact her by filling out the left-most messaging form.
          </p>
          <h3>
            Lesson Contracts
          </h3>
          <p>
            Before beginning lessons, each student is asked to fill out a <a href="" target="_blank">Lesson Contract</a>.  This lesson contract insures that the expectations between student and teacher are clear.  It is a place for you to have all information you need on hand.  The contract outlines all expectations; cancellation policies, payment details, and practice report details.  Please read and sign the form before your first lesson, where Kalie will review it with you.
          </p>
        </div>
        <div class="col-md-4 column">
          <?php echo $message; ?>
          <form role="form" method="post">
            <div class="form-group">
              <label for="firstName">First name:</label><input type="text" class="form-control" id="firstName" name="firstName" />
              <label for="lastName">Last name:</label><input type="text" class="form-control" id="lastName" name="lastName" />
              <label for="emailAddress">Email address:</label><input type="email" class="form-control" id="emailAddress" name="emailAddress" />
              <label for="phoneNumber">Phone number:</label><input type="text" class="form-control" id="phoneNumber" name="phoneNumber" />
              <label for="preferContact">Which contact method do you prefer?</label><br />
              <p>
                <input type="radio" name="preferContact" value="email"> Email
                <input type="radio" name="preferContact" value="phone"> Phone
              </p>
              <label for="voiceType">Voice type:</label>
              <p>
                <input type="radio" name="voiceType" value="soprano"> Soprano
                <input type="radio" name="voiceType" value="alto"> Alto
                <input type="radio" name="voiceType" value="tenor"> Tenor
                <input type="radio" name="voiceType" value="bass"> Bass<br />
                <input type="radio" name="voiceType" value="unknown"> Don't know
              </p>
              <label for="questions">Questions for me?  Tell me what you are looking for in a voice teacher.</label>
              <textarea rows='3' class="form-control" name="questions"></textarea><br />
              <label for="captchaDisplay">I know it's a pain, but please fill out this CAPTCHA form. It helps protect us from evil internet robots.</label>
              <?php
                //code to insert reCAPTCHA form at the end of the report
                require_once('recaptchalib.php');
                $publickey = "6LdcY_0SAAAAAItgUyVoZIDWpJRaYzHA2pTpFB1l";
                echo recaptcha_get_html($publickey);
              ?>
              <br />
              <button type="submit" name="submit" value="Send email" class="btn btn-primary">Send email</button>
            </div>
          </form>
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
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56556001-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
