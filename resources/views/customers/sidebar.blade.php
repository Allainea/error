<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
          <ul>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">Main</h6>
                  <ul>
                    <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a href="{{ url('admin/home') }}"><i data-feather="grid"></i><span>Dashboard</span></a></li>
                  </ul>
              </li>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">Products</h6>
                  <ul>
                    <li><a href="{{ url('admin/productlist') }}"><i data-feather="box"></i><span>Products</span></a></li>
                    <li class="{{ Request::routeIs('admin.product.create') ? 'active' : '' }}"><a href="{{ route('admin.product.create') }}"><i data-feather="plus-square"></i><span>Create Product</span></a></li>
                  </ul>
              </li>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">Sales</h6>
                  <ul>
                      <li><a href="saleslist.html"><i data-feather="shopping-cart"></i><span>Sales</span></a></li>
                      <li><a href="invoicereport.html"><i data-feather="file-text"></i><span>Invoices</span></a></li>
                      <li><a href="pos.html"><i data-feather="hard-drive"></i><span>POS</span></a></li>
                  </ul>
              </li>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">Peoples</h6>
                  <ul>
                      <li><a href="customerlist.html"><i data-feather="user"></i><span>Customers</span></a></li>
                  </ul>
              </li>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">Reports</h6>
                  <ul>
                      <li><a href="salesreport.html"><i data-feather="bar-chart-2"></i><span>Sales Report</span></a></li>
                      <li><a href="inventoryreport.html"><i data-feather="credit-card"></i><span>Inventory Report</span></a></li>
                      <li><a href="invoicereport.html"><i data-feather="file"></i><span>Invoice Report</span></a></li>
                      <li><a href="customerreport.html"><i data-feather="pie-chart"></i><span>Customer Report</span></a></li>
                  </ul>
              </li>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">User Management</h6>
                  <ul>
                      <li class="submenu">
                          <a href="javascript:void(0);"><i data-feather="users"></i><span>Manage Users</span><span class="menu-arrow"></span></a>
                          <ul>
                              <li><a href="newuser.html">New User</a></li>
                              <li><a href="userlists.html">Users List</a></li>
                          </ul>
                      </li>
                  </ul>
              </li>
              <li class="submenu-open">
                  <h6 class="submenu-hdr">Settings</h6>
                  <ul>
                      <li class="submenu">
                          <a href="javascript:void(0);"><i data-feather="settings"></i><span>Settings</span><span class="menu-arrow"></span></a>
                          <ul>
                              <li><a href="generalsettings.html">General Settings</a></li>
                              <li><a href="paymentsettings.html">Payment Settings</a></li>
                              <li><a href="currencysettings.html">Currency Settings</a></li>
                          </ul>
                      </li>
                      <li>
                          <a href="signin.html"><i data-feather="log-out"></i><span>Logout</span></a>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
</div>
