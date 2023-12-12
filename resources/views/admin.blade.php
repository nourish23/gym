@extends('layouts/contentNavbarLayout')

@section('title', 'Admin Dashboard')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('users.index') }}">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">{{ $usercount }}</span>
                    <span class="count-name">Users</span>
                </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="users?filter=subscriptions">
                <div class="card-counter primary">
                    <i class="fa fa-times"></i>
                    <span class="count-numbers">{{ $subcount }}</span>
                    <span class="count-name">Expired subscriptions</span>
                </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="coachs">
                <div class="card-counter danger">
                    <i class="fa fa-address-card-o"></i>
                    <span class="count-numbers">{{ $coachcount }}</span>
                    <span class="count-name">Coach</span>
                </div>
            </a>
            </div>

            <div class="col-md-3">
                <a href="planclasses">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">{{ $recordedcount }}</span>
                    <span class="count-name">Recorded Class</span>
                </div>
                </a>
            </div>
        </div>

        <div class="row d-flex align-items-center mt-5">
            <div class="col-md-6">
                <div style="height: 400px; width: 400px;">
                    <canvas id="paidChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div style="width: 645px;">
                    <canvas id="planClassChart"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <canvas id="userChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var userLabels = {{ Js::from($labels) }};
        var userData = {{ Js::from($data) }};
        const userDataConfig = {
            labels: userLabels,
            datasets: [{
                label: 'User',
                backgroundColor: 'rgb(242, 150, 191)',
                borderColor: 'rgb(242, 150, 191)',
                fill: false,
                data: userData,
            }]
        };
        // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],   
        // data: [65, 59, 80, 81, 26, 55, 40],
        const userChartConfig = {
            type: 'line',
            data: userDataConfig,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 100
                    }
                }
            }
        };
        const userChart = new Chart(
            document.getElementById('userChart'),
            userChartConfig
        );

        var paidLabels = ['Paid', 'Unpaid'];
        var usersPaidCount = {{ $usersPaidCount }};
        var usersUnpaidCount = {{ $usersUnpaidCount }};
        const paidDataConfig = {
            labels: paidLabels,
            datasets: [{
                data: [usersPaidCount, usersUnpaidCount],
                backgroundColor: ['rgb(242, 150, 191)', 'rgb(154, 119, 170)']
            }]
        };
        const paidChartConfig = {
            type: 'pie',
            data: paidDataConfig,
            options: {}
        };
        const paidChart = new Chart(
            document.getElementById('paidChart'),
            paidChartConfig
        );

        var planClassLabels = {{ Js::from($planClassLabels) }};
        var planClassData = {{ Js::from($planClassData) }};
        var barColors = generateBarColors(planClassData.length);
        const planClassDataConfig = {
            labels: planClassLabels,
            datasets: [{
                label: 'Recorded Classes',
                backgroundColor: barColors,
                borderColor: 'rgb(75, 192, 192)',
                data: planClassData
            }]
        };
        const planClassChartConfig = {
            type: 'bar',
            data: planClassDataConfig,
            options: {}
        };
        const planClassChart = new Chart(
            document.getElementById('planClassChart'),
            planClassChartConfig
        );

        function generateBarColors(count) {
            var colors = [];
            for (var i = 0; i < count; i++) {
                var color = getRandomColor();
                colors.push(color);
            }
            return colors;
        }

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            color += '80';
            return color;
        }
    </script>

@endsection
