@extends('layouts.index')
@push('css')
<style>
    .user-dashboard {
        padding: 20px;
    }

    .dashboard-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .dashboard-card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
    }

    .dashboard-card-content {
        color: #666;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .status-badge.active {
        background-color: #d4edda;
        color: #155724;
    }

    .status-badge.inactive {
        background-color: #f8d7da;
        color: #721c24;
    }

    .action-button {
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .action-button:hover {
        transform: translateY(-1px);
    }

    .search-box {
        margin-bottom: 20px;
    }

    .search-box .form-control {
        border-radius: 4px;
        padding: 10px 15px;
    }

    .search-box .btn {
        border-radius: 4px;
        padding: 10px 20px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="user-dashboard">
                <!-- Welcome Section -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h2 class="dashboard-card-title">Welcome, {{ $user->name }}</h2>
                        <span class="status-badge {{ $user->status == 'active' ? 'active' : 'inactive' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </div>
                    <div class="dashboard-card-content">
                        <p>Here's an overview of your account and available actions.</p>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                                <p><strong>Last Login:</strong>
                                    {{ $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->format('d M Y H:i') : 'Never' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h3 class="dashboard-card-title">Quick Actions</h3>
                    </div>
                    <div class="dashboard-card-content">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('list_product') }}" class="btn btn-primary action-button w-100 mb-2">
                                    <i class="fas fa-shopping-cart"></i> View Products
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('list_history') }}" class="btn btn-info action-button w-100 mb-2">
                                    <i class="fas fa-history"></i> View History
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('myProfile') }}" class="btn btn-success action-button w-100 mb-2">
                                    <i class="fas fa-user"></i> My Profile
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('changePasswordView') }}"
                                    class="btn btn-warning action-button w-100 mb-2">
                                    <i class="fas fa-key"></i> Change Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h3 class="dashboard-card-title">Recent Activities</h3>
                    </div>
                    <div class="dashboard-card-content">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentActivities as $activity)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($activity->created_at)->format('Y-m-d') }}</td>
                                        <td>{{ ucfirst($activity->action) }}</td>
                                        <td><span class="status-badge active">Completed</span></td>
                                        <td>{{ $activity->column ? ucfirst($activity->column) . ' changed' : 'New record created' }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No recent activities found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Search Section -->
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <h3 class="dashboard-card-title">Search</h3>
                    </div>
                    <div class="dashboard-card-content">
                        <div class="search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput"
                                    placeholder="Search products, documents, or activities...">
                                <button class="btn btn-primary" id="searchButton">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        // Search functionality
        $('#searchButton').click(function() {
            const searchTerm = $('#searchInput').val().toLowerCase();
            if (searchTerm) {
                // Redirect to appropriate search results page
                window.location.href = "{{ route('list_product') }}?search=" + searchTerm;
            }
        });

        // Handle enter key in search input
        $('#searchInput').keypress(function(e) {
            if (e.which == 13) {
                $('#searchButton').click();
            }
        });
    });
</script>
@endpush