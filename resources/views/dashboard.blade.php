@extends('base')
@section('title', 'Dashboard Admin')


@section('content')
    <div class="p-6 max-w-7xl mx-auto flex flex-col gap-6">
        <!-- Heading -->
        <div class="flex items-center justify-between animate-fade-up">
            <div>
                <h1 class="text-2xl font-extrabold text-gray-900" style="font-family:'Sora',sans-serif">Dashboard 👋</h1>
                <p class="text-sm text-gray-500 mt-0.5">Halo, <span
                        class="font-semibold text-gray-700">{{ Str::before(auth()->user()->name, ' ') }}</span>! Berikut
                    ringkasan E-Library hari ini.</p>
            </div>
        </div>


        <!-- Stat Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">


            <!-- Total Buku -->
            <div
                class="stat-card stat-card-blue relative bg-white rounded-2xl p-6 border border-gray-100 overflow-hidden transition-all hover:-translate-y-1 hover:shadow-2xl animate-fade-up delay-1">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-3.5 bg-blue-50">
                    <i class="ri-book-open-line text-blue-500 text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 leading-none mb-1" style="font-family:'Sora',sans-serif">
                    {{ $totalBuku }}</div>
                <div class="text-sm text-gray-500 font-medium">Total Buku</div>
            </div>


            <!-- Total Anggota -->
            <div
                class="stat-card stat-card-green relative bg-white rounded-2xl p-6 border border-gray-100 overflow-hidden transition-all hover:-translate-y-1 hover:shadow-2xl animate-fade-up delay-2">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-3.5 bg-green-50">
                    <i class="ri-group-line text-green-400 text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 leading-none mb-1" style="font-family:'Sora',sans-serif">
                    {{ $totalPeminjam }}</div>
                <div class="text-sm text-gray-500 font-medium">Total Permintaan</div>
            </div>


            <!-- Sedang Dipinjam -->
            <div
                class="stat-card stat-card-yellow relative bg-white rounded-2xl p-6 border border-gray-100 overflow-hidden transition-all hover:-translate-y-1 hover:shadow-2xl animate-fade-up delay-3">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-3.5 bg-yellow-50">
                    <i class="ri-todo-line text-yellow-500 text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-gray-900 leading-none mb-1" style="font-family:'Sora',sans-serif">
                    {{ $sedangDipinjam }}</div>
                <div class="text-sm text-gray-500 font-medium">Sedang Dipinjam</div>
            </div>
        </div>


        <!-- Row 2: Chart + Top Books -->
        <div class="grid grid-cols-1 lg:grid-cols-1">


            <!-- Bar Chart -->
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden animate-fade-up delay-5 lg:col-span-2">
                <div class="px-6 py-4.5 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <div class="text-[15px] font-bold text-gray-900" style="font-family:'Sora',sans-serif">Peminjaman
                            per Bulan</div>
                        <div class="text-xs text-gray-400 mt-0.5 font-medium">6 bulan terakhir</div>
                    </div>
                </div>


                <div class="px-6 pb-4" style="height:280px; position:relative;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>


    <script>
        function initChart() {
            const chartData = @json($chartData);
            const namaBulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];


            console.log('Chart Data:', chartData);


            const bulanList = [];
            for (let i = 5; i >= 0; i--) {
                const d = new Date();
                d.setMonth(d.getMonth() - i);
                bulanList.push({
                    bulan: d.getMonth() + 1,
                    label: namaBulan[d.getMonth()]
                });
            }


            const labels = bulanList.map(b => b.label);
            const data = bulanList.map(b => {
                const item = chartData.find(d => parseInt(d.bulan) === b.bulan);
                return item ? parseInt(item.total) : 0;
            });


            console.log('Labels:', labels);
            console.log('Data:', data);


            const chartContainer = document.getElementById('barChart');
            if (!chartContainer) {
                console.error('Chart container (canvas) not found!');
                return;
            }


            if (typeof Chart === 'undefined') {
                console.error('Chart.js library not loaded!');
                return;
            }


            try {
                new Chart(chartContainer, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Peminjaman',
                            data,
                            backgroundColor: '#378ADD',
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
                                    label: ctx => ` ${ctx.parsed.y} buku`
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
                                    },
                                    autoSkip: false,
                                    maxRotation: 0
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
                                    stepSize: 1,
                                    callback: value => Number.isInteger(value) ? value : ''
                                }
                            }
                        }
                    }
                });
                console.log('✓ Chart rendered successfully');
            } catch (err) {
                console.error('✗ Chart error:', err);
            }
        }


        // Wait for Chart.js to load and DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initChart);
        } else {
            // DOM is already ready
            setTimeout(initChart, 100);
        }
    </script>
@endsection
