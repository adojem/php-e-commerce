<?php
   /** Start session if not alredy started */
   if (!isset($_SESSION)) session_start();

   // Load environment variables
   require_once __DIR__ . '/../app/config/_env.php';
   require_once __DIR__ . '/../app/routing/routes.php';

   new \App\RouterDispatcher($router);
