<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllTransation</title>
    <link rel="stylesheet" href="{{asset('../css/AllTransation.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="transactions-container">
        <div class="transactions-header">
            <h1><i class="fas fa-exchange-alt"></i> All Transactions</h1>
            <div class="header-actions">
                <div class="search-box">
                    <input type="text" placeholder="Search transactions...">
                    <i class="fas fa-search"></i>
                </div>

            </div>
        </div>

        <div class="transactions-summary">
            <div class="summary-card">
                <div class="summary-icon total">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="summary-content">
                    <span class="summary-label">Total Earnings</span>
                    <span class="summary-value">$2,845.67</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon completed">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="summary-content">
                    <span class="summary-label">Total</span>
                    <span class="summary-value">228</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon completed">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="summary-content">
                    <span class="summary-label">Subscription Status</span>
                    <span class="summary-value">Premium ($29.99/month)</span>
                </div>
            </div>
        </div>

        <div class="transactions-table-container">

            <table class="transactions-table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Discount Code</th>
                        <th>Offer</th>
                        <th>Date</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>Total Points</th>
                        <th>After our commission</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TRX-2023-05842</td>
                        <td>TOS-k5s-Fs7</td>
                        <td>
                            <div class="product-cell">
                                <img src="{{asset('../Images/product-1.png')}}" alt="Product">
                                <span>Wireless Headphones</span>
                            </div>
                        </td>
                        <td>Nov 15, 2023</td>

                        <td>$172.78</td>
                        <td>42</td>
                        <td>100</td>
                        <td>85</td>
                        <td>Accept</td>
                        <!--
                        <td>
                            <a href="VendorTransaction.html"><button class="action-btn view-btn"><i
                                        class="fas fa-eye"></i></button></a>
                        </td>-->
                    </tr>
                    <tr>
                        <a href="VendorTransaction.html">
                            <td>TRX-2023-05841</td>
                            <td>TOS-k5s-Fs7</td>
                            <td>
                                <div class="product-cell">
                                    <img src="{{asset('../Images/product-2.png')}}" alt="Product">
                                    <span>Smart Coffee Maker</span>
                                </div>
                            </td>
                            <td>Nov 14, 2023</td>
                            <td>$129.99</td>
                            <td>42</td>
                            <td>100</td>
                            <td>85</td>
                            <td>Accept</td>
                        <!--
                        <td>
                            <a href="VendorTransaction.html"><button class="action-btn view-btn"><i
                                        class="fas fa-eye"></i></button></a>
                        </td>-->
                    </tr>
                    <tr>
                        <td>TRX-2023-05840</td>
                        <td>TOS-k5s-Fs7</td>
                        <td>
                            <div class="product-cell">
                                <img src="{{asset('../Images/product-3.png')}}" alt="Product">
                                <span>Yoga Mat</span>
                            </div>
                        </td>
                        <td>Nov 12, 2023</td>
                        <td>$34.99</td>
                        <td>42</td>
                        <td>100</td>
                        <td>85</td>
                        <td>reject</td>
                        <!--
                        <td>
                            <a href="VendorTransaction.html"><button class="action-btn view-btn"><i
                                        class="fas fa-eye"></i></button></a>
                        </td>-->
                    </tr>
                    <tr>
                        <td>TRX-2023-05839</td>
                        <td>TOS-k5s-Fs7</td>
                        <td>
                            <div class="product-cell">
                                <img src="{{asset('../Images/product-4.png')}}" alt="Product">
                                <span>Bluetooth Speaker</span>
                            </div>
                        </td>
                        <td>Nov 10, 2023</td>
                        <td>$89.99</td>
                        <td>42</td>
                        <td>100</td>
                        <td>85</td>
                        <td>reject</td>
                        <!--
                        <td>
                            <a href="VendorTransaction.html"><button class="action-btn view-btn"><i
                                        class="fas fa-eye"></i></button></a>
                        </td>-->
                    </tr>
                    <tr>
                        <td>TRX-2023-05838</td>
                        <td>TOS-k5s-Fs7</td>
                        <td>
                            <div class="product-cell">
                                <img src="{{asset('../Images/product-5.png')}}" alt="Product">
                                <span>Fitness Trassssssssssssssssssssssssssssssssscker</span>
                            </div>
                        </td>
                        <td>Nov 8, 2023</td>
                        <td>$59.99</td>
                        <td>42</td>
                        <td>100</td>
                        <td>85</td>
                        <td> reject</td>
                        <!--
                        <td>
                            <a href="VendorTransaction.html"><button class="action-btn view-btn"><i
                                        class="fas fa-eye"></i></button></a>
                        </td>-->
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination-controls">
            <button class="pagination-btn" disabled><i class="fas fa-chevron-left"></i></button>
            <span class="page-number active">1</span>
            <span class="page-number">2</span>
            <span class="page-number">3</span>
            <span class="page-number">...</span>
            <span class="page-number">5</span>
            <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <script src="{{asset('../scripts/AllTransation.js')}}"></script>
</body>
