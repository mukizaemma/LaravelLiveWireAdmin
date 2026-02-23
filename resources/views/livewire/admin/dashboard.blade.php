@section('title', 'Hospital Dashboard')

<div>
    <!-- Top KPI Cards -->
    <div class="row g-4">
        <!-- Doctors -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 h-100">
                    <i class="fa fa-user-md fa-3x text-primary"></i>
                    <div class="ms-3 text-end">
                        <p class="mb-1 text-muted text-uppercase small">Doctors / Clinical Staff</p>
                        <h4 class="mb-0 text-dark">{{ $doctorCount }}</h4>
                        <small class="text-primary">View all staff <i class="fa fa-arrow-right ms-1"></i></small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Leadership Team -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('admin.leadership-team.index') }}" class="text-decoration-none">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 h-100">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3 text-end">
                        <p class="mb-1 text-muted text-uppercase small">Leadership Team</p>
                        <h4 class="mb-0 text-dark">{{ $leadershipCount }}</h4>
                        <small class="text-primary">Manage team <i class="fa fa-arrow-right ms-1"></i></small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Departments -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('admin.departments.index') }}" class="text-decoration-none">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 h-100">
                    <i class="fa fa-sitemap fa-3x text-primary"></i>
                    <div class="ms-3 text-end">
                        <p class="mb-1 text-muted text-uppercase small">Clinical Departments</p>
                        <h4 class="mb-0 text-dark">{{ $departmentCount }}</h4>
                        <small class="text-primary">Manage departments <i class="fa fa-arrow-right ms-1"></i></small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Partners -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('admin.partners.index') }}" class="text-decoration-none">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 h-100">
                    <i class="fa fa-handshake fa-3x text-primary"></i>
                    <div class="ms-3 text-end">
                        <p class="mb-1 text-muted text-uppercase small">Strategic Partners</p>
                        <h4 class="mb-0 text-dark">{{ $partnerCount }}</h4>
                        <small class="text-primary">View partners <i class="fa fa-arrow-right ms-1"></i></small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Feedback -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('admin.feedback.index') }}" class="text-decoration-none">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 h-100">
                    <i class="fa fa-comments fa-3x text-primary"></i>
                    <div class="ms-3 text-end">
                        <p class="mb-1 text-muted text-uppercase small">Patient Feedback</p>
                        <h4 class="mb-0 text-dark">{{ $feedbackCount }}</h4>
                        <small class="text-success">
                            {{ $approvedFeedbackCount }} approved for website
                        </small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Feedback Insights -->
    <div class="row g-4 mt-2">
        <div class="col-lg-6">
            <div class="bg-light rounded p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">
                        <i class="fa fa-chart-pie me-2 text-primary"></i>
                        Feedback by Category
                    </h5>
                    <a href="{{ route('admin.feedback.index') }}" class="btn btn-sm btn-outline-primary">
                        View detailed feedback
                    </a>
                </div>

                @if($feedbackStats->isEmpty())
                    <p class="text-muted mb-0">No feedback has been recorded yet.</p>
                @else
                    <canvas id="feedbackOverviewChart" height="220"></canvas>
                @endif
            </div>
        </div>

        <div class="col-lg-6">
            <div class="bg-light rounded p-4 h-100">
                <h5 class="mb-3">
                    <i class="fa fa-table me-2 text-primary"></i>
                    Feedback Category Summary
                </h5>

                @if($feedbackStats->isEmpty())
                    <p class="text-muted mb-0">Once feedback is submitted, a summary table will appear here.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th class="text-center">Total Feedback</th>
                                    <th class="text-center">Avg. Rating /10</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedbackStats as $row)
                                    <tr>
                                        <td class="text-capitalize">
                                            {{ $row->rating_category ?? 'Uncategorized' }}
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-primary">{{ $row->total }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if(!is_null($row->avg_rating))
                                                {{ number_format($row->avg_rating, 1) }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Welcome / Helper Text -->
    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h4 class="mb-2">Welcome to {{ config('app.name') }} Hospital Admin</h4>
                <p class="mb-0 text-muted">
                    Use the cards above to quickly jump into managing doctors, departments, partners, and patient feedback.
                    The feedback chart and table give you an at-a-glance view of how patients are experiencing your services.
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @if($feedbackStats->isNotEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('feedbackOverviewChart');
                if (!ctx) return;

                const stats = @json($feedbackStats);
                const labels = stats.map(s => s.rating_category || 'Uncategorized');
                const totals = stats.map(s => s.total);

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: totals,
                            backgroundColor: [
                                '#0d6efd', '#198754', '#ffc107',
                                '#dc3545', '#6610f2', '#20c997', '#6c757d'
                            ],
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });
        </script>
    @endif
@endpush
