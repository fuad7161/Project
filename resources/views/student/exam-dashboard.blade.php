@extends('layout/layout-common')

@section('space-work')

@php
    $time = explode(':',$exam[0]['time']);
@endphp

<div class="container">
    <p style="color:black;">Welcome , {{ Auth::user()->name }}</p>
    <h1 class="text-center">{{ $exam[0]['exam_name'] }}</h1>
    @php $qcount = 1;@endphp 
    @if($success == true)      
        @if(count($qna) > 0)
            <h4 class="text-right time">{{ $exam[0]['time'] }}</h4> 
            <!-- onsubmit="return isValid()" -->
            <form action="{{route('examSubmit')}}" metod="POST" id="exam_form" class="mb-5" >
            @csrf    
            <input type="hidden" name="exam_id" value="{{ $exam[0]['id'] }}">

                @foreach($qna as $data)
                    <div>
                        <h5>Q.{{$qcount++}}. {{$data['question'][0]['question']}}</h5>
                        <input type="hidden" name="q[]" value="{{$data['question'][0]['id']}}">
                        <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}">
                        @php $acount = 1;@endphp
                        @foreach($data['question'][0]['answers'] as $answer)
                            <p><b>{{$acount++}} . </b>{{$answer['answer']}}
                                <input type="radio" name="radio_{{$qcount-1}}" data-id="{{$qcount-1}}" class="select_ans" value="{{$answer['id']}}">
                            </p>
                        @endforeach
                    </div>
                    <br>
                @endforeach
                <div class="text-center">
                    <input type="submit" class="btn btn-info">
                </div>
            </form>
        @else
            <h3 style="color:red;" class="text-center">Question & Answer is not available.</h3>
        @endif
    @else
        <h3 style="color:red" class="text-center">{{$msg}}</h3>
    @endif
</div>

<script>
    $(document).ready(function(){
        $('.select_ans').click(function(){
            var no = $(this).attr('data-id');
            $('#ans_'+no).val($(this).val());
        });

        var time = @JSON($time);
        $('.time').text(time[0]+':'+time[1]+':00 left time');

        var seconds = 60;
        var hours = parseInt(time[0]);
        var minute = parseInt(time[1]-1);

        setInterval(() => {

            console.log(hours);
            console.log(minute);
            console.log(seconds);
            if(hours == 0 && minute == 0 && seconds == 0){
                    clearInterval(time);
                    $('#exam_form').submit();
            }
            if(seconds < 0){
                minute--;
                seconds = 59;
            }
            if(minute < 0 && hours > 0){
                hours--;
                minute = 59;
                seconds = 59;
            }
            seconds--;
            let temH = hours.toString().length > 1? hours:'0'+hours;
            let temM = minute.toString().length > 1? minute:'0'+minute;
            let temS = seconds.toString().length > 1? seconds:'0'+seconds;
            $('.time').text(temH+':'+temM+':'+temS+' Left time');
        }, 1000);

    }); 
    
    function isValid(){
        var result = true;
        var qlenght = parseInt("{{$qcount}}")-1;
        $('.error_msg').remove();
        for(let i=1;i<=qlenght;i++){
            if($('#ans_'+i).val() == ""){
                result = false;
                $('#ans_'+i).parent().append('<span style="color:red;" class="error_msg">Please select answer.</span>')
                setTimeout(() => {
                    $('.error_msg').remove();
                }, 1000);
            }
        }
        return result;
    };
</script>

@endsection