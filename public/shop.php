<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

    require_once __DIR__ . '/../db/dbh.php';
    require_once __DIR__ . '/../model/shopModel.php';
    $gameArray = getGames($dbh, "MostPopular", "");
    require_once __DIR__ . '/../view/shopView.php';
