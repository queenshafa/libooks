@extends('layouts.app')
@section('title', 'Admin Dashboard | Libooks')

@section('banner-title')
    Hiya, Admin!
@endsection

@section('banner-subtitle', 'Here is today\'s E-Library summary.')

@section('content')
    <div class="px-6 py-10 flex flex-col gap-6">
        <!-- Stat Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Total of Books -->
            <div
                class="stat-card stat-card-blue relative bg-white rounded-2xl p-6 border border-gray-100 overflow-hidden transition-all hover:-translate-y-1 hover:shadow-2xl animate-fade-up delay-1">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-3.5 bg-primary/20">
                    <i class="ri-book-open-line text-primary text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 leading-none mb-1" style="font-family:'Sora',sans-serif">
                    {{ $totalBuku }}</div>
                <div class="text-sm text-gray-500 font-medium">Total of Books</div>
            </div>

            <!-- Total borrowers -->
            <div
                class="stat-card stat-card-green relative bg-white rounded-2xl p-6 border border-gray-100 overflow-hidden transition-all hover:-translate-y-1 hover:shadow-2xl animate-fade-up delay-2">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-3.5 bg-primary/20">
                    <i class="ri-group-line text-primary text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 leading-none mb-1" style="font-family:'Sora',sans-serif">
                    {{ $totalPeminjam }}</div>
                <div class="text-sm text-gray-500 font-medium">Total Borrower</div>
            </div>

            <!-- Is Borrowed -->
            <div
                class="stat-card stat-card-yellow relative bg-white rounded-2xl p-6 border border-gray-100 overflow-hidden transition-all hover:-translate-y-1 hover:shadow-2xl animate-fade-up delay-3">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-3.5 bg-primary/20">
                    <i class="ri-todo-line text-primary text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 leading-none mb-1" style="font-family:'Sora',sans-serif">
                    {{ $sedangDipinjam }}</div>
                <div class="text-sm text-gray-500 font-medium">Books borrowed</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-1">
            <!-- Bar Chart -->
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden animate-fade-up delay-5 lg:col-span-2">
                <div class="px-6 py-4.5 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">Borrowing per
                            Month</div>
                        <div class="text-xs text-gray-400 mt-0.5 font-medium">Last 6 months</div>
                    </div>
                </div>


                <div class="px-6 pb-4" style="height:280px; position:relative;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartContainer = document.getElementById('barChart');
            if (!chartContainer) return;
            const labels = @json($labels);
            const data = @json($data);

            new Chart(chartContainer, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Peminjaman',
                        data: data,
                        backgroundColor: '#ce512b',
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: ctx => ` ${ctx.parsed.y} borrowings`
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            border: {
                                display: false
                            },
                            ticks: {
                                color: '#888780',
                                font: {
                                    size: 11
                                }
                            }
                        },
                        y: {
                            grid: {
                                color: 'rgba(136,135,128,0.15)'
                            },
                            border: {
                                display: false
                            },
                            beginAtZero: true,
                            ticks: {
                                color: '#888780',
                                font: {
                                    size: 11
                                },
                                padding: 8,
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
