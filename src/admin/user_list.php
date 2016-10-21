<?php 
include_once 'top.php';
include_once '../common/mysql.php';
$conn = connect();
?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <!--  <h1 class="page-header">Dashboard</h1> -->


          <h2 class="sub-header">用户列表</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>用户名</th>
                  <th>注册日期</th>
                  <th>IP地址</th>
                   <th>email</th>
                   <th>电话</th>
                  <th colspan='2' class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                
            <?php 
            $query = "select * from user";
            $result = execute($conn, $query);
            while ($data = mysqli_fetch_assoc($result)){
            ?>   
          	  <tr> 
                 <td><?php echo $data['id']?></td>
                  <td><?php echo $data['name']?></td>
                    <td><?php echo $data['reg_time']?></td>
                    <td><?php echo $data['loal_ip']?></td>
                       <td><?php echo $data['email']?></td>
                          <td><?php echo $data['cellphone']?></td>
                  <td><a href="user_delete.php?id=<?php echo $data['id']?>">删除</a></td>
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
  
  
