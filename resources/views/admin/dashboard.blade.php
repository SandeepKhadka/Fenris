@extends('layouts.admin')

@section('title', 'Admin Dashboard | Fenris')

@section('style')
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
        }

        /* Page Header */
        .page-header {
            background-color: #e44d26;
            padding: 20px;
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        /* Statistics Cards */
        .statistics-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .statistics-card h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }

        .statistics-card p {
            font-size: 16px;
            color: #666;
        }

        /* Latest Orders Table */
        .latest-orders-table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .latest-orders-table th,
        .latest-orders-table td {
            font-size: 16px;
            color: #333;
        }

        .latest-orders-table th {
            font-weight: bold;
            text-align: left;
        }

        .latest-orders-table th,
        .latest-orders-table td {
            padding: 10px;
        }

        .latest-orders-table .badge {
            font-size: 14px;
            padding: 6px 10px;
            border-radius: 5px;
        }

        .latest-orders-table .badge.delivered {
            background-color: #28a745;
            color: #fff;
        }

        .latest-orders-table .badge.shipped {
            background-color: #007bff;
            color: #fff;
        }

        .latest-orders-table .badge.out-for-delivery {
            background-color: #17a2b8;
            color: #fff;
        }

        .latest-orders-table .badge.processing {
            background-color: #ffc107;
            color: #333;
        }

        .latest-orders-table .badge.cancelled {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
@endsection

@section('main-content')
    <header class="page-header">
        <h1>Admin Dashboard | Fenris</h1>
    </header>

    <div class="container">
        <div class="row" style="margin-bottom: 30px">
            <!-- New Orders Statistics Card -->
            <div class="col-lg-3 col-md-6">
                <div class="statistics-card bg-success">
                    <h2>{{ $newOrdersCount }}</h2>
                    <p>New Orders</p>
                    <div><i class="ti-shopping-cart"></i> 25% higher</div>
                </div>
            </div>

            <!-- Total Income Statistics Card -->
            <div class="col-lg-3 col-md-6">
                <div class="statistics-card bg-warning">
                    <h2>${{ $totalIncome }}</h2>
                    <p>Total Income</p>
                    <div><i class="fa fa-money"></i> 22% higher</div>
                </div>
            </div>

            <!-- Unique Customers Statistics Card -->
            <div class="col-lg-3 col-md-6">
                <div class="statistics-card bg-info">
                    {{-- <h2>{{ $uniqueCustomersCount }}</h2> --}}
                    <p>Unique Customers</p>
                    <div><i class="fa fa-users"></i> 15% higher</div>
                </div>
            </div>

            <!-- Average Order Value Statistics Card -->
            <div class="col-lg-3 col-md-6">
                <div class="statistics-card bg-primary">
                    {{-- <h2>${{ $averageOrderValue }}</h2> --}}
                    <p>Average Order Value</p>
                    <div><i class="fa fa-dollar-sign"></i> 10% higher</div>
                </div>
            </div>
        </div>

        <!-- Bar Graph -->
        <div class="row" style="margin-bottom: 30px">
            <div class="col-lg-6">
                <canvas id="barChart"></canvas>
            </div>
            <div class="col-lg-3">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <!-- Latest Orders Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-orders-table">
                    <h2>Latest Orders</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestOrders as $order)
                                <tr>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}">{{ $order->order_number }}</a>
                                    </td>
                                    <td>{{ \App\Models\User::where('id', $order->user_id)->value('name') }}</td>
                                    <td>Rs {{ $order->total_amount }}</td>
                                    <td>
                                        <span class="badge {{ strtolower($order->condition) }}">
                                            {{ ucfirst($order->condition) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('m/d/Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No orders available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // JavaScript code for initializing and configuring the charts
        document.addEventListener('DOMContentLoaded', function() {
            // Bar chart data
            var barChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: [65, 59, 80, 81, 56, 55, 40]
                }]
            };

            // Bar chart configuration
            var barChartConfig = {
                type: 'bar',
                data: barChartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            };

            // Get the canvas element for the bar chart
            var barChartCanvas = document.getElementById('barChart').getContext('2d');

            // Initialize the bar chart
            new Chart(barChartCanvas, barChartConfig);

            // Pie chart data
            var pieChartData = {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Pie chart configuration
            var pieChartConfig = {
                type: 'pie',
                data: pieChartData
            };

            // Get the canvas element for the pie chart
            var pieChartCanvas = document.getElementById('pieChart').getContext('2d');

            // Initialize the pie chart
            new Chart(pieChartCanvas, pieChartConfig);
        });
    </script>
@endsection
