<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            #header{
                height: 150px;
                background: red;
            }
            #footer{
                height: 150px;
                background: blue;
            }
            #content{
                height: 150px;
                background: yellow;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <h2><?php echo $title; ?><h2>
        </div>
         
        <div id="content">
                <tr>
                    <td>username</td>
                    <td>password</td><br>
                </tr>
            <?php foreach($user as $data){ ?>
                <tr>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td><br>
                </tr>
            <?php } ?>
        </div>
         
        <div id="footer">
            FOOTER
        </div>
    </body>
</html>