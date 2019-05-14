<head>

<!-- head template -->
  <title><?php echo $pagetitle ?></title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <?php
  if(signed_in()){
   ?><link rel="stylesheet" type="text/css" href="styles/signedin.css" media="all" /><?php
  }
  else{
    ?><link rel="stylesheet" type="text/css" href="styles/default.css" media="all" /><?php
  }

  ?>
</head>
