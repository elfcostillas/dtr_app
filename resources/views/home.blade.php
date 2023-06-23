@extends('layouts.app')

@section('content')
<script type="text/javascript">
    $(document).ready(function(){
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $("#maindiv").load('datatable/N');
        
        // $(".clock_in_btn").on('click',function(){
        //     $.post('clockin',{
        //         data : this.value
        //     },function(){
              
        //         $("#maindiv").load('datatable');
        //     });
        // });
    });

    function logout()
    {
        // $.post('logout');
        document.getElementById('logout-form').submit();
    }

</script>

<?php 
    function showOption($data,$key)
    {
        if($data[$key]!="")
        {
            return $data[$key];
        }else{
            return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
        }   

        // if($data!=""){
        //     return $data;
        // }else{
        //     return 'button class="btn btn-primary clock_in_btn" value="{{$date->format("Y-m-d})}}|time_in"> Clock IN </button>';
        // }
    }

?>

<div id="maindiv" class="container">
    

</div>
@endsection
