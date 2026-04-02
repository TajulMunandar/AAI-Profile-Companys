@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="row">
    <!-- Total Users -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="round rounded bg-primary text-white d-flex align-items-center justify-content-center">
                        <i class="ti ti-users fs-6"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0 fw-semibold">Total Users</h5>
                        <span class="text-muted fs-3">{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Projects -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="round rounded bg-success text-white d-flex align-items-center justify-content-center">
                        <i class="ti ti-briefcase fs-6"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0 fw-semibold">Projects</h5>
                        <span class="text-muted fs-3">{{ $totalProjects }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Clients -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="round rounded bg-warning text-white d-flex align-items-center justify-content-center">
                        <i class="ti ti-user fs-6"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0 fw-semibold">Clients</h5>
                        <span class="text-muted fs-3">{{ $totalClients }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Articles -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="round rounded bg-info text-white d-flex align-items-center justify-content-center">
                        <i class="ti ti-file-text fs-6"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0 fw-semibold">Articles</h5>
                        <span class="text-muted fs-3">{{ $totalArticles }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <!-- Quick Actions -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Quick Actions</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary w-100 py-3">
                            <i class="ti ti-user-plus fs-5 me-2"></i>
                            Add User
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('dashboard.projects.create') }}" class="btn btn-success w-100 py-3">
                            <i class="ti ti-plus fs-5 me-2"></i>
                            Add Project
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('dashboard.clients.create') }}" class="btn btn-warning w-100 py-3">
                            <i class="ti ti-user-plus fs-5 me-2"></i>
                            Add Client
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('dashboard.articles.create') }}" class="btn btn-info w-100 py-3">
                            <i class="ti ti-file-plus fs-5 me-2"></i>
                            Add Article
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Recent Contacts</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $contact)
                            <tr>
                                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3">No recent contacts</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <!-- Recent Projects -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Recent Projects</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Client</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProjects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->client_name }}</td>
                                <td><span class="badge bg-secondary">{{ $project->project_type }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3">No recent projects</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Articles -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Recent Articles</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentArticles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td><span class="badge bg-primary">{{ $article->kategori->nama ?? 'Uncategorized' }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3">No recent articles</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <!-- Services Overview -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Services</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($services as $service)
                    <div class="col-md-4 mb-3">
                        <div class="border rounded p-3 h-100">
                            <h5 class="fw-semibold mb-2">{{ $service->title }}</h5>
                            <p class="text-muted mb-0">{{ Str::limit($service->description, 100) }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-3">
                        <p class="text-muted">No services available</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
