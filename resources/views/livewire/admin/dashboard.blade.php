@section('title', 'Dashboard')

<div>
    <!-- Sale & Revenue Start -->
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-calendar-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Reservations</p>
                    <h6 class="mb-0">0</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-bed fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Rooms</p>
                    <h6 class="mb-0">0</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Guests</p>
                    <h6 class="mb-0">0</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-dollar-sign fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Revenue</p>
                    <h6 class="mb-0">$0</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Welcome Message -->
    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h4 class="mb-3">Welcome to {{ config('app.name') }} Admin Dashboard</h4>
                <p class="mb-0">Manage your hotel operations from this centralized dashboard. Use the sidebar menu to navigate to different sections.</p>
            </div>
        </div>
    </div>
</div>
