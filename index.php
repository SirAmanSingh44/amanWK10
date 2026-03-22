<?php include 'includes/header.php'; ?>

<div class="page-wrapper">
  <div class="form-card">
    <form class="custom-form" method="post" action="receive.php">
      
      <div class="form-group">
        <label for="inputEmail4" class="custom-label">Email</label>
        <input type="email" class="custom-input" id="inputEmail4" name="email" required>
      </div>

      <div class="form-group">
        <label for="inputAddress" class="custom-label">Address</label>
        <input type="text" class="custom-input" id="inputAddress" name="address" required>
      </div>

      <div class="form-row">
        <div class="col-medium">
          <label for="inputCity" class="custom-label">City</label>
          <input type="text" class="custom-input" id="inputCity" name="city" required>
        </div>

        <div class="col-medium">
          <label for="inputProvince" class="custom-label">Province</label>
          <select id="inputProvince" class="custom-select" name="province" required>
            <option value="" disabled selected>Choose...</option>
            <option value="Alberta">Alberta</option>
            <option value="British Columbia">British Columbia</option>
            <option value="Manitoba">Manitoba</option>
            <option value="New Brunswick">New Brunswick</option>
            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
            <option value="Northwest Territories">Northwest Territories</option>
            <option value="Nova Scotia">Nova Scotia</option>
            <option value="Nunavut">Nunavut</option>
            <option value="Ontario">Ontario</option>
            <option value="Prince Edward Island">Prince Edward Island</option>
            <option value="Quebec">Quebec</option>
            <option value="Saskatchewan">Saskatchewan</option>
            <option value="Yukon">Yukon</option>
          </select>
        </div>

        <div class="col-small">
          <label for="inputAreaCode" class="custom-label">Area Code</label>
          <input type="text" class="custom-input" id="inputAreaCode" name="postal_code" required>
        </div>
      </div>

      <button type="submit" class="btn-submit">Submit</button>

    </form>

    <a href="viewrecords.php" class="btn-view-records">View Records</a>
      
    <form id="deleteForm" class="delete-form">
      <input type="number" id="clientIdInput" class="custom-input" placeholder="Enter Primary Key (client_id)" required style="margin-bottom: 12px; height: 44px;">
      
      <button type="submit" class="delete-split-btn">
        <span class="delete-left">Primary Key</span>
        <span class="delete-right">To delete a record, click this button</span>
      </button>
    </form>

  </div>
</div>

<script>
document.getElementById('deleteForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const clientId = document.getElementById('clientIdInput').value;
    
    if (confirm("Are you sure you want to permanently delete this record?")) {
        fetch('delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'client_id=' + encodeURIComponent(clientId)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.status === 'success') {
                document.getElementById('clientIdInput').value = '';
            }
        })
        .catch(error => {
            alert('Error processing delete request. Please check your connection.');
        });
    }
});
</script>

<?php include 'includes/footer.php'; ?>
