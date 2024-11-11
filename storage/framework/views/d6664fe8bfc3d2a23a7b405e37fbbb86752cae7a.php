<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li class="nav-item active">
        <a class="nav-link text-center" href="<?php echo e(route('dashboard')); ?>">
            <img src="<?php echo e(asset('img/logo-footer.png')); ?>" width="30px">
            <span><b>SmartBAPP</b></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface BAPP
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('varcost')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>VARCOST</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('somsa')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>SOMSA</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('son')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>PW</span></a>
    </li>

    <div class="sidebar-heading">
        Expense
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Expense Me</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Expense Claim</span></a>
    </li>
 
     <!-- Tambahkan tombol toggle di sini -->
     
    <!-- Nav Item - Pages Collapse Menu -->
    

    

</ul><?php /**PATH C:\laragon\www\bapp\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>