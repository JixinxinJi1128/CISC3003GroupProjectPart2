<?php 
    include('../config/constants.php');

    if (isset($_GET['id']) && isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if ($image_name != "") {
            $path = "../images/category/" . $image_name;
            if (file_exists($path)) {
                $remove = unlink($path);
                if (!$remove) {
                    $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                    exit();
                }
            }
        }
        
        $stmt = $conn->prepare("DELETE FROM tbl_category WHERE id = ?");
        $stmt->bind_param("i", $id);
        $res = $stmt->execute();

        if ($res) {
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        } else {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
        }

        header('location:' . SITEURL . 'admin/manage-category.php');
        exit();
    } else {
        header('location:' . SITEURL . 'admin/manage-category.php');
        exit();
    }
?>