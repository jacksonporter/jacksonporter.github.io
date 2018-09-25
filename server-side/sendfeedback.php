<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jackson@jacksonporterjp.com";
    $email_subject = "Feedback Form Submission: ";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phonenumber']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $phonenumber = $_POST['phonenumber']; // not required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }

  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Phone Number: ".clean_string($phonenumber)."\n";
    $email_message .= "Feedback: ".clean_string($message)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
if (mail($email_to, $email_subject, $email_message, $headers))
{
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;
      charset=UTF-8">
    <meta name="Keywords" content="Jackson Porter's ePortfolio">
    <meta name="Description" content="ePortfolio for Jackson Porter,
      Software Engineering Student.">
    <link rel="stylesheet" type="text/css" href="css/sendfeedback.css">
    <title>Send Feedback</title>
  </head>
  <body>
    <!-- Header Section Here -->
    <header>
      <div><a href="/"><img class="logol"
            src="sendfeeback/jacksonporterjplogocrop.jpg" alt="Jackson Porter
            (JP) logo"></a>
        <h1 class="pagetitle"><i>Feedback Form<br>
          </i></h1>
      </div>
    </header>
    <!-- Navigation Section Here -->
    <nav>
      <ul>
        <li><strong><a href="/">Home</a></strong></li>
        <li><a href="../resume.html"><strong>Resumé</strong></a></li>
        <li><strong><a href="../contact.html">Contact</a></strong></li>
        <li><strong><a href="../se.html">Software
              Engineering (SE)</a></strong></li>
      </ul>
    </nav>
    <!-- Article Section Here -->
    <article> <br>
      <h2>Thank you for sending your message, 
        <?php
        echo $name;
        ?>
        . At this time, our email services are not working. Please contact us via email at
        <a href="mailto:jackson@jacksonporterjp.com">jackson@jacksonporterjp.com</a>. You can copy and paste the
      following information into your email:</h2><p>
        <?php
        echo "Full Name: ";
        echo $name;
        echo "<br>Email Address: ";
        echo $email;
        echo "<br>Phone Number: ";
        echo $phonenumber;
        echo "<br>Feeback: ";
        echo $message;
        ?></p>
      
    </article>
    <!-- Footer Section Here -->
    <footer>
      <hr class="article"> <br>
      <a href="https://www.vim.org"><img class="logol"
          src="sendfeedback/vimlogo.png" alt="VIM Logo" height="60"></a><a> </a>
      <div class="centerarticle"> <a>Website edited with the VIM text
          editor<br>
          Image by </a><a
          href="//commons.wikimedia.org/wiki/User:D0ktorz"
          title="User:D0ktorz">User:D0ktorz</a><a
          href="//commons.wikimedia.org/wiki/File:Vimlogo.png"
          class="image"><br>
        </a> reworked in SVG, <a
          href="http://www.gnu.org/licenses/gpl.html" title="GNU General
          Public License">GPL</a>, <a
          href="https://commons.wikimedia.org/w/index.php?curid=1228427">Link</a><br>
        &nbsp;<br>
      </div>
      <a href="https://www.seamonkey-project.org/"><img class="logol"
          src="sendfeedback/seamonkeylogo.png" alt="Mozilla SeaMonkey Logo"
          height="60"></a><a> </a>
      <div class="centerarticle"> <a> Website edited with Mozilla
          SeaMonkey<br>
          Image by </a><a
          href="//commons.wikimedia.org/wiki/User:D0ktorz"
          title="User:D0ktorz">User:D0ktorz</a><a
          href="//commons.wikimedia.org/wiki/File:Vimlogo.png"
          class="image"><br>
        </a> reworked in SVG, <a
          href="http://www.gnu.org/licenses/gpl.html" title="GNU General
          Public License">GPL</a>, <a
          href="https://commons.wikimedia.org/w/index.php?curid=1228427">Link</a><br>
        &nbsp;<br>
      </div>
      <a href="https://code.visualstudio.com/"><img class="logol"
          src="sendfeedback/vsclogo.png" alt="Visual Studio Code Logo"
          height="60"></a><a> </a>
      <div class="centerarticle"> <a> Website edited with Visual Studio
          Code <br>
          <br>
        </a><a
          href="https://commons.wikimedia.org/w/index.php?curid=63959850">Link</a><br>
        <strong><br>
        </strong>
      </div>
        <hr class="article"> <br>
        <strong>Jackson Porter ePortfolio</strong> <br>
        <a href="/">Home</a> | <a href="../resume.html">Resumé</a> | <a
        href="../contact.html"> Contact</a> | <a
          href="../se.html"> Software Engineering (SE)</a>
        &nbsp;<br><br>
        <strong>Content on this site is NOT to be copied unless
          permission is given by owner.</strong><br>
        <strong></strong>
    </footer>
  </body>
</html>

<?php
        

}
else
{
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta http-equiv="content-type" content="text/html;
        charset=windows-1252">
      <meta name="Keywords" content="Jackson Porter's ePortfolio">
      <meta name="Description" content="ePortfolio for Jackson Porter,
        Software Engineering Student.">
      <meta http-enquiv="content-type" content="text/html; charset=UTF-8">
      <link rel="stylesheet" type="text/css" href="css/sendfeeback.css">
      <title>Send Feedback</title>
    </head>
    <body>
      <!-- Header Section Here -->
      <header>
        <div><a href="/"><img class="logol"
              src="sendfeeback/jacksonporterjplogocrop.jpg" alt="Jackson Porter
              (JP) logo"></a>
          <h1 class="pagetitle"><i>Feedback Form<br>
            </i></h1>
        </div>
      </header>
      <!-- Navigation Section Here -->
      <nav>
      <ul>
        <li><strong><a href="/">Home</a></strong></li>
        <li><a href="../resume.html"><strong>Resumé</strong></a></li>
        <li><strong><a href="../contact.html">Contact</a></strong></li>
        <li><strong><a href="../se.html">Software
              Engineering (SE)</a></strong></li>
      </ul>
    </nav>
      <!-- Article Section Here -->
      <article> <br>
        <h2>Thank you for sending your message, 
          <?php
          echo $name;
          ?>. Your message couldn't be sent: SERVER ERROR. Please contact us via email at
          <a href="mailto:jackson@jacksonporterjp.com">jackson@jacksonporterjp.com</a>. You can copy and paste the
        following information into your email:</h2><p>
          <?php
          echo "Full Name: ";
          echo $name;
          echo "<br>Email Address: ";
          echo $email;
          echo "<br>Phone Number: ";
          echo $phonenumber;
          echo "<br>Feeback: ";
          echo $message;
          ?></p>
        
      </article>
      <!-- Footer Section Here -->
      <footer>
      <hr class="article"> <br>
      <a href="https://www.vim.org"><img class="logol"
          src="sendfeedback/vimlogo.png" alt="VIM Logo" height="60"></a><a> </a>
      <div class="centerarticle"> <a>Website edited with the VIM text
          editor<br>
          Image by </a><a
          href="//commons.wikimedia.org/wiki/User:D0ktorz"
          title="User:D0ktorz">User:D0ktorz</a><a
          href="//commons.wikimedia.org/wiki/File:Vimlogo.png"
          class="image"><br>
        </a> reworked in SVG, <a
          href="http://www.gnu.org/licenses/gpl.html" title="GNU General
          Public License">GPL</a>, <a
          href="https://commons.wikimedia.org/w/index.php?curid=1228427">Link</a><br>
        &nbsp;<br>
      </div>
      <a href="https://www.seamonkey-project.org/"><img class="logol"
          src="sendfeedback/seamonkeylogo.png" alt="Mozilla SeaMonkey Logo"
          height="60"></a><a> </a>
      <div class="centerarticle"> <a> Website edited with Mozilla
          SeaMonkey<br>
          Image by </a><a
          href="//commons.wikimedia.org/wiki/User:D0ktorz"
          title="User:D0ktorz">User:D0ktorz</a><a
          href="//commons.wikimedia.org/wiki/File:Vimlogo.png"
          class="image"><br>
        </a> reworked in SVG, <a
          href="http://www.gnu.org/licenses/gpl.html" title="GNU General
          Public License">GPL</a>, <a
          href="https://commons.wikimedia.org/w/index.php?curid=1228427">Link</a><br>
        &nbsp;<br>
      </div>
      <a href="https://code.visualstudio.com/"><img class="logol"
          src="sendfeedback/vsclogo.png" alt="Visual Studio Code Logo"
          height="60"></a><a> </a>
      <div class="centerarticle"> <a> Website edited with Visual Studio
          Code <br>
          <br>
        </a><a
          href="https://commons.wikimedia.org/w/index.php?curid=63959850">Link</a><br>
        <strong><br>
        </strong>
      </div>
        <hr class="article"> <br>
        <strong>Jackson Porter ePortfolio</strong> <br>
        <a href="/">Home</a> | <a href="../resume.html">Resumé</a> | <a
        href="../contact.html"> Contact</a> | <a
          href="../se.html"> Software Engineering (SE)</a>
        &nbsp;<br><br>
        <strong>Content on this site is NOT to be copied unless
          permission is given by owner.</strong><br>
        <strong></strong>
    </footer>
    </body>
  </html>
  
  <?php
}
}
?>