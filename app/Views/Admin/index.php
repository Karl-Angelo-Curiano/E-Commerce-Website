<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 30px;
            overflow-y: auto;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .sidebar h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .sidebar-subtitle {
            text-align: center;
            color: #94a3b8;
            font-size: 0.85rem;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 14px 22px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .sidebar a i {
            margin-right: 12px;
            width: 20px;
        }

        .sidebar a:hover {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding-left: 28px;
        }

        .sidebar a.active {
            background: linear-gradient(90deg, #3b82f6 0%, #1e40af 100%);
            color: #fff;
        }

        /* Content Area */
        .content {
            margin-left: 260px;
            padding: 0;
        }

        /* Topbar */
        .topbar {
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #f0f4f8;
        }

        .topbar h4 {
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            font-size: 1.8rem;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .topbar-user strong {
            color: #475569;
            font-weight: 600;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Main Container */
        .main-content {
            padding: 30px;
        }

        /* Stats Cards */
        .stat-card {
            background: #fff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
            margin-bottom: 24px;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }

        .stat-card.primary::before {
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
        }

        .stat-card.success::before {
            background: linear-gradient(90deg, #10b981, #34d399);
        }

        .stat-card.warning::before {
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
        }

        .stat-card.danger::before {
            background: linear-gradient(90deg, #ef4444, #f87171);
        }

        .stat-card.info::before {
            background: linear-gradient(90deg, #8b5cf6, #a78bfa);
        }

        .stat-card-body {
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-info h6 {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .stat-trend {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #64748b;
        }

        .stat-trend.up {
            color: #10b981;
        }

        .stat-trend.down {
            color: #ef4444;
        }

        .stat-icon {
            font-size: 3rem;
            opacity: 0.15;
            margin-left: 20px;
        }

        .stat-card.primary .stat-icon {
            color: #3b82f6;
        }

        .stat-card.success .stat-icon {
            color: #10b981;
        }

        .stat-card.warning .stat-icon {
            color: #f59e0b;
        }

        .stat-card.danger .stat-icon {
            color: #ef4444;
        }

        .stat-card.info .stat-icon {
            color: #8b5cf6;
        }

        /* Chart Cards */
        .chart-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 24px;
        }

        .chart-card h5 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }

        /* Table Styling */
        .table-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .table-card .table-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: #fff;
            padding: 20px 25px;
            border-bottom: none;
        }

        .table-card .table-header h5 {
            margin: 0;
            font-weight: 700;
        }

        .table-card table {
            margin-bottom: 0;
        }

        .table-card th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            border: none;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table-card td {
            padding: 15px;
            border-color: #e2e8f0;
            vertical-align: middle;
        }

        .table-card tbody tr {
            transition: background-color 0.2s ease;
        }

        .table-card tbody tr:hover {
            background-color: #f8fafc;
        }

        .badge-custom {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-completed {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-processing {
            background: #dbeafe;
            color: #1e40af;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }

            .topbar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .main-content {
                padding: 15px;
            }

            .stat-card-body {
                flex-direction: column;
                text-align: center;
            }

            .stat-icon {
                margin-left: 0;
                margin-top: 10px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 60px;
                padding-top: 15px;
            }

            .sidebar h3,
            .sidebar-subtitle,
            .sidebar a span {
                display: none;
            }

            .sidebar a {
                justify-content: center;
                padding: 15px;
                margin: 5px auto;
                width: 50px;
            }

            .sidebar a i {
                margin-right: 0;
            }

            .content {
                margin-left: 60px;
            }

            .topbar h4 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>📊 MyShop</h3>
    <div class="sidebar-subtitle">Admin Dashboard</div>

    <a href="/admin" class="active">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
    </a>
    <a href="/admin/products">
        <i class="fas fa-box"></i>
        <span>Products</span>
    </a>
    <a href="/admin/categories">
        <i class="fas fa-folder"></i>
        <span>Categories</span>
    </a>
    <a href="/admin/orders">
        <i class="fas fa-shopping-cart"></i>
        <span>Orders</span>
    </a>
    <a href="/admin/payments">
        <i class="fas fa-credit-card"></i>
        <span>Payments</span>
    </a>
    <a href="/admin/users">
        <i class="fas fa-users"></i>
        <span>Users</span>
    </a>
    <a href="/logout">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</div>

<!-- Main Content -->
<div class="content">

    <!-- Topbar -->
    <div class="topbar">
        <h4>Dashboard</h4>
        <div class="topbar-user">
            <span>Welcome, <strong><?= auth()->user()->username ?></strong></span>
            <div class="user-avatar"><?= strtoupper(substr(auth()->user()->username, 0, 1)) ?></div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">

        <!-- Stats Row 1 -->
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card stat-card primary">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <h6>Total Products</h6>
                            <p class="stat-number"><?= $totalProducts ?? 0 ?></p>
                            <div class="stat-trend up"><i class="fas fa-arrow-up"></i> 12% from last month</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card stat-card success">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <h6>Total Orders</h6>
                            <p class="stat-number"><?= $totalOrders ?? 0 ?></p>
                            <div class="stat-trend up"><i class="fas fa-arrow-up"></i> 8% from last month</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card stat-card warning">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <h6>Total Customers</h6>
                            <p class="stat-number"><?= $totalCustomers ?? 0 ?></p>
                            <div class="stat-trend up"><i class="fas fa-arrow-up"></i> 15% from last month</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card stat-card danger">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <h6>Total Sales</h6>
                            <p class="stat-number">₱<?= number_format($totalSales ?? 0, 0) ?></p>
                            <div class="stat-trend up"><i class="fas fa-arrow-up"></i> 23% from last month</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="chart-card">
                    <h5><i class="fas fa-chart-line"></i> Sales Trend (Last 7 Days)</h5>
                    <div class="chart-container">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="chart-card">
                    <h5><i class="fas fa-pie-chart"></i> Order Status Distribution</h5>
                    <div class="chart-container">
                        <canvas id="orderStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row Charts -->
        <div class="row">
            <div class="col-lg-6">
                <div class="chart-card">
                    <h5><i class="fas fa-bars"></i> Top 5 Products by Sales</h5>
                    <div class="chart-container">
                        <canvas id="topProductsChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="chart-card">
                    <h5><i class="fas fa-doughnut"></i> Revenue by Category</h5>
                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="row">
            <div class="col-12">
                <div class="table-card">
                    <div class="table-header">
                        <h5><i class="fas fa-list"></i> Recent Orders</h5>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-001</td>
                                <td>Juan Dela Cruz</td>
                                <td>₱2,450.00</td>
                                <td><span class="badge badge-custom badge-completed">Completed</span></td>
                                <td>2024-01-15</td>
                                <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                            <tr>
                                <td>#ORD-002</td>
                                <td>Maria Santos</td>
                                <td>₱1,850.00</td>
                                <td><span class="badge badge-custom badge-processing">Processing</span></td>
                                <td>2024-01-14</td>
                                <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                            <tr>
                                <td>#ORD-003</td>
                                <td>Jose Rivera</td>
                                <td>₱3,200.00</td>
                                <td><span class="badge badge-custom badge-pending">Pending</span></td>
                                <td>2024-01-14</td>
                                <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                            <tr>
                                <td>#ORD-004</td>
                                <td>Ana Garcia</td>
                                <td>₱1,600.00</td>
                                <td><span class="badge badge-custom badge-completed">Completed</span></td>
                                <td>2024-01-13</td>
                                <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                            <tr>
                                <td>#ORD-005</td>
                                <td>Carlos Lopez</td>
                                <td>₱2,950.00</td>
                                <td><span class="badge badge-custom badge-processing">Processing</span></td>
                                <td>2024-01-13</td>
                                <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Color Scheme
    const colors = {
        primary: '#3b82f6',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#8b5cf6',
        light: '#f8fafc',
        text: '#1e293b'
    };

    // Sales Trend Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Daily Sales',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 28000],
                borderColor: colors.primary,
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: colors.primary,
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₱' + value.toLocaleString();
                        },
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        color: '#e2e8f0'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Order Status Chart
    const statusCtx = document.getElementById('orderStatusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Processing', 'Pending', 'Cancelled'],
            datasets: [{
                data: [45, 30, 15, 10],
                backgroundColor: [
                    colors.success,
                    colors.info,
                    colors.warning,
                    colors.danger
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        usePointStyle: true,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });

    // Top Products Chart
    const productsCtx = document.getElementById('topProductsChart').getContext('2d');
    new Chart(productsCtx, {
        type: 'bar',
        data: {
            labels: ['Laptop', 'Headphones', 'Keyboard', 'Mouse', 'Monitor'],
            datasets: [{
                label: 'Sales Amount',
                data: [28000, 19000, 15000, 12000, 9000],
                backgroundColor: [
                    colors.primary,
                    colors.info,
                    colors.success,
                    colors.warning,
                    colors.danger
                ],
                borderRadius: 6,
                borderSkipped: false
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value) {
                            return '₱' + value.toLocaleString();
                        },
                        font: {
                            size: 10
                        }
                    },
                    grid: {
                        color: '#e2e8f0'
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Revenue by Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'polarArea',
        data: {
            labels: ['Electronics', 'Accessories', 'Software', 'Services'],
            datasets: [{
                data: [35, 25, 20, 20],
                backgroundColor: [
                    colors.primary,
                    colors.success,
                    colors.warning,
                    colors.info
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        usePointStyle: true,
                        font: {
                            size: 11
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>
