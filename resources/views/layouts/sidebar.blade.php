     @php
       $prefix = Request:: route()->getPrefix();
       $route = Route::current()->getName();
     @endphp

     
     <!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
         @if(Auth::user()->usertype=='Admin')
            <li class="nav-item {{( $prefix=='/users')? 'menu-open': ''}}">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  &nbsp;Manage User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View User</p>
                  </a>
                </li>
              </ul>
            </li>  
           @endif

           <li class="nav-item {{( $prefix=='/profiles')? 'menu-open': ''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                &nbsp; Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('password.view')}}" class="nav-link {{($route=='password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Passwoard</p>
                </a>
              </li>
            </ul>
           </li>  
           {{-- Supplyer --}}

           <li class="nav-item {{( $prefix=='/suppliers')? 'menu-open': ''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-shuttle-van"></i>
              <p>
                &nbsp;Manage Suppliers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suppliers.view')}}" class="nav-link {{($route=='suppliers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Suppliers</p>
                </a>
              </li>

            </ul>
           </li>  


          {{-- Customer --}}

        <li class="nav-item {{( $prefix=='/customers')? 'menu-open': ''}}">
          <a href="#" class="nav-link">
            <i class="fas fa-users"></i> 
            <p>
              &nbsp; Manage Customers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Customers</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('customers.credit')}}" class="nav-link {{($route=='customers.credit')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Credit Customers</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('customers.paid')}}" class="nav-link {{($route=='customers.paid')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Paid Customers</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('customers.wise.report')}}" class="nav-link {{($route=='customers.wise.report')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Customers Wise Report</p>
              </a>
            </li>
          </ul>
        </li>  
                   {{-- Customer --}}

      {{-- Units --}}
      <li class="nav-item {{( $prefix=='/units')? 'menu-open': ''}}">
          <a href="#" class="nav-link">
            <i class="fas fa-bullseye"></i>
            <p>
              &nbsp; Manage Units
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('units.view')}}" class="nav-link {{($route=='units.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Units</p>
              </a>
            </li>
          </ul>
      </li>  
      {{-- Units --}}

      {{-- Category --}}
      <li class="nav-item {{( $prefix=='/categoris')? 'menu-open': ''}}">
        <a href="#" class="nav-link">
          <i class="fas fa-cash-register"></i>
          <p>
            &nbsp;Manage Categories
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('categories.view')}}" class="nav-link {{($route=='categories.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Categories</p>
            </a>
          </li>
        </ul>
    </li>  
    {{-- Category --}}
      {{-- Manage Products --}}
      <li class="nav-item {{( $prefix=='/products')? 'menu-open': ''}}">
        <a href="#" class="nav-link">
          <i class="fas fa-cash-register"></i>
          <p>
            &nbsp;Manage Products
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('products.view')}}" class="nav-link {{($route=='products.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Products</p>
            </a>
          </li>
        </ul>
    </li>  
  {{-- Manage Products --}}


    {{-- Manage Spplies --}}
    <li class="nav-item {{( $prefix=='/purchases')? 'menu-open': ''}}">
      <a href="#" class="nav-link">
        <i class="fas fa-cash-register"></i>
        <p>
          &nbsp;Manage Purchase
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('purchases.view')}}" class="nav-link {{($route=='purchases.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Purchase</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('purchases.pending.list')}}" class="nav-link {{($route=='purchases.pending.list')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Approval Purchase</p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('purchases.report')}}" class="nav-link {{($route=='purchases.report')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily Purchase Report</p>
          </a>
        </li>
      </ul>
    </li>  
    {{-- Manage Spplies --}}



    {{-- Manage Spplies --}}
    <li class="nav-item {{( $prefix=='/invoice')? 'menu-open': ''}}">
      <a href="#" class="nav-link">
        <i class="fas fa-cash-register"></i>
        <p>
          &nbsp;Manage Invoice
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('invoice.view')}}" class="nav-link {{($route=='invoice.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Invoice</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('invoice.pending.list')}}" class="nav-link {{($route=='invoice.pending.list')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Approval Invoice</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('invoice.list')}}" class="nav-link {{($route=='invoice.list')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Invoice List</p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('invoice.daily.report')}}" class="nav-link {{($route=='invoice.daily.report')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily invoice report</p>
          </a>
        </li>
      </ul>

    </li>  
    {{-- Manage Spplies --}}

    {{-- Manage Stock --}}
    <li class="nav-item {{( $prefix=='/stock')? 'menu-open': ''}}">
      <a href="#" class="nav-link">
        <i class="fas fa-cash-register"></i>
        <p>
          &nbsp;Manage Stock
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('stock.report')}}" class="nav-link {{($route=='stock.report')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Stock Report</p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('stock.report.supplier.product.wise')}}" class="nav-link {{($route=='stock.report.supplier.product.wise')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Supplier/Product Wise</p>
          </a>
        </li>
      </ul>

    </li>  
    {{-- Manage Stock --}}
    </ul>  
  </nav>
</div>
    <!-- /.sidebar -->