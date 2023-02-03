<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboards">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#dashboard" type="button"><i class="bi bi-house-door-fill"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="User">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#user" type="button"><i class="bi bi-person-circle"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Doctor">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#Doctor" type="button"><i class="bi bi-person-circle"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Appointment">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#Appointment" type="button"><i class="bi bi-person-circle"></i></button>
            </li>
        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <img src="{{asset('adminAsset')}}/assets/images/brand-logo-2.png" width="140" alt=""/>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="dashboard">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Dashboards</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('dashboard')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Dashboard</a>
                </div>
            </div>
            <div class="tab-pane fade" id="user">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Doctor Table</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('user')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>User</a>
                </div>
            </div>
            <div class="tab-pane fade" id="Doctor">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Doctor Table</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('doctor')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Doctor</a>
                    <a href="{{route('manage-doctor')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Manage Doctor</a>
                </div>
            </div>
            <div class="tab-pane fade" id="Appointment">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Doctor Table</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('appointment')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Appointment</a>
                </div>
            </div>
        </div>
    </div>
</aside>
