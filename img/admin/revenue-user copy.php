<?php
$date_low="";
$date_high="";
if(isset($_REQUEST['input_date_low'])){
    $date_low=$_REQUEST['input_date_low'];
}
if(isset($_REQUEST['input_date_high'])){
    $date_high=$_REQUEST['input_date_high'];
}
if($date_high==""){
    $date_high="9999-01-01";
}
if($date_low==""){
    $date_low="1000-01-01";
}
$sql="SELECT * FROM hoadon WHERE Ngaydat > \"$date_low\" and Ngaydat < \"$date_high\" ";
$result=mysqli_query($connect,$sql);
//get to length user
$user="SELECT * FROM user";
$query2=mysqli_query($connect,$user);
$query3=mysqli_query($connect,$user);

$user_length=0;
$array_user = array();
while($row=mysqli_fetch_array($query2)){
    $array_user[$row['idKH']]=$row['tenKH'];
    if($row['idKH'] > $user_length){
        $user_length=$row['idKH'];
    }
}
//create array user with all value as 0
$array = array();
for ($i = 0; $i < $user_length+1; $i++) {
    $array[$i] = 0;
}
//Sum of money user 
$sum=0;
while($row=mysqli_fetch_array($result)){
    for($index1=0;$index1<$user_length+1;$index1++)
            if($row['idKH']==$index1){
                $array[$index1]+=$row['Tongtien'];
            }
            $sum+=$row['Tongtien'];      
}
if($sum==0){
    $sum=1;
}
//create array_copy get value from array
$array_copy = array();
$array_copy=$array;
//sort array_copy
rsort($array_copy);


?>

<!-- REVENUE TYPE MONTH  -->
<div class="revenue-container ">
    <h2 class="admin-tittle">Top 4 khách hàng thân thiết</h2>
    
    <form action="?page-layout=revenue" class="input-month" method="GET" >
    <input type="hidden" name="page-layout" value="revenue">
    <input type="date" name="input_date_low" id="date" class="input-number" value="<?php if(isset($_REQUEST['input_date_low']) and $date_low!="1000-01-01"){ echo $date_low;}  ?>">
    <span> -</span>
    <input type="date" name="input_date_high" id="date" class="input-number" value="<?php if(isset($_REQUEST['input_date_high']) and $date_high!="9999-01-01"){ echo $date_high;}  ?>">
    <button class="btn-search" type="submit" style="filter: none;background: inherit;">
                        <i class="icon-search-admin fas fa-search"></i></button>
    </form>
    <div class="table-ratings">
        <div class="chart">
            <ul class="numbers">
                <li><span>100%</span></li>
                <li><span>80%</span></li>
                <li><span>60%</span></li>
                <li><span>40%</span></li>
                <li><span>20%</span></li>
                <li><span>0</span></li>
            </ul>
            <ul class='bars'>
                <?php
                for ($top = 0; $array_copy[$top] and $top <4; $top++) {
                    for ($index1 = 0; $index1 < $user_length +1 ; $index1++) {
                        if ($array_copy[$top] == $array[$index1]) {
                            $temp = round($array_copy[$top]*100/$sum,2);
                            echo " <li>
                         <div class='bar bar2' data-percentage='$temp'></div>
                         <span>";
                                echo $array_user[$index1];
                                echo "  </span>
                            </li>";
                            $array[$index1]=-1;
                            break;
                        }
                    }
                }              
                ?>
            </ul>
        </div>


    </div>


    <script>
        const chart2 = document.querySelectorAll('.bar2');
        for (let index = 0; index < chart2.length; index++) {
            const element2 = chart2[index];
            element2.style.height = `${element2.getAttribute('data-percentage')}%`;
        }
    </script>
    