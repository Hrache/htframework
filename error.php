<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>ERROR Page</title>
  <style type="text/css">
   .message {
    color: #c60000;
    font-size: 16pt;
    font-family: "Times New Roman", Georgia, Serif;
   }
  </style>
 </head>
 <body>
  <img src="client/images/error.png" />
  <div class="message"><?= $params->getMessage() ?></div>
 </body>
</html>