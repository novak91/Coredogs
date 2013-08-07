<html>
    <head>
        <title>Server Time</title>
    </head>
    <body>
        <p>The current server time is
            <?php
            print date('D G:i:s');
            ?>
        </p>
        <p>The IP adress of the browser is
            <?php
            print $_SERVER['REMOTE_ADDR'];
            ?>
        </p>
        <p>The IP adress of the server is
            <?php
            print $_SERVER['SERVER_ADDR'];
            ?>
        </p>
        <p>
            <?php
            print '...well it makes sense';
            ?>
        </p>

    </body>
</html>