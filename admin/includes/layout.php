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
    <aside style="
        width:250px;
        background:#0f172a;
        color:#fff;
        padding:20px;
    ">

        <h2 style="color:#1e63ff;">BCS CMS</h2>

        <nav style="margin-top:30px; display:flex; flex-direction:column; gap:12px;">

            <a href="/admin/dashboard/index.php" style="color:white; text-decoration:none;">Dashboard</a>
            <a href="#" style="color:white; text-decoration:none;">Pages</a>
            <a href="#" style="color:white; text-decoration:none;">Media</a>
            <a href="#" style="color:white; text-decoration:none;">Users</a>
            <a href="#" style="color:white; text-decoration:none;">Settings</a>

        </nav>

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