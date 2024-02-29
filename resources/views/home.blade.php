<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('asserts/css/bootstrap.min.css')}}">
    <style>
        .form-control:focus {
            box-shadow: none;
        }

        .form-control-underlined {
            border-width: 0;
            border-bottom-width: 1px;
            border-radius: 0;
            padding-left: 0;
        }

        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }

        a {
            text-decoration: none;
        }

        .chart-area {
            margin: 5em 20em;
        }

        .shadow {
            filter: drop-shadow(0px 5px 4px rgba(0, 0, 0, .4));
        }

        .svg-item {
            width: 100%;
            font-size: 16px;
            margin: 0 auto;
            animation: donutfade 1s;
        }

        @keyframes donutfade {

            /* this applies to the whole svg item wrapper */
            0% {
                opacity: .2;
            }

            100% {
                opacity: 1;
            }
        }

        @media (min-width: 992px) {
            .svg-item {
                width: 80%;
            }
        }

        .donut-ring {
            stroke: #EBEBEB;
        }

        .donut-segment {
            transform-origin: center;
            stroke: #FF6200;
        }

        .donut-segment-2 {
            stroke: aqua;
            animation: donut1 3s;
        }

        .donut-segment-3 {
            stroke: #d9e021;
            animation: donut2 3s;
        }

        .donut-segment-4 {
            stroke: #ed1e79;
            animation: donut3 3s;
        }

        .segment-1 {
            fill: #ccc;
        }

        .segment-2 {
            fill: aqua;
        }

        .segment-3 {
            fill: #d9e021;
        }

        .segment-4 {
            fill: #ed1e79;
        }

        .donut-percent {
            animation: donutfadelong 1s;
        }

        @keyframes donutfadelong {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes donut1 {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 69, 31;
            }
        }

        @keyframes donut2 {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 30, 70;
            }
        }

        @keyframes donut3 {
            0% {
                stroke-dasharray: 0, 100;
            }

            100% {
                stroke-dasharray: 1, 99;
            }
        }

        .donut-text {
            font-family: Arial, Helvetica, sans-serif;
            fill: #FF6200;
        }

        .donut-text-1 {
            fill: aqua;
        }

        .donut-text-2 {
            fill: #d9e021;
        }

        .donut-text-3 {
            fill: #ed1e79;
        }

        .donut-label {
            font-size: 0.28em;
            font-weight: 700;
            line-height: 1;
            fill: #000;
            transform: translateY(0.25em);
        }

        .donut-percent {
            font-size: 0.5em;
            line-height: 1;
            transform: translateY(0.5em);
            font-weight: bold;
        }

        .donut-data {
            font-size: 0.12em;
            line-height: 1;
            transform: translateY(0.5em);
            text-align: center;
            text-anchor: middle;
            color: #666;
            fill: #666;
            animation: donutfadelong 1s;
        }

        html {
            text-align: center;
        }

        .svg-item {
            max-width: 30%;
            display: inline-block;
        }

        .simple-bar-chart {
            --line-count: 10;
            --line-color: currentcolor;
            --line-opacity: 0.25;
            --item-gap: 2%;
            --item-default-color: #060606;

            height: 10rem;
            display: grid;
            grid-auto-flow: column;
            gap: var(--item-gap);
            align-items: end;
            padding-inline: var(--item-gap);
            --padding-block: 1.5rem;
            /*space for labels*/
            padding-block: var(--padding-block);
            position: relative;
            isolation: isolate;
        }

        .simple-bar-chart::after {
            content: "";
            position: absolute;
            inset: var(--padding-block) 0;
            z-index: -1;
            --line-width: 1px;
            --line-spacing: calc(100% / var(--line-count));
            background-image: repeating-linear-gradient(to top, transparent 0 calc(var(--line-spacing) - var(--line-width)), var(--line-color) 0 var(--line-spacing));
            box-shadow: 0 var(--line-width) 0 var(--line-color);
            opacity: var(--line-opacity);
        }

        .simple-bar-chart>.item {
            height: calc(1% * var(--val));
            background-color: var(--clr, var(--item-default-color));
            position: relative;
            animation: item-height 1s ease forwards
        }

        @keyframes item-height {
            from {
                height: 0
            }
        }

        .simple-bar-chart>.item>* {
            position: absolute;
            text-align: center
        }

        .simple-bar-chart>.item>.label {
            inset: 100% 0 auto 0
        }

        .simple-bar-chart>.item>.value {
            inset: auto 0 100% 0
        }
    </style>
    <title>Document</title>
</head>

