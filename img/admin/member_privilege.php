<?php

if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1 style="color:white;">Phân quyền thành viên</h1>
        <div id="content-box">
            <?php
            if (!empty($_GET['action']) && $_GET['action'] == "save")
             {
                $data = $_POST;
                
                $insertString = "";
                
                
                if(empty($data['privileges'])){ ?>
                     Cần có tối thiểu 1 quyền. <a href="admin.php?page-layout=phanquyen&id=<?php echo $data['user_id'];?>">Quay lại</a>
          <?php exit;}
                $deleteOldPrivileges = mysqli_query($connect, "DELETE FROM user_privilege WHERE user_id = ".$data['user_id']);
                $date = getdate();
                $time =$date['mday'];
                $time.=$date['mon'];
                $time.=$date['year'];
                
                foreach ($data['privileges'] as $insertPrivilege) {
                    $insertString .= !empty($insertString) ? "," : "";
                    $insertString .= "(NULL, " . $data['user_id'] . ", " . $insertPrivilege . ", $time)";
                }
                
                $insertPrivilege = mysqli_query($connect, "INSERT INTO user_privilege (id, user_id, pri_id, last_update) VALUES " . $insertString);
                if(!$insertPrivilege){
                    $error = "Phân quyền không thành công. Xin thử lại";
                }
                ?>
                <?php if(!empty($error)){ 
                    echo $error;
                } else { ?>
                    Phân quyền thành công. <a href="admin.php?page-layout=danhsach-member">Quay lại danh sách nhân viên</a>
                <?php } ?>
            <?php } else { ?>
                <?php
                $privileges = mysqli_query($connect, "SELECT * FROM privilege");
                $privileges = mysqli_fetch_all($privileges, MYSQLI_ASSOC);
                
                $privilegeGroup = mysqli_query($connect, "SELECT * FROM privilege_group ORDER BY privilege_group.position ASC");
                $privilegeGroup = mysqli_fetch_all($privilegeGroup, MYSQLI_ASSOC);
                
                $currentPrivileges = mysqli_query($connect, "SELECT * FROM user_privilege WHERE user_id = ".$_GET['id']);
                $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                $currentPrivilegeList = array();
                if(!empty($currentPrivileges)){
                    foreach($currentPrivileges as $currentPrivilege){
                        $currentPrivilegeList[] = $currentPrivilege['pri_id'];
                    }
                }
                ?>
                <form id="editing-form" method="POST" action="?page-layout=phanquyen&action=save" enctype="multipart/form-data">
                    <button name="sbm" type="submit" class="btn btn-success" style="float:right;">Cập nhật</button>
                    <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>" />
                    <div class="clear-both"></div>
                    <?php foreach ($privilegeGroup as $group) { ?>
                        <div class="privilege-group">
                            <h3 class="group-name" style="color:Red;"><?= $group['name'] ?></h3>
                            <ul>
                                <?php foreach ($privileges as $privilege) { ?>
                                    <?php if ($privilege['group_id'] == $group['id']) { ?>
                                        <li>
                                            <input type="checkbox"
                                                <?php if(in_array($privilege['id'], $currentPrivilegeList)){ ?> 
                                                checked=""    
                                                <?php } if($privilege['id']==10 || $privilege['id']==19){?>onchange="checkTK(this)"<?php } if($privilege['id']==16){?>onchange="checkTK2(this)"<?php }?>
                                              value="<?= $privilege['id'] ?>" id="privilege_<?= $privilege['id'] ?>" name="privileges[]" />
                                            <label for="privilege_<?= $privilege['id'] ?>" style="color:Red;"><?= $privilege['name'] ?></label>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                                <div class="clear-both"></div>
                            </ul>
                        </div>
                    <?php } ?>
                </form>
            <?php } ?>
        </div>
    </div>

<?php
}
?>
<script>
  function checkTK(e){
  if (e.checked){
  document.getElementById("privilege_16").checked = true;
  }
  
  }

  function checkTK2(e){
  if (!e.checked){
  document.getElementById("privilege_10").checked = false;
  document.getElementById("privilege_19").checked = false;
  }
  }
</script>