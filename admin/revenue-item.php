<?php
$sql = "SELECT * FROM sanpham inner join loaisp on sanpham.idloai = loaisp.idloai";
$query = mysqli_query($connect, $sql);
$sql2 = "SELECT * FROM sanpham";
   $query2 = mysqli_query($connect,$sql2);
	 $n=0;
   while($row2=mysqli_fetch_array($query2)){
	     $n=$row2['idsanpham'];
   }


   $array=array();
   for($i=0;$i<$n+1;$i++){
        $array[$i]=0;
   }
   $sum=0;
   $sql3="SELECT * FROM chitiethoadon";
   $result=mysqli_query($connect,$sql3);
   while($row3=mysqli_fetch_array($result)){
       for($index1=0;$index1<$n+1;$index1++)
            if($row3['idSP']==$index1){
                $array[$index1]+=$row3['Soluong'];
            }
            $sum+=$row3['Soluong'];
   }
   $array_copy=array();
   $array_copy=$array;
   rsort($array_copy);

?>

<div class="revenue-container ">
    <h2 class="admin-tittle">Top các loại món ăn bán nhiều nhất </h2>
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
            for($index=0;$index<4 and $array_copy[$index];$index++){
                $row = mysqli_fetch_assoc($query);
                for($index1=0;$index1<$n+1;$index1++){
                    if($array_copy[$index]==$array[$index1]){
                        $temp= round($array_copy[$index]*100/$sum,2);
                        echo " <li>
                         <div class='bar bar1' data-percentage='$temp'></div>
                         <span>";
                        echo $row['tensp'];
                        echo "  </span>
                            </li>";
                         break;
                    }
                }
                
            }  
            
            ?>

            </ul>
        </div>


    </div>

    <script>
        const chart1 = document.querySelectorAll('.bar1')
        for (let index = 0; index < chart1.length; index++) {
            const element1 = chart1[index];
            element1.style.height = `${element1.getAttribute('data-percentage')}%`

        }
    </script>