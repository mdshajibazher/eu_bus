@extends('layouts.app')


@push('css_js')
    <link rel="stylesheet" type="text/css" href="{{asset('public/asset/css/seat_reservation.css')}}">
    <script>
        var settings = {
               rows: 4,
               cols: 10,
               rowCssPrefix: 'row-',
               colCssPrefix: 'col-',
               seatWidth: 40,
               seatHeight: 40,
               seatCss: 'seat',
               selectedSeatCss: 'selectedSeat',
               selectingSeatCss: 'selectingSeat'
           };
           
           
           var init = function (reservedSeat) {
                var str = [], seatNo, className;
                for (i = 0; i < settings.rows; i++) {
                    for (j = 0; j < settings.cols; j++) {
                        seatNo = (i + j * settings.rows + 1);
                        className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                        if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                            className += ' ' + settings.selectedSeatCss;
                        }
                        str.push('<li class="' + className + '"' +
                                  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                  '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                  '</li>');
                    }
                }
                $('#place').html(str.join(''));
            };
            //case I: Show from starting
            //init();
 
            //Case II: If already booked
            var bookedSeats = [5, 10, 25];
            init(bookedSeats);
            
            $('.' + settings.seatCss).click(function () {
if ($(this).hasClass(settings.selectedSeatCss)){
    alert('This seat is already reserved');
}
else{
    $(this).toggleClass(settings.selectingSeatCss);
    }
});
 
$('#btnShow').click(function () {
    var str = [];
    $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
        str.push($(this).attr('title'));
    });
    alert(str.join(','));
})
 
$('#btnShowNew').click(function () {
    var str = [], item;
    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
        item = $(this).attr('title');                   
        str.push(item);                   
    });
    alert(str.join(','));
});
    </script>
@endpush



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2> Choose seats by clicking the corresponding seat in the layout below:</h2>
                        <div id="holder"> 
                            <ul  id="place">
                            </ul>    
                        </div>
                        <div style="float:left;"> 
                        <ul id="seatDescription">
                            <li style="background:url('public/image/seat/available_seat_img.gif') no-repeat scroll 0 0 transparent;">Available Seat</li>
                            <li style="background:url('public/image/seat/booked_seat_img.gif') no-repeat scroll 0 0 transparent;">Booked Seat</li>
                            <li style="background:url('public/image/seat/selected_seat_img.gif') no-repeat scroll 0 0 transparent;">Selected Seat</li>
                        </ul>
                        </div>
                            <div style="clear:both;width:100%">
                            <input type="button" id="btnShowNew" value="Show Selected Seats" />
                            <input type="button" id="btnShow" value="Show All" />           
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
