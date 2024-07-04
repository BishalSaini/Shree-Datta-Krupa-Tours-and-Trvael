<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "aniket.walgude28@gmail.com"; // Enter the email address where you want to receive all messages
      $subject = "New message from: $name <$email>";
      $body = "
        <html>
        <head>
          <style>
            body {
              font-family: Arial, sans-serif;
              line-height: 1.6;
              color: #333;
              background-color: #f4f4f4;
              margin: 0;
              padding: 0;
            }
            .email-container {
              width: 100%;
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
              border: 1px solid #ddd;
              border-radius: 5px;
              background-color: #fff;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .email-header {
              text-align: center;
              border-bottom: 2px solid #F35405;
              padding-bottom: 20px;
              margin-bottom: 20px;
            }
            .email-header h2 {
              color: #F35405;
              margin: 0;
            }
            .email-content {
              padding: 10px;
              color: #000;
            }
            .email-content p {
              margin: 10px 0;
            }
            .email-footer {
              text-align: center;
              font-size: 0.9em;
              color: #777;
              margin-top: 20px;
              border-top: 1px solid #ddd;
              padding-top: 20px;
            }
          </style>
        </head>
        <body>
          <div class='email-container'>
            <div class='email-header'>
              <h2>New Message from Your Website</h2>
            </div>
            <div class='email-content'>
              <p><strong>Name:</strong> $name</p>
              <p><strong>Email:</strong> $email</p>
              <p><strong>Phone:</strong> $phone</p>
              <p><strong>Message:</strong></p>
              <p>$message</p>
            </div>
            <div class='email-footer'>
              <p>Regards,<br>$name</p>
            </div>
          </div>
        </body>
        </html>";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: $email" . "\r\n";

      if(mail($receiver, $subject, $body, $headers)){
        // Confirmation email to user
        $user_subject = "Thank You for Contacting Shree Datta Krupa Tours and Travels";
        $user_body = "
          <html>
          <head>
            <style>
              body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
              }
              .email-container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
              }
              .email-header {
                text-align: center;
                border-bottom: 2px solid #F35405;
                padding-bottom: 20px;
                margin-bottom: 20px;
              }
              .email-header h2 {
                color: #000;
                margin: 0;
              }
              .email-content {
                padding: 10px;
                color: #000;
              }
              .email-content p {
                margin: 10px 0;
              }
              .email-footer {
                text-align: center;
                font-size: 0.9em;
                color: #777;
                margin-top: 20px;
                border-top: 1px solid #ddd;
                padding-top: 20px;
              }
            </style>
          </head>
          <body>
            <div class='email-container'>
              <div class='email-header'>
                <h2>Thank You for Contacting Shree Datta Krupa Tours and Travels</h2>
              </div>
              <div class='email-content'>
                <p>Dear $name,</p>
                <p>Thank you for reaching out to Shree Datta Krupa Tours and Travels. We have received your message and will get back to you shortly.</p>
                <p>Here is a copy of your message for your records:</p>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
              </div>
              <div class='email-footer'>
                <p>Best regards,<br>Shree Datta Krupa Tours and Travels Team</p>
              </div>
            </div>
          </body>
          </html>";
        $user_headers = "MIME-Version: 1.0" . "\r\n";
        $user_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $user_headers .= "From: aniket.walgude28@gmail.com" . "\r\n"; // This should be a valid email address from your domain

        mail($email, $user_subject, $user_body, $user_headers);

        echo "Your message has been sent.";
      }else{
        echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message fields are required!";
  }
?>
