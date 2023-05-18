<?php if(isset($_SESSION['nav-actives'])): ?>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'dashboard' ? '' : 'collapsed' ?>" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Review</li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'applications' ? '' : 'collapsed' ?>" href="applications.php">
                <i class="bi bi-files"></i>
                <span>Applications</span>
            </a>
        </li>
        <li class="nav-heading">Manage</li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'announcements' ? '' : 'collapsed' ?>" href="announcements.php">
                <i class="bi bi-calendar"></i>
                <span>Announcements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'addannouncements' ? '' : 'collapsed' ?>" href="newannouncements.php">
                <i class="bi bi-calendar"></i>
                <span>Add Announcements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'archived' ? '' : 'collapsed' ?>" href="archive.php">
                <i class="bi bi-calendar"></i>
                <span>Archives</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'info' ? '' : 'collapsed' ?>" href="info.php">
                <i class="bi bi-info"></i>
                <span>My Info</span>
            </a>
        </li>
        <li class="nav-heading">Settings</li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-actives'] == 'changepwd' ? '' : 'collapsed' ?>" href="changepassword.php">
                <i class="bi bi-gear"></i>
                <span>Change Password</span>
            </a>
        </li>
    </ul>
</aside>
<?php endif ?>