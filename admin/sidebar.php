
<?php if(isset($_SESSION['nav-active'])): ?>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'dashboard' ? '' : 'collapsed' ?>" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Review</li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'requirements' ? '' : 'collapsed' ?>" href="requirements.php">
                <i class="bi bi-files"></i>
                <span>Requirements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'messages' ? '' : 'collapsed' ?>" href="messages.php">
                <i class="bi bi-envelope"></i>
                <span>Messages</span>
            </a>
        </li>
        <li class="nav-heading">Manage</li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'info' ? '' : 'collapsed' ?>" href="info.php">
                <i class="bi bi-info"></i>
                <span>Tesda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'services' ? '' : 'collapsed' ?>" href="services.php">
                <i class="bi bi-globe"></i>
                <span>Services</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'events' ? '' : 'collapsed' ?>" href="events.php">
                <i class="bi bi-calendar"></i>
                <span>Events</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'faq' ? '' : 'collapsed' ?>" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'training' ? '' : 'collapsed' ?>" href="training.php">
                <i class="bi bi-building"></i>
                <span>Training Centers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $_SESSION['nav-active'] == 'assessment' ? '' : 'collapsed' ?>" href="assessment.php">
                <i class="bi bi-building"></i>
                <span>Assessment Centers</span>
            </a>
        </li>
    </ul>
</aside>
<?php endif ?>