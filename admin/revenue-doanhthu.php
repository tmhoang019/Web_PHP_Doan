/*
KHONG DUNG TOI
*/
<?php
    $target= "SELECT AVG(Thanhtien) as sum FROM 'chitiethoadon'";
    $rs = mysqli_query($connect,$target);
    $result= mysqli_fetch_array($rs);
    $sum= $result['sum'];
    if(isset($_REQUEST['input_date_now'])){
        $date=$_REQUEST['input_date_now'];
    }
    else $date=date_create(date("Y-m-d"));

?>

<!-- REVENUE TYPE MONTH  -->
<div class="revenue-container ">
    <h2 class="admin-tittle">Doanh thu nhà hàng</h2>
    <form action="?page-layout=revenue" class="input-month" method="GET" >
        <input type="hidden" name="page-layout" value="revenue">
        <input type="date" name="input_date_now" id="date" class="input-number" value="<?php if(isset($_REQUEST['input_date_now']) and $date!="1000-01-01"){ echo $date;}  ?>">
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
                 if(isset($_REQUEST['input_date_now'])){
                    $date=date_create($_REQUEST['input_date_now']);
                }
                else $date=date_create(date("Y-m-d"));
                for ($top = 3;$top >=0; $top--) {  
                    date_modify($date,"-$top days");
                    $datetime=date_format($date,"Y-m-d");
                    $doanhthu_temp="SELECT * FROM hoadon where Ngaydat=\"$datetime\" and idtrangthai=4";
                    $result=mysqli_query($connect,$doanhthu_temp);
                    $sum_date=0;
                    while($rs= mysqli_fetch_array($result))
                    {
                        $sum_date+= $rs['Tongtien'];
                    }     
                    $temp = round($sum_date*100/$sum,2);
                    echo " <li><div class='bar bar2' data-percentage='$temp'></div>
                          <span>";
                    echo $datetime;
                    echo "</span></li>";
                    date_modify($date,"+$top days");
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
    