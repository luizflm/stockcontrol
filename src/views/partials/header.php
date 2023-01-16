<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Control System</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css" />
</head>
<body>
    <header>
        <div class="header-c"> <!-- header container -->
            <div class="system-name">
                <a href="<?=$base;?>">Stock Control System</a>
            </div>
            <div class="user-area"> <!-- user container -->
                <div class="user-info-area">
                    <div class="user-avatar">
                        <img src="<?=$base;?>/assets/images/outline_account_circle_black_24dp1.png" alt="user">
                    </div>
                    <div class="user-name"><?=$loggedUser->name;?></div>
                </div>
                <div class="user-actions"> <!-- user-actions container -->
                    <div class="user-logout">
                        <a href="<?=$base;?>/logout">Log Out</a>
                    </div>
    
                    <div class="user-config">
                        <a href="<?=$base;?>/edit_user/<?=$loggedUser->id;?>">Settings</a>
                    </div>
                </div>
   
            </div>
        </div>
           
    </header>