
<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                ADMIN | DASHBOARD
            </a>
        </div>
         <ul class="nav">
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="fa fa-envelope"></i>
                    <p>Inbox</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/products/create') }}">
                    <i class="fa fa-user-plus"></i>
                    <p>Add License Holder</p>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/viewLicense') }}">
                    <i class="fa fa-vcard-o"></i>
                    <p>View License Holders</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-users"></i>
                    <p>User Management</p>
                </a>
            </li>
           
            <li>
                <a href="{{ url('/document') }}">
                    <i class="fa fa-upload"></i>
                    <p>Upload Reports</p>
                </a>
            </li>
        </ul>
    </div>
</div>
