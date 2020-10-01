<?php

    function redirection($page) {
        header('Location: ' . SERVER_URL . $page);
    }