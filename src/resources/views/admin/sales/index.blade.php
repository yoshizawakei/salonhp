@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">売上管理</h2>

    <div class="mb-4">
        <a href="{{ route('admin.sales.export') }}" class="btn btn-brand">売上データをExcelでダウンロード</a>
    </div>

    <div class="row">

        {{-- 月別売上 --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header card-header-brand text-white fw-bold">
                    月別売上
                </div>
                <div class="card-body">
                    <canvas id="monthlySalesChart"></canvas>
                </div>
            </div>
        </div>

        {{-- 月別来店数 --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header card-header-brand text-white fw-bold">
                    月別来店数
                </div>
                <div class="card-body">
                    <canvas id="monthlyVisitsChart"></canvas>
                </div>
            </div>
        </div>

        {{-- コース別売上 --}}
        <div class="col-md-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header card-header-brand text-white fw-bold">
                    コース別売上比率
                </div>
                <div class="card-body">
                    <canvas id="courseSalesChart"></canvas>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // ----------------------------
        // 月別売上
        // ----------------------------
        const monthlyLabels = @json($monthlySales->pluck('month'));
        const monthlyData = @json($monthlySales->pluck('total'));

        new Chart(document.getElementById('monthlySalesChart'), {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: '売上額 (円)',
                    data: monthlyData,
                    borderColor: '#333',
                    backgroundColor: 'rgba(0,0,0,0.1)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });

        // ----------------------------
        // 月別来店数
        // ----------------------------
        const visitLabels = @json($monthlyVisits->pluck('month'));
        const visitData = @json($monthlyVisits->pluck('count'));

        new Chart(document.getElementById('monthlyVisitsChart'), {
            type: 'bar',
            data: {
                labels: visitLabels,
                datasets: [{
                    label: '来店数',
                    data: visitData,
                    backgroundColor: '#868686',
                }]
            }
        });

        // ----------------------------
        // コース別売上
        // ----------------------------
        const courseLabels = @json($courseSales->pluck('course.name'));
        const courseData = @json($courseSales->pluck('total'));

        new Chart(document.getElementById('courseSalesChart'), {
            type: 'pie',
            data: {
                labels: courseLabels,
                datasets: [{
                    data: courseData,
                    backgroundColor: [
                        '#414141', '#727272', '#B7B7B7',
                        '#D0D0D0', '#F0F0F0', '#8E8E8E'
                    ],
                }]
            }
        });
    </script>
@endsection