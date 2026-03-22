<?php include 'includes/header.php'; ?>

<style>
  .page-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      width: 100%;
      padding: 20px;
      box-sizing: border-box;
  }
  .form-card {
      background-color: #ffffff;
      max-width: 650px;
      width: 100%;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      box-sizing: border-box;
  }
  .custom-form {
      display: flex;
      flex-direction: column;
      gap: 22px;
      width: 100%;
  }
  .form-group {
      display: flex;
      flex-direction: column;
      gap: 7px;
  }
  .form-row {
      display: flex;
      gap: 18px;
      width: 100%;
  }
  .col-medium {
      flex: 2;
      display: flex;
      flex-direction: column;
      gap: 7px;
  }
  .col-small {
      flex: 1.2;
      display: flex;
      flex-direction: column;
      gap: 7px;
  }
  .custom-label {
      color: #555;
      font-size: 0.95rem;
      text-align: left;
  }
  .custom-input {
      height: 44px;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 0 12px;
      font-size: 1rem;
      width: 100%;
      background-color: #fff;
      box-sizing: border-box;
  }
  .custom-input:focus {
      outline: none;
      border-color: #80bdff;
  }
  .custom-select {
      height: 44px;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 0 12px;
      font-size: 1rem;
      width: 100%;
      background-color: #fff;
      box-sizing: border-box;
  }
  .btn-submit {
      background-color: #5a5cd8;
      color: #fff;
      height: 44px;
      border: none;
      border-radius: 6px;
      padding: 0 32px;
      font-size: 1rem;
      cursor: pointer;
      align-self: flex-start;
      margin-top: 4px;
  }
  .btn-view-records {
      background-color: #0dcaf0;
      color: #212529;
      height: 44px;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      width: 100%;
      text-align: center;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 12px;
      margin-top: 36px;
  }
  .delete-form {
      margin-top: 15px;
      width: 100%;
  }
  .delete-split-btn {
      display: flex;
      width: 100%;
      height: 44px;
      border: none;
      border-radius: 6px;
      overflow: hidden;
      padding: 0;
      cursor: pointer;
      outline: none;
  }
  .delete-left {
      background-color: #28a745;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 30%;
      font-size: 0.95rem;
  }
  .delete-right {
      background-color: #dc3545;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 70%;
      font-size: 0.95rem;
  }

  @media (max-width: 600px) {
      .form-row {
          flex-direction: column;
      }
      .btn-submit {
          width: 100%;
      }
      .delete-left {
          width: 35%;
      }
      .delete-right {
          width: 65%;
      }
  }
</style>

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
