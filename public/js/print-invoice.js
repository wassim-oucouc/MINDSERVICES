console.log('hello')

function printOrder() {
    const printWindow = window.open('', '_blank', 'height=600,width=800');
    
    // Get order data from the modal
    const orderNumber = document.getElementById('modal-order-id').textContent;
    const customerName = document.getElementById('modal-customer-name').textContent;
    const customerEmail = document.getElementById('modal-customer-email').textContent;
    const orderDate = document.getElementById('modal-order-date').textContent;
    const orderStatus = document.getElementById('modal-order-status').textContent;
    const orderTotal = document.getElementById('modal-grand-total').textContent;
    
    // Get items from the table
    const itemsTable = document.getElementById('modal-order-items');
    const itemRows = itemsTable.querySelectorAll('tr');
    
    // Format current date for invoice
    const today = new Date();
    const formattedDate = today.toLocaleDateString('en-US', { 
      year: 'numeric', 
      month: 'long', 
      day: 'numeric' 
    });
    
    // Create HTML content for the print window with improved styling
    let printContent = `
      <!DOCTYPE html>
      <html>
      <head>
        <title>Invoice ${orderNumber}</title>
        <style>
          body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px;
            color: #333;
            line-height: 1.6;
          }
          .header { 
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px; 
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
          }
          .company-info { 
            text-align: left;
          }
          .company-info h1 {
            margin: 0;
            color: #2563eb;
          }
          .company-info p {
            margin: 5px 0;
            color: #666;
          }
          .invoice-details {
            text-align: right;
          }
          .invoice-details h2 {
            margin: 0;
            color: #2563eb;
          }
          .invoice-details p {
            margin: 5px 0;
          }
          .customer-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
          }
          .bill-to {
            width: 50%;
          }
          .order-summary {
            width: 50%;
            text-align: right;
          }
          h3 {
            color: #2563eb;
            margin-bottom: 10px;
          }
          table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 30px; 
          }
          th, td { 
            padding: 12px 8px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
          }
          th { 
            background-color: #f8fafc;
            font-weight: 600;
          }
          .totals { 
            margin-top: 30px; 
            text-align: right; 
          }
          .totals div { 
            margin-bottom: 8px; 
          }
          .grand-total {
            font-size: 18px; 
            font-weight: bold; 
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
          }
          .footer { 
            margin-top: 50px; 
            text-align: center; 
            font-size: 14px;
            color: #666;
            padding-top: 20px;
            border-top: 1px solid #eee;
          }
          .thank-you {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2563eb;
          }
          @media print {
            .no-print { display: none; }
            body { padding: 0; }
            button { display: none; }
          }
          .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
          }
          .action-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
          }
          .print-btn {
            background-color: #2563eb;
            color: white;
          }
          .close-btn {
            background-color: #e5e7eb;
            color: #374151;
          }
        </style>
      </head>
      <body>
        <div class="header">
          <div class="company-info">
            <h1>ElegantHome</h1>
            <p>123 Elegant Street</p>
            <p>Beautiful City, BC 12345</p>
            <p>Phone: (555) 123-4567</p>
            <p>Email: support@ElegantHome.com</p>
          </div>
          <div class="invoice-details">
            <h2>INVOICE</h2>
            <p><strong>Invoice #:</strong> INV-${orderNumber.replace('#', '')}</p>
            <p><strong>Date:</strong> ${formattedDate}</p>
            <p><strong>Order Status:</strong> ${orderStatus}</p>
          </div>
        </div>
        
        <div class="customer-info">
          <div class="bill-to">
            <h3>BILL TO:</h3>
            <p><strong>${customerName}</strong></p>
            <p>${customerEmail}</p>
          </div>
          <div class="order-summary">
            <h3>ORDER SUMMARY:</h3>
            <p><strong>Order Number:</strong> ${orderNumber}</p>
            <p><strong>Order Date:</strong> ${orderDate}</p>
          </div>
        </div>
        
        <h3>ORDERED ITEMS</h3>
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>Details</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
    `;
    
    // Add items to the print content
    itemRows.forEach(row => {
      try {
        const columns = row.querySelectorAll('td');
        const productName = columns[0].querySelector('.text-sm.font-medium').textContent;
        const details = columns[1].querySelector('.text-sm').innerHTML;
        const price = columns[2].querySelector('.text-sm').textContent;
        const quantity = columns[3].querySelector('.text-sm').textContent;
        const totalItem = columns[4].querySelector('.text-sm').textContent;
        
        printContent += `
          <tr>
            <td>${productName}</td>
            <td>${details}</td>
            <td>${price}</td>
            <td>${quantity}</td>
            <td>${totalItem}</td>
          </tr>
        `;
      } catch (error) {
        console.error('Error processing row:', error);
      }
    });
    
    // Add totals and footer
    const subtotal = document.getElementById('modal-subtotal').textContent;
    const shipping = document.getElementById('modal-shipping').textContent;
    
    printContent += `
          </tbody>
        </table>
        
        <div class="totals">
          <div><strong>Subtotal:</strong> ${subtotal}</div>
          <div><strong>Shipping:</strong> ${shipping}</div>
          <div class="grand-total">
            <strong>Total Amount:</strong> ${orderTotal}
          </div>
        </div>
        
        <div class="footer">
          <p class="thank-you">Thank you for your business!</p>
          <p>If you have any questions about this invoice, please contact</p>
          <p>our customer support at support@ElegantHome.com or call us at (555) 123-4567</p>
        </div>
        
        <div class="no-print action-buttons">
          <button class="print-btn" onclick="window.print()">Print Invoice</button>
          <button class="close-btn" onclick="window.close()">Close</button>
        </div>
      </body>
      </html>
    `;
    
    // Write the content to the new window and print
    printWindow.document.open();
    printWindow.document.write(printContent);
    printWindow.document.close();
    
    // Focus the new window
    printWindow.focus();
  }
