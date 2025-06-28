@extends('user.partials.home')

@section('content')
    <style>
      ul, #tree {
        list-style-type: none;
        padding-left: 1rem;
        font-family: Arial, sans-serif;
      }

      .caret {
        cursor: pointer;
        user-select: none;
        display: inline-block;
        padding: 4px;
      }

      .caret::before {
        content: "▶";
        color: black;
        display: inline-block;
        margin-right: 6px;
      }

      .caret-down::before {
        transform: rotate(90deg);
      }

      .nested {
        display: none;
        padding-left: 1rem;
      }

      .active {
        display: block;
      }

      .table td, .table th {
        vertical-align: middle;
      }
    </style>
    <div class="content-wrapper pb-0">
        
        <!-- Overview Widgets -->
        <div class="row">
            <div class="col-lg-8 grid-margin">
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title mb-0">Total Earnings</h4>
                                <h3 class="fw-bold mb-0">$125,000</h3>
                            </div>
                            <i class="mdi mdi-currency-usd text-success icon-lg"></i>
                            </div>
                            <p class="text-muted font-13 mt-2">Lifetime commissions & bonuses</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                            <h4 class="card-title mb-0">Referral Count</h4>
                            <h3 class="fw-bold mb-0">42</h3>
                            </div>
                            <i class="mdi mdi-account-multiple text-warning icon-lg"></i>
                        </div>
                        <p class="text-muted font-13 mt-2">Total: 42 | Active: 28</p>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 grid-margin">
                <div class="">
                    <!-- Referral Chain Snapshot (Full Width) -->
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title mb-0">Referral Chain Snapshot</h4>
                        <ul id="tree">
                            <li>
                            <span class="caret">
                                You
                            </span>
                            <ul class="nested">
                                <!-- Child 1 -->
                                <li>
                                <span class="caret">Child 1</span>
                                <ul class="nested">
                                    <li>
                                    <span class="caret">Grandchild 1.1</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 1.1.1</li>
                                        <li>Great Grandchild 1.1.2</li>
                                    </ul>
                                    </li>
                                    <li>
                                    <span class="caret">Grandchild 1.2</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 1.2.1</li>
                                        <li>Great Grandchild 1.2.2</li>
                                    </ul>
                                    </li>
                                </ul>
                                </li>

                                <!-- Child 2 -->
                                <li>
                                <span class="caret">Child 2</span>
                                <ul class="nested">
                                    <li>
                                    <span class="caret">Grandchild 2.1</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 2.1.1</li>
                                        <li>Great Grandchild 2.1.2</li>
                                    </ul>
                                    </li>
                                    <li>
                                    <span class="caret">Grandchild 2.2</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 2.2.1</li>
                                        <li>Great Grandchild 2.2.2</li>
                                    </ul>
                                    </li>
                                </ul>
                                </li>

                                <!-- Child 3 -->
                                <li>
                                <span class="caret">Child 3</span>
                                <ul class="nested">
                                    <li>
                                    <span class="caret">Grandchild 3.1</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 3.1.1</li>
                                        <li>Great Grandchild 3.1.2</li>
                                    </ul>
                                    </li>
                                    <li>
                                    <span class="caret">Grandchild 3.2</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 3.2.1</li>
                                        <li>Great Grandchild 3.2.2</li>
                                    </ul>
                                    </li>
                                </ul>
                                </li>

                                <!-- Child 4 -->
                                <li>
                                <span class="caret">Child 4</span>
                                <ul class="nested">
                                    <li>
                                    <span class="caret">Grandchild 4.1</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 4.1.1</li>
                                        <li>Great Grandchild 4.1.2</li>
                                    </ul>
                                    </li>
                                    <li>
                                    <span class="caret">Grandchild 4.2</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 4.2.1</li>
                                        <li>Great Grandchild 4.2.2</li>
                                    </ul>
                                    </li>
                                </ul>
                                </li>

                                <!-- Child 5 -->
                                <li>
                                <span class="caret">Child 5</span>
                                <ul class="nested">
                                    <li>
                                    <span class="caret">Grandchild 5.1</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 5.1.1</li>
                                        <li>Great Grandchild 5.1.2</li>
                                    </ul>
                                    </li>
                                    <li>
                                    <span class="caret">Grandchild 5.2</span>
                                    <ul class="nested">
                                        <li>Great Grandchild 5.2.1</li>
                                        <li>Great Grandchild 5.2.2</li>
                                    </ul>
                                    </li>
                                </ul>
                                </li>
                            </ul>
                            </li>
                        </ul>
                        </div>
                    <script>
                        document.querySelectorAll('.caret').forEach(el => {
                        el.addEventListener('click', () => {
                            el.parentElement.querySelector('.nested').classList.toggle('active');
                            el.classList.toggle('caret-down');
                        });
                        });
                    </script>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📈 Referral Performance</h5>
                    <div class="filters d-flex">
                        <!-- Status Filter -->
                        <select class="form-select-sm me-2" aria-label="Filter by Status">
                        <option selected>All Statuses</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    </div>
                    <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Earnings (₦)</th>
                            <th>Joined</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Direct</td>
                            <td>₦25,000</td>
                            <td>2024-06-15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td><span class="badge bg-secondary">Inactive</span></td>
                            <td>Indirect</td>
                            <td>₦0</td>
                            <td>2024-06-18</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bob Wilson</td>
                            <td>bob@example.com</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Indirect</td>
                            <td>₦0</td>
                            <td>2024-06-20</td>
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
                            
        </div>
        
        
    </div>
@endsection