<?php 
include_once 'top.php';
include_once '../common/mysql.php';
$conn = connect();
?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <!--  <h1 class="page-header">Dashboard</h1> -->


          <h2 class="sub-header">户型列表</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>户型</th>
                  <th colspan='2' class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                
            <?php 
            $query = "select * from h_type";
            $result = execute($conn, $query);
            while ($data = mysqli_fetch_assoc($result)){
            ?>   
          	  <tr> 
                 <td><?php echo $data['id']?></td>
                  <td><?php echo $data['h_type_name']?></td>
                  <td><a href="huxing_delete.php?id=<?php echo $data['id']?>">删除</a></td>
                  <td><a href="huxing_edit.php?id=<?php echo $data['id']?>">编辑</a></td>
               </tr>
           <?php 
            }
           ?>       
                  
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  
  
