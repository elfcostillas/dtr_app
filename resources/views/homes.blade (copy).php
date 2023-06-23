<script>
    $(".clock_in_btn").on('click',function(){
        $.post('clockin',{
            data : this.value
        },function(){
            
            $("#maindiv").load('datatable/Y');
            setTimeout(() => {
                logout();
            }, 1500);
        });
    });
</script>
<?php 
    function showOption($data,$key)
    {
      
        if($data[$key]!="")
        {
            return $data[$key];
        }else{
            if($data['diff'] >1){
                return '';
            }
            return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
        }   
    }

?>

<div class="row justify-content-center">
        <div class="col-md-8">
        <div class="alert alert-success" style="display:{{ ($show=='Y') ? 'block' : 'none' }}" role="alert">
            Clock In successful.
        </div>
            <table class="table">
                <!-- <thead class="thead-light"> -->
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time In</th>
                    <th scope="col">Time Out</th>
                    <th scope="col">O.T. In</th>
                    <th scope="col">O.T. Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dates as $date)
                        <tr>
                            <td>{{ $date->shortEnglishDayOfWeek }}</td>
                            <td>{{ $date->format('m/d/Y') }}</td>
                            <td> <?php echo showOption($data_array[$date->format('Y-m-d')],'time_in'); ?> </td>
                            <td> <?php echo showOption($data_array[$date->format('Y-m-d')],'time_out'); ?> </td>
                            <td> <?php echo showOption($data_array[$date->format('Y-m-d')],'overtime_in'); ?> </td>
                            <td> <?php echo showOption($data_array[$date->format('Y-m-d')],'overtime_out'); ?> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>