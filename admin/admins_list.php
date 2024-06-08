<?php
require_once "core/auth.php";
include "template/header.php";
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none ">Home</a></li>
                <li class="breadcrumb-item active fw-bold user-select-none" aria-current="page">Admins List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-uppercase">
                        <i class="feather-list text-primary me-2"></i>Admin List
                    </h4>
                    <div class="">

                        <a href="#" class="btn btn-outline-secondary full-screen-btn"><i
                                class="feather-maximize-2"></i></a>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-12 mt-3 mb-4">
                        <div class="">
                            <div class="" style="overflow-x: scroll">
                                <table class="table table-hover" id="products-list">
                                    <thead class="text-uppercase">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Photo</th>
                                        <th>Created At</th>
                                        <?php if ($_SESSION['user']['role'] != 2) { ?>

                                        <th>Options</th>
                                        <?php } ?>

                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach (users() as $i) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;
                                                    $no++; ?></td>
                                            <td class="text-nowrap"><?php echo $i['name']; ?></td>
                                            <td><?php echo $i['email']; ?></td>
                                            <td><?php echo $role[$i['role']]; ?></td>
                                            <td>
                                                <img src="<?php echo $url ?>/images/<?php echo $i['photo']; ?>"
                                                    width="100px" alt="">
                                            </td>
                                            <td><?php echo showTime($i['created_at'], "d-m-Y"); ?></td>
                                            <td class="text-nowrap">
                                                <?php if ($_SESSION['user']['role'] == 0) { ?>

                                                <a onclick="return confirm('Are you sure to delete?')"
                                                    href="delete_admin.php?id=<?php echo $i['id']; ?>"
                                                    class="btn btn-sm btn-outline-danger">
                                                    <i class="feather-trash-2"></i>
                                                </a>
                                                <?php } ?>
                                                <?php if ($_SESSION['user']['role'] != 2) { ?>

                                                <a href="update_admin.php?id=<?php echo $i['id']; ?>"
                                                    class="btn btn-sm btn-outline-warning mb-2 mb-xl-0">
                                                    <i class="feather-edit-2"></i>
                                                </a>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--    end coding to show products list-->




<?php include "template/footer.php"; ?>

<script>
$(".table").dataTable({
    "order": [
        [0, "desc"]
    ]
});
</script>