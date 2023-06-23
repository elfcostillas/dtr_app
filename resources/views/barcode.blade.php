<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mb-3">{!! DNS1D::getBarcodeSVG('847|123123123', 'C128B',1,60) !!}</div>
    <br>
    @foreach($employees as $employee)
        <div>
            <?php 
                
                if($employee){
                    $code = trim($employee->biometric_id).'|'.str_replace('ñ','{n}',trim($employee->lastname));
                  
                } else {
                    $code = "";
                }
            ?>
            <div style="padding-left:8px;padding-top : 8px;" >{{ trim($employee->lastname) }}, {{ trim($employee->firstname) }}</div>
            <div class="mb-3">{!! DNS1D::getBarcodeSVG($code, 'C128B',1,60) !!}</div>
            
        </div>
    @endforeach
</body>
</html>