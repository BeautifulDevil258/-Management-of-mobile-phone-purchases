@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Shopping Cart</h1>

        @if ($cartItems->isEmpty())
            <p class="text-center">Your cart is empty.</p>
        @else
            <form action="{{ route('orders.create') }}" method="GET" id="cart-form">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Select</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="item-checkbox" 
                                           data-price="{{ $item->product->price }}" data-quantity="{{ $item->quantity }}">
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $item->product->id) }}">
                                        {{ $item->product->name }}
                                    </a>
                                </td>
                                <td>
                                @if ($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px; height: auto;">
                                @else
                                    <img src="{{ asset('img/no-image.png') }}" alt="No Image" style="width: 50px; height: auto;">
                                @endif
                                 </td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control">
                                        <button type="submit" class="btn btn-sm btn-secondary mt-2">Update</button>
                                    </form>
                                </td>
                                <td>{{ number_format($item->product->price, 2) }}₫</td>
                                <td>{{ number_format($item->product->price * $item->quantity, 2) }}₫</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Hiển thị tổng tiền ban đầu -->
                <h5 class="text-right">Total: <span id="total-amount">{{ number_format($total, 2) }}₫</span></h5>
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Checkout Selected</button>
                </div>
            </form>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            const totalAmountElement = document.getElementById('total-amount');
            let initialTotal = {{ $total }};

            // Function to format number with two decimals
            function formatNumber(number) {
                return number.toLocaleString('vi-VN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            // Function to calculate the total based on selected items
            function calculateTotal() {
                let selectedTotal = 0;
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        const price = parseFloat(checkbox.getAttribute('data-price'));
                        const quantity = parseInt(checkbox.getAttribute('data-quantity'));
                        selectedTotal += price * quantity;
                    }
                });

                if (selectedTotal > 0) {
                    totalAmountElement.textContent = formatNumber(selectedTotal);
                } else {
                    totalAmountElement.textContent = formatNumber(initialTotal);
                }
            }

            // Add event listener for all checkboxes
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', calculateTotal);
            });
        });
    </script>
@endsection
