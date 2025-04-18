<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            position: relative;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin: 15px 0;
            min-height: 100px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .card div:first-child {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            color: #4e73df;
            margin-bottom: 10px;
        }

        .card div:nth-child(2) {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .card .icon {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #ddd;
        }
    </style>
    {{-- resources/views/DoAn_NhomF/admin/revenue.blade.php --}}
    @include('DoAn_NhomF.admin.header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <div id="search">
        <form action="" method="get">
            <input type="text" name="keyword" placeholder="Search here..." />
            <button type="submit" class="tip-bottom" title="Search">
                <i class="icon-search icon-white"></i>
            </button>
        </form>
    </div>

    @include('DoAn_NhomF.admin.sidebar')

    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="" title="Go to Home" class="tip-bottom current">
                    <i class="icon-home"></i> Home
                </a>
            </div>
            <h1>THỐNG KÊ</h1>
        </div>

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        {{-- Card Start --}}
                        @php
                        $cards = [
                        ['label' => 'DANH THU THÁNG NÀY', 'value' => '32,990,000 VNÐ', 'color' => '#1cc88a', 'icon' => 'fa-dollar-sign'],
                        ['label' => 'DANH THU NAM NAY', 'value' => '567,890,000 VNÐ', 'color' => '#1cc88a', 'icon' => 'fa-dollar-sign'],
                        ['label' => 'KHÁCH HÀNG', 'value' => '6', 'color' => '#36b9cc', 'icon' => 'fa-calendar'],
                        ['label' => 'THUONG HI?U', 'value' => '8', 'color' => '#36b9cc', 'icon' => 'fa-calendar'],
                        ['label' => 'LO?I GIÀY', 'value' => '4', 'color' => '#36b9cc', 'icon' => 'fa-calendar'],
                        ['label' => 'GIÀY', 'value' => '24', 'color' => '#36b9cc', 'icon' => 'fa-calendar'],
                        ['label' => 'KHUY?N MÃI', 'value' => '5', 'color' => '#36b9cc', 'icon' => 'fa-calendar'],
                        ['label' => 'HÓA ÐON', 'value' => '2', 'color' => '#f6c23e', 'icon' => 'fa-comments'],
                        ];
                        @endphp

                        @foreach ($cards as $card)
                        <div class="span3">
                            <div class="card">
                                <!-- <div style="font-weight: bold; color: {{ $card['color'] }}; text-transform: uppercase; font-size: 13px;">
                                    {{ $card['label'] }}
                                </div>
                                <div style="font-size: 20px; font-weight: bold; color: #333;">
                                    {{ $card['value'] }}
                                </div>
                                <div class="icon" style="position: absolute; right: 20px; top: 20px; color: #ddd;">
                                    <i class="fas {{ $card['icon'] }} fa-2x"></i>
                                </div> -->

                                <div style="font-weight: bold;">
                                    {{ $card['label'] }}
                                </div>
                                <div style="font-size: 20px; font-weight: bold; color: #333;">
                                    {{ $card['value'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- Card End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->

    <div class="row-fluid">
        <div id="footer" class="span12">2025 &copy; TDC - Lập trình web 1</div>
    </div>

    @include('DoAn_NhomF.admin.footer')