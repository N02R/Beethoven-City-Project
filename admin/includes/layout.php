<?php
/**
 * BCS Admin Layout System
 */

if (!defined('CMS_ADMIN')) {
    define('CMS_ADMIN', true);
}



// إذا لم يكن هناك محتوى
if (!isset($content)) {
    $content = '';
}
?>

<div style="display:flex; min-height:100vh; font-family:Neo Sans Arabic, sans-serif;">

    <!-- 🟦 SIDEBAR -->
    <!-- 🟦 SIDEBAR -->
<aside style="
    width:260px;
    background:#0f172a;
    color:#fff;
    padding:20px;
    display:flex;
    flex-direction:column;
    gap:10px;
">

    <h2 style="color:#1e63ff; margin-bottom:20px;">BCS CMS</h2>

    <?php
    $active = $_SERVER['REQUEST_URI'];
    ?>

<a href="/admin/dashboard/index.php"
   style="color:white; text-decoration:none; padding:10px; border-radius:8px; display:block;
   background: <?= strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false ? '#1e63ff' : 'transparent' ?>;">
    📊 Dashboard
</a>

    <a href="#"
       style="color:white; text-decoration:none; padding:10px; border-radius:8px;">
        📄 Pages
    </a>

    <a href="#"
       style="color:white; text-decoration:none; padding:10px; border-radius:8px;">
        🖼 Media
    </a>

    <a href="#"
       style="color:white; text-decoration:none; padding:10px; border-radius:8px;">
        👤 Users
    </a>

    <a href="#"
       style="color:white; text-decoration:none; padding:10px; border-radius:8px;">
        ⚙ Settings
    </a>

</aside>

    <!-- 🟦 MAIN -->
    <main style="flex:1; background:#f5f7fb; padding:20px;">

        <!-- TOP BAR -->
        <div style="
            background:white;
            padding:15px 20px;
            border-radius:12px;
            margin-bottom:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.05);
            display:flex;
            justify-content:space-between;
        ">

            <div>
                👋 Welcome Back
            </div>

            <div>
                <a href="/admin/auth/logout.php">Logout</a>
            </div>

        </div>

        <!-- CONTENT -->
        <div>
            <?= $content ?>
        </div>

    </main>

</div>