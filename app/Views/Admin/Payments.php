<?php 
// app/Views/admin/payments.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments - Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        /* Table Card */
        .table-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .table-card-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: #fff;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: none;
        }

        .table-card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .table-card-header .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .table-card-header .btn-primary {
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            border: none;
        }

        .table-card-header .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }

        .table-card table {
            margin-bottom: 0;
        }

        .table-card th {
            background: #f8fafc;
            color: #475569;
            font-weight: 700;
            border: none;
            padding: 18px 20px;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.8px;
        }

        .table-card td {
            padding: 18px 20px;
            border-color: #e2e8f0;
            vertical-align: middle;
            color: #475569;
        }

        .table-card tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-card tbody tr:hover {
            background-color: #f8fafc;
            transform: scale(1.01);
            box-shadow: inset 0 0 10px rgba(59, 130, 246, 0.05);
        }

        .table-card tbody tr:last-child {
            border-bottom: none;
        }

        .table-card td:first-child {
            font-weight: 600;
            color: #1e293b;
        }

        .table-card td a, .table-card td button {
            margin-right: 6px;
        }

        /* Amount Badge */
        .amount-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-block;
        }

        /* Status Badge */
        .status-badge {
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .status-badge.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-badge.paid {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.failed {
            background: #fee2e2;
            color: #7f1d1d;
        }

        .status-badge.refunded {
            background: #dbeafe;
            color: #0c2340;
        }

        /* Buttons */
        .btn-warning {
            background: linear-gradient(90deg, #f59e0b, #d97706);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 6px;
            padding: 6px 16px;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(245, 158, 11, 0.3);
            color: #fff;
        }

        .btn-danger {
            background: linear-gradient(90deg, #ef4444, #dc2626);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 6px;
            padding: 6px 16px;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(239, 68, 68, 0.3);
            color: #fff;
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: #fff;
            border: none;
            border-radius: 12px 12px 0 0;
            padding: 25px 30px;
        }

        .modal-header h5 {
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 0.5px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 30px;
            background: #fff;
        }

        .modal-body .form-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .modal-body .form-control,
        .modal-body .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .modal-body .form-control:focus,
        .modal-body .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .modal-footer {
            padding: 20px 30px;
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
            border-radius: 0 0 12px 12px;
        }

        .modal-footer .btn {
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .modal-footer .btn-secondary {
            background: #e2e8f0;
            color: #475569;
            border: none;
        }

        .modal-footer .btn-secondary:hover {
            background: #cbd5e1;
            color: #1e293b;
        }

        .modal-footer .btn-primary {
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            border: none;
            color: #fff;
        }

        .modal-footer .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }

        .modal-footer .btn-success {
            background: linear-gradient(90deg, #10b981, #059669);
            border: none;
            color: #fff;
        }

        .modal-footer .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            font-weight: 500;
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 10px;
            border-left: 4px solid;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease-out;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left-color: #10b981;
        }

        .alert-danger {
            background: #fee2e2;
            color: #7f1d1d;
            border-left-color: #ef4444;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

            .table-card-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .table-card th,
            .table-card td {
                padding: 12px 10px;
                font-size: 0.9rem;
            }

            .btn-warning,
            .btn-danger {
                padding: 4px 10px;
                font-size: 0.8rem;
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

            .table-card-header h5 {
                font-size: 1rem;
            }

            .table-card th {
                font-size: 0.65rem;
                padding: 10px 5px;
            }

            .table-card td {
                padding: 10px 5px;
                font-size: 0.8rem;
            }

            .amount-badge {
                padding: 6px 10px;
                font-size: 0.85rem;
            }

            .status-badge {
                padding: 6px 10px;
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>📊 MyShop</h3>
    <div class="sidebar-subtitle">Admin Dashboard</div>

    <a href="<?= site_url('admin') ?>">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
    </a>
    <a href="<?= site_url('admin/products') ?>">
        <i class="fas fa-box"></i>
        <span>Products</span>
    </a>
    <a href="<?= site_url('admin/categories') ?>">
        <i class="fas fa-folder"></i>
        <span>Categories</span>
    </a>
    <a href="<?= site_url('admin/orders') ?>">
        <i class="fas fa-shopping-cart"></i>
        <span>Orders</span>
    </a>
    <a href="<?= site_url('admin/payments') ?>" class="active">
        <i class="fas fa-credit-card"></i>
        <span>Payments</span>
    </a>
    <a href="<?= site_url('admin/customers') ?>">
        <i class="fas fa-users"></i>
        <span>Customers</span>
    </a>
    <a href="<?= site_url('logout') ?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</div>

<!-- Main Content -->
<div class="content">

    <!-- Topbar -->
    <div class="topbar">
        <h4><i class="fas fa-credit-card"></i> Payments Management</h4>
        <div class="topbar-user">
            <span>Welcome, <strong><?= auth()->user()->username ?? 'Admin' ?></strong></span>
            <div class="user-avatar"><?= strtoupper(substr(auth()->user()->username ?? 'A', 0, 1)) ?></div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">

        <!-- Alerts -->
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <?= session('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Payments Table Card -->
        <div class="table-card">

            <div class="table-card-header">
                <h5><i class="fas fa-list"></i> All Payments</h5>
            </div>

            <?php if (!empty($payments)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-shopping-cart"></i> Order ID</th>
                            <th><i class="fas fa-credit-card"></i> Method</th>
                            <th><i class="fas fa-money-bill"></i> Amount</th>
                            <th><i class="fas fa-info-circle"></i> Status</th>
                            <th><i class="fas fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td>#<?= $payment['id'] ?></td>
                                <td>#<?= $payment['order_id'] ?></td>
                                <td>
                                    <strong><?= esc($payment['payment_method']) ?></strong>
                                </td>
                                <td>
                                    <span class="amount-badge">
                                        ₱<?= number_format($payment['amount'], 2) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge <?= strtolower($payment['status']) ?>">
                                        <?= esc($payment['status']) ?>
                                    </span>
                                </td>
                                <td>
                                    <button
                                        class="btn btn-warning btn-sm editBtn"
                                        data-id="<?= $payment['id'] ?>"
                                        data-method="<?= esc($payment['payment_method']) ?>"
                                        data-status="<?= esc($payment['status']) ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal"
                                        title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <a href="<?= site_url('admin/payments/delete/'.$payment['id']) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this payment?')"
                                       title="Delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-money-bill-wave"></i>
                    <p>No payments found</p>
                    <p style="font-size: 0.95rem; color: #64748b;">Payments will appear here once orders are placed</p>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post" id="editForm">
                <?= csrf_field() ?>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="editMethod" name="payment_method" required>
                            <option value="Cash">Cash</option>
                            <option value="GCash">GCash</option>
                            <option value="PayMaya">PayMaya</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Failed">Failed</option>
                            <option value="Refunded">Refunded</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Update Payment
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Handle edit button clicks
    document.querySelectorAll('.editBtn').forEach(button => {
        button.addEventListener('click', function() {
            const paymentId = this.dataset.id;
            const paymentMethod = this.dataset.method;
            const paymentStatus = this.dataset.status;

            document.getElementById('editMethod').value = paymentMethod;
            document.getElementById('editStatus').value = paymentStatus;

            document.getElementById('editForm').action = 
                "<?= site_url('admin/payments/update/') ?>" + paymentId;
        });
    });

    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
</script>

</body>
</html>