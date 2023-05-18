<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <img src="assets/img/tsd.ico" alt="logo">
            <h1 class="text-light">
                <a href="index.php"><span>TESDA SORSOGON</span></a>
            </h1>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link <?= $_SESSION['nav-active'] == 'home' ? 'active' : '' ?>" href="index.php">Home</a></li>
                <li><a class="nav-link <?= $_SESSION['nav-active'] == 'about' ? 'active' : '' ?>" href="about.php">About Us</a></li>
                <li class="dropdown <?= $_SESSION['nav-active'] == 'dropdown2' ? 'active' : '' ?>"><a href="#"><span>Centers</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="centers.php#training">Training Centers</a></li>
                        <li><a href="centers.php#assessment">Assesment Centers</a></li>
                    </ul>
                </li>
                <li class="dropdown <?= $_SESSION['nav-active'] == 'dropdown1' ? 'active' : '' ?>"><a href="#"><span>Renewal</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="validator.php?type=NC">NC Requirements Validator</a></li>
                        <li><a href="validator.php?type=COC">COC Requirements Validator</a></li>
                        <li><a href="validator.php?type=TM">TM Requirements Validator</a></li>
                        <li><a href="validator.php?type=NTTC">NTTC Requirements Validator</a></li>
                    </ul>
                </li>
                <li><a class="nav-link <?= $_SESSION['nav-active'] == 'faq' ? 'active' : '' ?>" href="faq.php">FAQ</a></li>
                <li class="dropdown"><a href="#"><span>Downloadables</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="forms/applicationform.pdf" download target="_blank">Application Form</a>
                        </li>
                        <li>
                            <a href="forms/nttcapplicationform.pdf" download target="_blank">NTTC Application Form</a>
                        </li>
                        <li>
                            <a href="forms/registrationform.pdf" download target="_blank">Registration Form</a>
                        </li>
                    </ul>
                </li>
                <li><a class="nav-link <?= $_SESSION['nav-active'] == 'contacts' ? 'active' : '' ?>" href="contacts.php">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

