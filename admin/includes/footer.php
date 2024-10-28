<?php
// footer.php
?>

<footer class="footer">
    <p>&copy; 2024 CRAS. All rights reserved.</p>
    <p>
        <a href="#">Privacy Policy</a> | 
        <a href="#">Terms of Service</a>
    </p>
</footer>

<style>

.footer {
    background: var(--light);
    color: var(--dark);
    padding: 20px 24px;
    text-align: center;
    border-top: 1px solid var(--grey);
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
}

.footer p {
    margin: 0;
    font-size: 14px;
}

.footer a {
    color: var(--primary);
    text-decoration: none;
    transition: color 0.3s;
}

.footer a:hover {
    color: var(--dark);
}
</style>