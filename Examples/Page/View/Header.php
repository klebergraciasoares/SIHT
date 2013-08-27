<!DOCTYPE html>
<html ng-app lang="pt">
  <head>
    <title>Project Name X</title>
    
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/local.css" rel="stylesheet">

    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/bootstrap.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.locale.pt-br.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/local.js"></script>

  </head>

  <body>   
    
    <nav id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="padding:7px" href="./"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH4AAAAjCAYAAABSM76hAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAACxEAAAsRAX9kX5EAAAwSSURBVHhe7VoLcBXVGb539+7uObs3XB6iyMOUiE7Ko7XCEK06WEEjFsnwUtSJWp7hpcgzgCGBkAeJPIMiRUoH2lBnQKidStOCRlOhttaijE1btICQDjq8DIQCeWy//+y5t0nuvcnNC8dwv5l/7t5z/vPv2fOd85//P7uuKKKIIooooggBPV2/3SwwE11zXZYsiqK9w8qxBpgrzYvWq5bNl/ISV6yro6yKoj2DZ/Kp1suWbeaZtpll2mo3dZysahYwkYaZq81kMxuyzkzWs/R4WdUwVrk4X82TzHzZVra3cq1+UiOKVsMUl8Zz+HJrHYhfCeJXgPi71RWytlkAYR94N3ltsul9zWvrT+u/QrHu1IZBusuDfuy1XrFEO794t3htY4KxBxrMUWwd+HJ8nbxrvN+Vf68jgHAQvRir65/4rTZzQDpJrpCrIO8vPItvxcotYelsjmwVEXg2f9s/kawCy9Ye1d5FcSenNjR86b6OuH8V7uf0QfbHWo/2o7QDUOnqaLYcRp5xK/r2BfWRp/FtKGp4UrYXdMrt5MODvyvc+6q6Ay2EVj4IEKsOA0//1QR1uGzeKPgKEL8G7Yg42NB+rP0RxQ0SD7jZArZFTrxAXwTxo7US1N/gqLUc2IpeIM9ivmTa2OZsNVZ9RFa1b2Af3ylIp8HFIFtr67pX+i/Il/XwCrY6WM2VzRuFZ4jnXvU2dYMap25Wb1W3KJ2VF1Hsc2obRIwSpzynDlJ/iS2nimKOtiAez79YTGjYJ+KV3kqTPNq3EjyX3xVwp0QuSMUeet6T6PlUu197Xxuu/cmYbJyAq3fq/cQPVNdIE5HCA9Eg5Ebp1w2JCMZQIw73v9RmxGebC/3Em8tNW4lV5sqq9gs8dDrtu4JQuDrPUE8piudBBkJiIb0g/bVx2qvCK6xx9Ny3uvNQfk3AC3j3APEUIySJGEGhupiCmC7GaiPOyDHifGt8zUo7rSy4ehoDP/GdlZmyqv2CZbP1YrZjFSOwsVG0BCIGtQ6GuLx8Pj9gZpo08GdR8hOnIhgsl93C8/kWnsf3ITKvK/l8H2y8DkcfMUksk/UKEI9tR39SP8CeZwvR52J4rDPYgqpIcP0VX8mLoP+4bBoWsPcw4pk9mPD7cP2ZIJ0mPzwbT+X/Cuo3BDr7cM/t1oLWTydrampaLViNCNg7lwRWPMjXJ+ivyqpQ6OmyXLPxOwlykygJAQzeTu9mpG8I6IKEvEaaacPhj5TqjaI28SLOyDJr/PZEGW1BcpvyB6A8nReiqeFYqIuY7JgusFNBfRE20I4IF7YpgPT3NYR4f+q12UJ2GGY6O9ZaBtu2PSB9J37PX716ddvRo0cjO+NoKfhsPkg8uH//RlSP9OsTXK+FN3gKbrC/a1boAQwHrOjdAeIpUKTgkAiiwaXIeQGvxi4/Xqo3iiDiqZ/0i/9+ooXQfagOQlE6vMImaaIOYlJBfHYt4tGnIOJlv+uIn/ip7CLM3OdYaxlAegykEsQLVFZWXqqoqMj76KOP2t4D8Hm80NqIASDy6eFBfr2B/DcGuRDubpRs0iC0sdoAI8X4qzHdKDemGhdw/TVfwq8K4oj4hbwKxD8m1RtFEPFEDgjnGdzWx+tfeh7yfKyN0D7EvU6JSUx9xi9fjtSsn3q/NFMHRjJC1hnGCWOaUY7+XBa2qR0mAJvBytHnYJmGZ0k2zrh7uXfDxG2OpZZj7969M44fP14huRfA6i+7cOHCc+PGjWvDMwWfqxObzoqsl0A23L61Wq5QGgiaDCDLn9qh7IA+Ve8rWzaEWyDkzsdAHsJg7hOxRCsQTxOSpbAKdzdBwBOQ/pDekDtAzh4xYaUespLVKA8HCmAfNJ4yflE7uHPHuF9G+aMQmuijawk9SxKE3HHEWUkkiI+Pf7CwsPCt06dPS+odYAJ8jDK6b5vB50nwLMGM/pjNYZf4Ml535UtvYG3A9TKzjFIs2S4iIPDaJCZOC4knd2tMMs6geC3kdqFQC2wW+6F/1dP9PI943kBxg6sGdueJSSmJRzpHccw3ATMxMTG5qKjozyBcUu/g8uXLRWfOnLlb6rUJKH0bqfRQFqmD1Z9rj2olcKFldGbv3wtpb0TZDuhFPOsRN7zWKsRTOjdc+wDFtMKDQDGJmKQQup+WqL2JYtOpDQ0Ei6n1iG9yHg9uvJD4SAR7+o2yWTh0TUlJmXvw4MHPoR9AdXW1fenSpa1HjhzpI/WaDwzUTQiEhvlSfaGOUGmlUPR+p2egZwH2zHJaTbQVsHmMUrpIXL5AqxEPgrTR2nsoDpkO4nm+V4f4h7Vfo7jNiUdQliT5aRSlpaVvoUmDfZLok5GRkX/48OHj8ADVsjkFgOVXrlxZgctuUq9psNKtG+ESj4r37st4KXblm2VVSCBA2y4GiMhL5TUur9gDI0IrEx/25O6bIh5EPO7Q0jj2799/Ek2CtqlwmDlz5rPY58tl8wB2795d1L179y5SLXKAjJHigWk/JBeapDX4+hX79H5/+sPni5TsSVnVKNo78ceOHeu7Y8eOP6xbt+4fBQUFn4YT1JdOnDhxP5o0Sjy2hJsg+ZBzkmuB4uLiihEjRpDXmwVpetrHsth4fwQs0p9M/jVLZcn183ZztXkzBvIVa5WjS4NkTDDI1Sc6Go0jiHjdFfHHHZhwPUMQH3Kmy6+Hmk/8MhDfQ3lBVjUV5HoHQGgLDCeUgdB7/7CftIFoAzIHckpyLQCXXzl58uS/QSUdQvdpXmZRh3h5uCJSuWzzc8gensW3IXcvwsCfFaSRHg0o2ngGeN6Gie84lhoHBnejGFwifgGId9KliEAfSQSIJ880UitGMb3oCUKHzA70bt3pJ02SodouWRUW4vSS+kbt4P2UfsoCWRUE9H8gz+ObzbXmO/xFTileqwJkj4d8KrkWKCsrs9PS0o4wxtZB5V5Iy3J7EP9YgFC/UO5OEwDkUp1w7bQSaGLQwCOiR6T/FZpPhgSd6UNvBDzEG3wl/x0mTUBQflLYIfvLzRp4lkO163k+3wsC0mp7m67pXb2wk492xehbtWgLGzyNn8X1HraI3SNVncmx0lyP+veFnl93Cf8Sv6+bqSbl7CFhZpjPCOLp+WliLuWfic/PcqxhkAfQv3GQDCyAYv+EorQWcVGlK9Z1hzTTIoDf+0H4Ow7VDioqKuyNGzf+JzY2djtURkBihHJLYS1C6kNk0udNRLQUkQfXOsIUH2HQAQeu4TopMFkKCYqqKUOATiUNSm17wiaR7rcJUurXC0GQqT+jp0lztD3k+Y9+A30hG5RZoM+g4rwr3tkrobtZ6JLHqq1Lkxh22VJ20tXZ1VMYrgfzGbMbX8HPizeP1IbOL9Af+hXXuL8gm/ohJ5UgfiG3EeDSe4tmA/yqSNPWOFT/H7t27TqXkJDwG6g8DQn7XqTZ0Efrc4ynjL9r92kfag9p7xnTjJNYJVXC7UmS2BxWoY3SvlB6KrRfUkc6iMb1YC5GLJBjVgniabCaIkT8JniTB7QimBL7n5lpbhRkUl19fSI+jduKTyHPQ1/5FIZ9MURZyzyQpLvGkm4oIGaZIFaz/wRPEhwQWiCYVMIzYDKwmeyK0luhIC3BsdA8IFrvILkWKCkp+W9SUhLFMM9DmnRI1hzQESS9aqR0rr/+hL5VPCANQKZpuzu6f4byByE9IA1CT8ZEmmWcYtPZRSPFiEymQWYYF7VHtDKQQyteuHuWxHqxSextcXZOOlJf2J5onFPiFRqgIaRrjDX6GFOM9+vo4lfoPmucVeKU30NtEOmGg/YjbQqbxY5SgCc8hZw4IvDN4DbqrmhjtBNKf2Uf1CnAuhPS0qNb96FDh3IRqZ9PSUn5BP+XQ74vaq414DZTAsRTetOryUeYd0EoXaPInVZZJEL6lCXUT08obaNv4Kjer0t2KbCiAVIhflBUTXthfV06b6CJHfydQTD6UlSv/kDd6knwvOkZ7Pmt0lfZ6b7BvQF1NA7URzo1rH3floICVbJLgVurfj3cJCCan1V7xV8X36AFgyJnOs2ktJF+vzlCrhWwX6aI17QU3KwA8d2ug2/QosB+OduI4+n8FO1v+hj9HIoi/mgiim87urrucfd2r8fVfEjzXgZE8a0FBTCt+sFBFFFE0aZwuf4H8I4BcaxK3TIAAAAASUVORK5CYII=" style="height:35px;"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">            
            <li class="<?php echo $this instanceof StartController ? "active" : "" ?>"><a href="./Start">Start</a></li>
            <li class="<?php echo $this instanceof StructureController ? "active" : "" ?>"><a href="./Structure">Structure</a></li>
            <li class="disabled"><a href="Download.php">Download</a></li>
            <li class="disabled"><a href="#">Docs</a></li>
            <li class="disabled"><a href="#">Demo</a></li>
            <li class="<?php echo $this instanceof GeneratorController ? "active" : "" ?>"><a href="./Generator">Generator</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li class="disabled"><a href="./">Contact</a></li>
          </ul>
        </div>      
      </div>
    </nav>

    <div class="container">          
    