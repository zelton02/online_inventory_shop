@extends('layouts.app')

<style>
    .alert {
        margin-bottom: 20px; /* Add margin below the alert */
        border-radius: 5px; /* Rounded corners */
        padding: 10px 15px; /* Padding inside the alert */
    }
    .alert-success {
        background-color: #d4edda; /* Background color for success alert */
        border-color: #c3e6cb; /* Border color for success alert */
        color: #155724; /* Text color for success alert */
    }
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 20px; /* Adjusted padding */
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="tab">
        <button class="tablinks" onclick="adminView(event, 'Product')" id='defaultOpen'>Product</button>

        <button class="tablinks" onclick="adminView(event, 'Order')">Order</button>
        <button class="tablinks" onclick="adminView(event, 'User')">User</button>
</div>
    </div>

    <div  id='Product' class="tabcontent" >
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Products</h2>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Add +</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Product --}}
                        {{-- If no product --}}
                        @if ($products->count() === 0)
                        <tr>
                            <td colspan="3">No product found.</td>
                        </tr>
                        @endif

                        {{-- If there are products --}}
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset('assets/image/' . $product->image_url . '.jpg') }}"  alt="{{ $product->name }}" style="width: 100px"></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('product.showUpdate', $product->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>

            <!-- Similar tables for products and orders -->
            <!-- Adapt the table structure and data accordingly -->
            <!-- Don't forget to add routes for product and order CRUD operations -->
        </div>
    </div>

    <div id="Order" class="tabcontent">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Orders</h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Ordered By</th>
                            <th>Order Status</th>
                            <th>Total Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- If no orders --}}
                        @if ($orders->count() === 0)
                        <tr>
                            <td colspan="4">No orders found.</td>
                        </tr>
                        @endif

                        {{-- If there are orders --}}
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->status }}</td>
                            <td>${{ $order->total_amount}}</td>
                            <td>
                                <a href="{{ route('admin.order.showUpdate', $order->id) }}" class="btn btn-primary">View Details</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <div id="User" class="tabcontent">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>User</h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- If no users --}}
                        @if ($users->count() === 0)
                        <tr>
                            <td colspan="4">No users found.</td>
                        </tr>
                        @endif

                        {{-- If there are users --}}
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td> {{-- Corrected to display email instead of price --}}
                            <td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                            <a href="{{ route('user.checkDetails', $user->id) }}" class="btn btn-primary">Check</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $users->links() }} {{-- Corrected to display pagination links for $users --}}
            </div>
        </div>
    </div>


    <script>
     function showActiveTab() {
        var activeTab = document.querySelector('.tablinks.active');
        if (activeTab) {
            var tabId = activeTab.getAttribute('data-tab-id');
            var activeTabContent = document.getElementById(tabId);
            if (activeTabContent) {
                activeTabContent.style.display = 'block';
            }
        }
    }

    // Trigger click on defaultOpen button when page loads
    window.onload = function() {
        document.getElementById("defaultOpen").click();
        showActiveTab();
    };

    // Function to handle tab switching
    function adminView(evt, item) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(item).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


</div>
@endsection
