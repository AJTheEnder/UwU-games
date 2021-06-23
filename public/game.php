<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-games
 -->

<?php

    // Include database handler
    require_once __DIR__ . '/../db/dbh.php';
    // Include model
    require_once __DIR__ . '/../model/gameModel.php';

    // Send to a 404 error if the specified game is not in th database
    if ($game === null) {
        // Include 404 page view
        require_once __DIR__ . '/../view/error404.php';
    }
    else {
        // Include view
        require_once __DIR__ . '/../view/gameView.php';
    }
