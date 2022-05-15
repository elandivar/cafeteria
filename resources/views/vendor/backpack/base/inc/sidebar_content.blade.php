<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Productos -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-coffee"></i> Productos</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-boxes'></i> Categorías</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'><i class='nav-icon la la-coffee'></i> Productos</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('product-price') }}'><i class='nav-icon la la-tags'></i> Precios</a></li>    
    </ul>
</li>
<!-- Caja -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cash-register"></i> Caja</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cash-register-closure') }}'><i class='nav-icon la la-cash-register'></i> Cierre caja</a></li>
    </ul>
</li>
<!-- Empleados -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Empleados</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('employee') }}'><i class='nav-icon la la-users'></i> Empleados</a></li>
    </ul>
</li>
<!-- Inventario -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-warehouse"></i> Proveeduría</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('supplier') }}'><i class='nav-icon la la-people-carry'></i> Proveedores</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('supplier-request') }}'><i class='nav-icon la la-shipping-fast'></i> Recepción Pedido</a></li>  
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('payment') }}'><i class='nav-icon la la-money-bill-wave'></i> Pago Proveedor</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('stocktaking') }}'><i class='nav-icon la la-balance-scale'></i> Arqueo inventario</a></li>
    </ul>
</li>
<!-- Contabilidad -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-briefcase"></i> Contabilidad</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('account-transactions') }}'><i class='nav-icon la la-question'></i> Account transactions</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('chart-account') }}'><i class='nav-icon la la-file-invoice-dollar'></i> Chart accounts</a></li>
    </ul>
</li>