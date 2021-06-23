<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-games
 -->

<?php

    // Unset the session and delete all values in $_SESSION super global variable
    session_start();
    session_unset();
    session_destroy();

    header('location: ./login.php');
    exit;