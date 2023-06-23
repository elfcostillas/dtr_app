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
        
        if($data['nextDay']){
            if($data['nextDay']->time_in != null || $data['nextDay']->time_out != null  ){
               
                return $data[$key];
                
            }else{
               
                return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
            }
        }else {
            // dd($data);
            
            if($data[$key]!=null)
            {
                return $data[$key];
            }else{
                if($data['diff'] >1){
                    return '';
                }
                else {
                    switch($key){
                        case 'time_in' :
                                if($key=='time_in' && $data['time_out'] != ""){
                                    return '';
                                }else {
                                    return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Time In </button>';
                                }
                            break;
                        case 'time_out' :
                            if($key=='time_out' && $data['overtime_in'] != ""){
                                return '';
                            }else {
                                return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Time Out</button>';
                            }

                        break;
                        case 'overtime_in' :
                            if($key=='overtime_in' && $data['overtime_out'] != ""){
                                return '';
                            }else {
                                return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Time In </button>';
                            }
                        break;
                        case 'overtime_out' :
                            // if($key=='overtime_out' && $data['overtime_out'] != ""){
                            //     return '';
                            // }else {
                            //     return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
                            // }
                            if($data['nextDay']){
                                if($data['nextDay']->time_in != null || $data['nextDay']->time_out != null  ){
                                   
                                    return $data[$key];
                                    
                                }else{
                                   
                                    return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Time Out </button>';
                                }
                            }else {
                                return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Time Out </button>';
                            }
                        break;
                    }

                  

                    // if($key=='overtime_in' && $data['overtime_out'] != ""){
                      
                    //     return '';
                    // }else {
                    //     return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
                    // }
                }
                // return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
            }
        }









        // if($data[$key]!="")
        // {
        //     return $data[$key];
        // }else{
        //     if($data['diff'] >1){
        //         return '';
        //     }
        //     return '<button class="btn btn-primary clock_in_btn" value="'.$data['date'].'|'.$key.'"> Clock IN </button>';
        // }   
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