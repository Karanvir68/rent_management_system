<style>
    .bg-light {
    --bs-bg-opacity: 1;
    background-color: rgb(204 214 221) !important;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: var(--bs-nav-pills-link-active-color);
    background-color: #566478;
}
.nav-link{
    color: #000000;
}
    </style>
<!-- resources/views/layouts/sidebar.blade.php -->
<nav class="d-flex flex-column bg-light p-3" style="width: 200px; min-height: 100vh;">
    <a href="#" class="navbar-brand mb-4">Rentage</a>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{'/rent'}}" class="nav-link">Dashboard</a>
        </li>
        <li>
            <a href="#" class="nav-link">Tenants</a>
        </li>
        <li>
            <a href="{{'generate'}}" class="nav-link">Generate</a>
        </li>
        <li>
            <a href="#" class="nav-link">Logout</a>
        </li>
    </ul>
</nav>