<body style="background-color:ghostwhite;">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class='logo p-3' style="background-color: #fff;width:10rem;color:darkcyan;font-size:large;font-weight:bold;">
                    <img src="https://st2.depositphotos.com/3904401/5770/v/450/depositphotos_57701293-stock-illustration-financelogoarrowreal-estatecompany-iconcorporate-business-symbol.jpg" alt="Ảnh" style="width:50px;height:50px;border-radius:50%;">
                    Finance
                </div>
                <div class="mt-4">
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <label for="" class="form-label">Dashboard</label>
                        </div>
                        <div class='ml-auto'>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <label for="" class='form-label ml-2'>Pages</label>
                        </div>
                        <div class="ml-auto">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-film" aria-hidden="true"></i>
                            <label for="" class='form-label'>Applications</label>
                        </div>

                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-compass" aria-hidden="true"></i>
                            <label for="" class='form-label'>UI Component</label>
                        </div>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-windows" aria-hidden="true"></i>
                            <label for="" class='form-label'>Widgets</label>
                        </div>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-fort-awesome" aria-hidden="true"></i>
                            <label for="" class='form-label'>Forms</label>
                        </div>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    <div class="mt-2 d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <label for="" class='form-label'>Charts</label>
                        </div>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div style="background-color: #fff;">
                    <div class='m-3'>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-lg-8 mt-3">
                                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                                    <div class="input-group">
                                        <input type="search" placeholder="Search here...." aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                        <div class="input-group-append">
                                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-4  d-flex align-items-center justify-content-between'>
                                <div>
                                    <i class="fa fa-bell-slash-o" aria-hidden="true"></i>
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                </div>
                                <img src="https://thuthuatnhanh.com/wp-content/uploads/2018/07/anh-dai-dien-dep.jpg" alt="ảnh" style="width: 50px;height:50px;border-radius:50%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" style="background-color:#fff ;">
                    <div class="row">
                        <div class="col-6">
                            <div class="m-4 p-3" style="color:#fff;background-color:dodgerblue;border-radius:10px">
                                <p>Total Income</p>
                                <h2>$ 579,000</h2>
                                <p>Save 25%</p>
                            </div>
                            <div class="m-4 p-3" style="color:#fff;background-color:cornflowerblue;border-radius:10px">
                                <p>Cash on Hand</p>
                                <h2>$ 92,000</h2>
                                <p>Save 25%</p>
                            </div>
                            <div class="mt-4 mr-4">
                                <h6>API and AR Balance</h6>
                                <p>Avg $5.093</p>
                                <div class="simple-bar-chart ">
                                    <div class="item" style="--clr: #963D97; --val: 80">
                                        <div class="label">Jan 01</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 70">
                                        <div class="label">Jan 11</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 50">
                                        <div class="label">Jan 20</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 100">
                                        <div class="label">Feb 04</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 15">
                                        <div class="label">March 11</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 1">
                                        <div class="label">March 20</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 20">
                                        <div class="label">March 22</div>
                                    </div>
                                    <div class="item" style="--clr: #963D97; --val: 90">
                                        <div class="label">March 30</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-4 mr-4 p-3" style="color:#fff;background-color:lightskyblue;border-radius:10px">
                                <p>Cash on Hand</p>
                                <h2>$ 79,000</h2>
                                <p>Save 25%</p>
                            </div>
                            <div class="mt-4 mr-4 p-3" style="color:#fff;background-color:lightgreen;border-radius:10px">
                                <p>Net Profit Margin</p>
                                <h2>$ 179,000</h2>
                                <p>Save 65%</p>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 mt-4 mb-4 " style="background-color:ghostwhite;">
                                        <p>% of income Budget</p>
                                        <div class="svg-item">
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
                                                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
                                                <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="69 31" stroke-dashoffset="25"></circle>
                                                <g class="donut-text donut-text-1">
                                                    <text y="50%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-percent">69%</tspan>
                                                    </text>
                                                    <text y="60%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-data">3450 widgets</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                        <hr>
                                        <a href="#">View full Report</a>
                                    </div>
                                   
                                    <div class="col-6 mt-4 mb-4" style="background-color:ghostwhite;">
                                        <p>% of income Budget</p>
                                        <div class="svg-item">
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
                                                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
                                                <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="69 31" stroke-dashoffset="25"></circle>
                                                <g class="donut-text donut-text-1">
                                                    <text y="50%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-percent">69%</tspan>
                                                    </text>
                                                    <text y="60%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-data">3450 widgets</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                        <hr>
                                        <a href="#">View full Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <script src="{{asset('asserts/js/bootstrap.min.js')}}"></script>

</body>

</html>