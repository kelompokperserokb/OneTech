<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Asset/css/active.css">
</head>

<body>
    <?php if($error == false) {
        echo '
        <table class="table-kepala" width="100%">
            <tr>
                <td align="center">
                    <table width="600" >
                        <tr>
                            <td class="kepala">
                                <span>One</span> Tech
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h2>'.$param1.'</h2>
                                <p>'.$param2.'</p>
                                <br><br><a href='.base_url().'>Click here to back home</a>
    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br> Regards,
                                <br> OneTech
                            </td>
                        </tr>
                        <tr>
                            <td class="kaki">
                                © 2019 OneTech. All rights reserved.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>';
    } else {
        echo $param1;
    } ?>
</body>